<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Trx;
use App\User;
use App\UserLogin;
use App\UserWallet;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{
    public function allUsers()
    {
        $page_title = 'Gebruikers beheren';
        $empty_message = 'No user found';
        $users = User::latest()->paginate(config('constants.table.default'));
        return view('admin.users.users', compact('page_title', 'empty_message', 'users'));
    }
    public function activeUsers()
    {
        $page_title = 'Manage Active Users';
        $empty_message = 'No active user found';
        $users = User::active()->latest()->paginate(config('constants.table.default'));
        return view('admin.users.users', compact('page_title', 'empty_message', 'users'));
    }
    public function bannedUsers()
    {
        $page_title = 'Manage Banned Users';
        $empty_message = 'No banned user found';
        $users = User::banned()->latest()->paginate(config('constants.table.default'));
        return view('admin.users.users', compact('page_title', 'empty_message', 'users'));
    }
    public function withBalanceUsers()
    {
        $page_title = 'Users With Balance';
        $empty_message = 'No user found';
        $users = UserWallet::where('balance','>',0)->orderBy('balance','DESC')->with('user')->paginate(config('constants.table.default'));
        return view('admin.users.withbalance', compact('page_title', 'empty_message', 'users'));
    }
    public function emailUnverifiedUsers()
    {
        $page_title = 'Manage Email Unverified Users';
        $empty_message = 'No email unverified user found';
        $users = User::emailUnverified()->latest()->paginate(config('constants.table.default'));
        return view('admin.users.users', compact('page_title', 'empty_message', 'users'));
    }
    public function smsUnverifiedUsers()
    {
        $page_title = 'Manage SMS Unverified Users';
        $empty_message = 'No sms unverified user found';
        $users = User::smsUnverified()->latest()->paginate(config('constants.table.default'));
        return view('admin.users.users', compact('page_title', 'empty_message', 'users'));
    }

    public function detail($id)
    {
        $user = User::findOrFail($id);
        $withdrawals = $user->withdrawals()->where('status',1)->sum('amount');
        $deposits = $user->deposits()->where('status',1)->sum('amount');
        // $deposit = $user->deposits()->where('user_id',$id)->orderBy('DESC')->first();
        $deposit = $user->deposits()->where('user_id',$id)->orderBy('id','desc')->first();
        $invests = $user->invests()->where('status',1)->sum('amount');
        $transactions = $user->transactions()->count();
        $page_title = 'Gebruikersdetail';

        return view('admin.users.detail', compact('page_title', 'user', 'withdrawals', 'deposits','deposit','transactions','invests'));
    }

    public function search(Request $request, $scope)
    {
        $search = $request->search;
        $users =  User::where(function ($user) use ($search) {
            $user->where('username', 'like', "%$search%")
                ->orWhere('email','like', "%$search%")
                ->orWhere('mobile','like', "%$search%");
        });
        $page_title = '';
        switch ($scope) {
            case 'active':
                $page_title .= 'Active ';
                $users = $users->where('status', 1);
                break;
            case 'banned':
                $page_title .= 'Banned';
                $users = $users->where('status', 0);
                break;
            case 'emailUnverified':
                $page_title .= 'Email Unerified ';
                $users = $users->where('ev', 0);
                break;
            case 'smsUnverified':
                $page_title .= 'SMS Unverified ';
                $users = $users->where('sv', 0);
                break;
        }
        $users = $users->paginate(config('constants.table.default'));
        $page_title .= 'User Search - ' . $search;
        $empty_message = 'No search result found';
        return view('admin.users.users', compact('page_title', 'search', 'scope', 'empty_message', 'users'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $request->validate([
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
            'email' => 'required|email|max:160|unique:users,email,' . $user->id,
        ]);


        if ($request->email != $user->email && User::whereEmail($request->email)->whereId('!=', $user->id)->count() > 0) {
            $notify[] = ['error', 'Email already exists.'];
            return back()->withNotify($notify);
        }

        if ($request->mobile != $user->mobile && User::where('mobile', $request->mobile)->whereId('!=', $user->id)->count() > 0) {
            $notify[] = ['error', 'Phone number already exists.'];
            return back()->withNotify($notify);
        }

        $user->update([
            'mobile'    => $request->mobile,
            'firstname' => $request->firstname,
            'lastname'  => $request->lastname,
            'email'     => $request->email,
            'address'   => [
                'address'   => $request->address,
                'city'      => $request->city,
                'state'     => $request->state,
                'zip'       => $request->zip,
                'country'   => $request->country,
            ],
            'status'    => $request->status ? 1 : 0,
            'ev'        => $request->ev ? 1 : 0,
            'sv'        => $request->sv ? 1 : 0,
            'ts'        => $request->ts ? 1 : 0,
            'tv'        => $request->tv ? 1 : 0,
        ]);

        $notify[] = ['success', 'Gebruikersgegevens zijn bijgewerkt!'];
        return redirect()->route('admin.users.detail', $user->id)->withNotify($notify);
    }

    public function loginHistory(Request $request)
    {

        if ($request->search) {
            $search = $request->search;
            $page_title = 'User Login History Search - ' . $search;
            $empty_message = 'No search result found.';
            $login_logs = UserLogin::whereHas('user', function ($query) use ($search) {
                $query->where('username', $search);
            })->latest()->paginate(config('constants.table.default'));
            return view('admin.users.logins', compact('page_title', 'empty_message', 'search', 'login_logs'));
        }
        $page_title = 'User Login History';
        $empty_message = 'No users login found.';
        $login_logs = UserLogin::latest()->paginate(config('constants.table.default'));
        return view('admin.users.logins', compact('page_title', 'empty_message', 'login_logs'));
    }

    public function userLoginHistory($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'User Login History - ' . $user->username;
        $empty_message = 'No users login found.';
        $login_logs = $user->login_logs()->latest()->paginate(config('constants.table.default'));
        return view('admin.users.logins', compact('page_title', 'empty_message', 'login_logs'));
    }

    public function addSubBalance(Request $request, $id)
    {
        $request->validate(['amount' => 'required|numeric|gt:0']);


        $user = User::findOrFail($id);

        $userWallet = UserWallet::where('id',$request->wallet_id)->where('user_id',$user->id)->firstOrFail();


        $amount = formatter_money($request->amount);
        $general = GeneralSetting::first();

        $trx = getTrx();

        if ($request->act) {
            $userWallet->balance = bcadd($userWallet->balance, $amount, site_precision());
            $userWallet->save();
            $notify[] = ['success', $general->cur_sym . $amount . ' has been added to ' . $user->username . ' balance'];


            Trx::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'post_balance' => $userWallet->balance,
                'charge' => 0,
                'trx_type' => '+',
                'remark' => 'admin_added',
                'details' => 'Added Balance Via Admin',
                'trx' => $trx
            ]);

            // notify($user, 'BAL_ADD', [
            //     'trx' => $trx,
            //     'amount' => $amount,
            //     'currency' => $general->cur_text,
            //     'post_balance' => $userWallet->balance +0,
            // ]);


        } else {
            if ($amount > $userWallet->balance) {
                $notify[] = ['error', $user->username . ' has insufficient balance.'];
                return back()->withNotify($notify);
            }
            $userWallet->balance = bcsub($userWallet->balance, $amount, site_precision());
            $userWallet->save();



            Trx::create([
                'user_id' => $user->id,
                'amount' => $amount,
                'post_balance' => $userWallet->balance,
                'charge' => 0,
                'trx_type' => '-',
                'remark' => 'admin_subtract',
                'details' => 'Added Balance Via Admin',
                'trx' => $trx
            ]);

            // notify($user, 'BAL_SUB', [
            //     'trx' => $trx,
            //     'amount' => $amount,
            //     'currency' => $general->cur_text,
            //     'post_balance' => $userWallet->balance +0,
            // ]);


            $notify[] = ['success', $general->cur_sym . $amount . ' has been subtracted from ' . $user->username . ' balance'];
        }
        return back()->withNotify($notify);


    }

    public function showEmailAllForm()
    {
        $page_title = 'Send Email To All Users';
        return view('admin.users.email_all', compact('page_title'));
    }

    public function sendEmailAll(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        foreach (User::where('status', 1)->cursor() as $user) {
            send_general_email($user->email, $request->subject, $request->message, $user->username);
        }

        $notify[] = ['success', 'All users will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function showEmailSingleForm($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'Send Email To: ' . $user->username;

        return view('admin.users.email_single', compact('page_title', 'user'));
    }

    public function sendEmailSingle(Request $request, $id)
    {
        $request->validate([
            'message' => 'required|string|max:65000',
            'subject' => 'required|string|max:190',
        ]);

        $user = User::findOrFail($id);
        send_general_email($user->email, $request->subject, $request->message, $user->username);

        $notify[] = ['success', $user->username . ' will receive an email shortly.'];
        return back()->withNotify($notify);
    }

    public function withdrawals(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Withdrawals : ' . $user->username;
            $withdrawals = $user->withdrawals()->where('trx', 'like',"%$search%")->latest()->paginate(config('table.default'));
            $empty_message = 'No withdrawals';
            return view('admin.withdraw.withdrawals', compact('page_title', 'user', 'search', 'withdrawals', 'empty_message'));
        }
        $page_title = 'User Withdrawals : ' . $user->username;
        $withdrawals = $user->withdrawals()->latest()->paginate(config('table.default'));
        $empty_message = 'No withdrawals';
        return view('admin.withdraw.withdrawals', compact('page_title', 'user', 'withdrawals', 'empty_message'));
    }

    public function deposits(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Deposits : ' . $user->username;
            $deposits = $user->deposits()->where('trx', $search)->latest()->paginate(config('table.default'));
            $empty_message = 'No deposits';
            return view('admin.deposit.log', compact('page_title', 'search', 'user', 'deposits', 'empty_message'));
        }

        $page_title = 'User Deposit : ' . $user->username;
        $deposits = $user->deposits()->latest()->paginate(config('table.default'));
        $empty_message = 'No deposits';
        return view('admin.deposit.log', compact('page_title', 'user', 'deposits', 'empty_message'));
    }

    public function transactions(Request $request, $id)
    {
        $user = User::findOrFail($id);
        if ($request->search) {
            $search = $request->search;
            $page_title = 'Search User Transactions : ' . $user->username;
            $transactions = $user->transactions()->where('trx', $search)->with('user')->latest()->paginate(config('table.default'));
            $empty_message = 'No transactions';
            return view('admin.reports.transactions', compact('page_title', 'search', 'user', 'transactions', 'empty_message'));
        }
        $page_title = 'User Transactions : ' . $user->username;
        $transactions = $user->transactions()->with('user')->latest()->paginate(config('table.default'));
        $empty_message = 'No transactions';
        return view('admin.reports.transactions', compact('page_title', 'user', 'transactions', 'empty_message'));
    }

    public function invests($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'User Invests : ' . $user->username;
        $invests = $user->invests()->with('user')->latest()->paginate(config('constants.table.default'));
        $empty_message = 'No invests';
        return view('admin.reports.invests', compact('page_title', 'user', 'invests', 'empty_message'));
    }

    public function referral($id)
    {
        $user = User::findOrFail($id);
        $page_title = 'Referrad Users : ' . $user->username;
        $users = $user->referrals()->latest()->paginate(config('constants.table.default'));
        $empty_message = 'No data';
        return view('admin.users.referrals', compact('page_title', 'users', 'empty_message'));
    }
}
