<?php

namespace App\Http\Controllers\Gateway\g111;

use App\Deposit;
use App\Http\Controllers\Gateway\PaymentController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use StripeJS\StripeJS;
use Auth;
use Session;

require_once('stripe-php/init.php');

class ProcessController extends Controller
{

    /*
     * StripeJS Gateway
     */
    public static function process($deposit)
    {
        $StripeJSAcc = json_decode($deposit->gateway_currency()->gateway_parameter);
        $val['key'] = $StripeJSAcc->publishable_key;
        $val['name'] = Auth::user()->username;
        $val['description'] = "Payment with Stripe";
        $val['amount'] = round($deposit->final_amo * 100,2);
        $val['currency'] = $deposit->method_currency;
        $send['val'] = $val;
        $send['src'] = "https://checkout.stripe.com/checkout.js";
        $send['view'] = 'user.payment.g111';
        $send['method'] = 'post';
        $send['url'] = route('ipn.g111');
        return json_encode($send);
    }

    /*
     * StripeJS js ipn
     */
    public function ipn(Request $request)
    {

        $track = Session::get('Track');
        $data = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();
        if ($data->status == 1) {
            $notify[] = ['error', 'Invalid Request.'];
        }
        $StripeJSAcc = json_decode($data->gateway_currency()->gateway_parameter);

        StripeJS::setApiKey($StripeJSAcc->secret_key);

        $customer = \StripeJS\Customer::create([
            'email' => $request->stripeEmail,
            'source' => $request->stripeToken,
        ]);


        $charge = \StripeJS\Charge::create([
            'customer' => $customer->id,
            'description' => 'Payment with Stripe',
            'amount' => $data->final_amo * 100,
            'currency' => $data->method_currency,
        ]);


        if ($charge['status'] == 'succeeded') {
            PaymentController::userDataUpdate($data->trx);
            $notify[] = ['success', 'Transaction was successful.'];
        }

        return redirect()->route('user.deposit')->withNotify($notify);
    }
}
