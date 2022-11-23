<?php

namespace App\Http\Controllers\Admin;

use App\Deposit;
use App\GeneralSetting;
use App\Trx;
use App\User;
use App\UserWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepositController extends Controller
{
    public function deposit()
    {
        $page_title = 'Deposit History';
        $empty_message = 'No deposit history available.';
        $deposits = Deposit::with(['user', 'gateway'])->where('status','!=',0)->latest()->paginate(config('constants.table.default'));
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits'));
    }

    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $page_title = '';
        $empty_message = 'No search result was found.';

        $deposits = Deposit::with(['user', 'gateway'])->where('status','!=',0)->where(function ($q) use ($search) {
            $q->where('trx', 'like', "%$search%")->orWhereHas('user', function ($user) use ($search) {
                $user->where('username', 'like', "%$search%");
            });
        });
        switch ($scope) {
            case 'pending':
                $page_title .= 'Pending Deposits Search';
                $deposits = $deposits->where('method_code', '>=', 1000)->where('status', 2);
                break;
            case 'approved':
                $page_title .= 'Approved Deposits Search';
                $deposits = $deposits->where('method_code', '>=', 1000)->where('status', 1);
                break;
            case 'rejected':
                $page_title .= 'Rejected Deposits Search';
                $deposits = $deposits->where('method_code', '>=', 1000)->where('status', 3);
                break;
            case 'list':
                $page_title .= 'Deposits History Search';
                break;
        }
        $deposits = $deposits->paginate(config('constants.table.defult'));
        $page_title .= ' - ' . $search;

        return view('admin.deposit.log', compact('page_title', 'search', 'scope', 'empty_message', 'deposits'));
    }

    public function pending()
    {
        $page_title = 'Pending Deposits';
        $empty_message = 'No pending deposits.';
        //$deposits = Deposit::where('method_code', '>=', 1000)->where('status', 2)->with(['user', 'gateway'])->latest()->paginate(config('constants.table.default'));
        $deposits = Deposit::where('method_code', '>=', 100)->where('status', 2)->with(['user', 'gateway'])->latest()->paginate(config('constants.table.default'));
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits'));
    }

    public function approved()
    {
         $page_title = 'Approved Deposits';
        $empty_message = 'No approved deposits.';
        $deposits = Deposit::where('status', 1)->with(['user', 'gateway'])->latest()->paginate(config('constants.table.default'));
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits'));
    }

    public function rejected()
    {
         $page_title = 'Rejected Deposits';
        $empty_message = 'No rejected deposits.';
        $deposits = Deposit::where('method_code', '>=', 1000)->where('status', 3)->with(['user', 'gateway'])->latest()->paginate(config('constants.table.default'));
        return view('admin.deposit.log', compact('page_title', 'empty_message', 'deposits'));
    }

    public function approve(Request $request)
    {
        $request->validate(['id' => 'required|integer']);
        $deposit = Deposit::where('id',$request->id)->where('status',2)->firstOrFail();
        $deposit->update(['status' => 1]);
        // dd($request->id);
        // dd($deposit);

        $user = UserWallet::where('user_id', $deposit->user_id)->where('wallet_type', 'deposit_wallet')->first();
        $user['balance'] = formatter_money(($user['balance'] + $deposit->amount));
        $user->update();



        Trx::create([
            'user_id' => $deposit->user_id,
            'amount' => formatter_money($deposit->amount),
            'post_balance' => $user->balance,
            'charge' => $deposit->charge,
            'trx_type' => '+',
            'remark' => 'manual_deposit',
            'details' => 'Deposit Via ' . $deposit->gateway_currency()->name,
            'trx' => $deposit->trx
        ]);

        $gnl = GeneralSetting::first();

        if($gnl->deposit_commission == 1){
            $commissionType =  'Commission Rewarded For '. formatter_money($deposit->amount) . ' '.$gnl->cur_text.' Deposit';
            levelCommision($deposit->user_id, $deposit->amount, $commissionType);
        }

        // notify($user, 'DEPOSIT_APPROVE', [
        //     'method_name' => $deposit->gateway_currency()->name,
        //     'method_currency' => $deposit->method_currency,
        //     'method_amount' => formatter_money($deposit->final_amo),
        //     'amount' => formatter_money($deposit->amount),
        //     'charge' => formatter_money($deposit->charge),
        //     'currency' => $gnl->cur_text,
        //     'rate' => $deposit->rate +0,
        //     'trx' => $deposit->trx,
        //     'post_balance' => $user->balance
        // ]);



        $notify[] = ['success', 'Deposit has been approved.'];
        return back()->withNotify($notify);
    }

    public function reject(Request $request)
    {

        $request->validate(['id' => 'required|integer']);
        $deposit = Deposit::where('id',$request->id)->where('status',2)->firstOrFail();
        $deposit->update(['status' => 3]);

        $gnl = GeneralSetting::first();
        notify($deposit->user, 'DEPOSIT_REJECT', [
            'method_name' => $deposit->gateway_currency()->name,
            'method_currency' => $deposit->method_currency,
            'method_amount' => formatter_money($deposit->final_amo),
            'amount' => formatter_money($deposit->amount),
            'charge' => formatter_money($deposit->charge),
            'currency' => $gnl->cur_text,
            'rate' => $deposit->rate +0,
            'trx' => $deposit->trx
        ]);

        $notify[] = ['success', 'Deposit has been rejected.'];
        return back()->withNotify($notify);

    }
}
