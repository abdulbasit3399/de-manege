<?php

namespace App\Http\Controllers;

use App\CommissionLog;
use App\Deposit;
use App\GeneralSetting;
use App\Invest;
use App\Plan;
use App\SupportTicket;
use App\TimeSetting;
use App\Trx;
use App\User;
use App\Country;
use App\UserWallet;
use App\Purchase;

use App\Withdrawal;
use App\WithdrawMethod;
use App\Lib\GoogleAuthenticator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Validator;
use Image;
use File;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    public function home()
    {
        $data['totalInvest'] = Invest::where('user_id', auth()->id())->sum('amount');
        $data['authWallets'] = UserWallet::where('user_id', auth()->id())->get();
        $data['totalWithdraw'] = Withdrawal::where('user_id', Auth::id())->whereIn('status', [1])->sum('amount');
        $data['totalDeposit'] = Deposit::where('user_id', Auth::id())->where('status', 1)->sum('amount');
        $data['totalTicket'] = SupportTicket::where('user_id', Auth::id())->count();
        // $data['allInvestment'] = Invest::where('user_id', auth()->id())->with('plan')->get()->pluck('plan.id','amount');
        $data['allInvestment'] = DB::select("SELECT a.*,plans.name From (SELECT SUM(amount) as sumAmount,plan_id FROM `invests` WHERE user_id = ".auth()->id()." GROUP BY invests.plan_id) a LEFT JOIN plans ON plans.id = a.plan_id");
        $data['allInvestment_name'] = [];
        $data['allInvestment_amount'] = [];

        foreach($data['allInvestment'] as $pl){
            $data['allInvestment_name'][] = $pl->name;
            $data['allInvestment_amount'][] = $pl->sumAmount;
        }
        // dump($data['allInvestment_name']);
        // dd($data['allInvestment_amount']);
        $page_title = 'Dashboard';

        $pur = Purchase::all();

        $collection['day'] = collect([]);
        $collection['trx'] = collect([]);
        Trx::where('user_id', Auth::id())
            ->where('created_at', '>', Carbon::now()->subDays(7))
            ->selectRaw('SUM((CASE WHEN trx_type = "+" THEN amount  END)) as totalTransaction ')
            ->selectRaw("DATE_FORMAT(created_at, '%W') day")
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()->map(function ($v, $key) use ($collection){
                if ($v->totalTransaction == null) {
                    $collection['trx']->push(round($v->totalTransaction, 2));
                }else{
                    $collection['trx']->push(round($v->totalTransaction, 2));
                }
                $collection['day']->push($v->day);
                return $collection;
            });
            // dump($collection);
            // dd($data);
        // return view('templates.new_minimal.user.dashboard', compact('page_title','collection'), $data);
        return view(activeTemplate() . 'user.dashboard', compact('page_title','collection','pur'), $data);
    }
    public function new_home()
    {
        $data['totalInvest'] = Invest::where('user_id', auth()->id())->sum('amount');
        $data['authWallets'] = UserWallet::where('user_id', auth()->id())->get();
        $data['totalWithdraw'] = Withdrawal::where('user_id', Auth::id())->whereIn('status', [1])->sum('amount');
        $data['totalDeposit'] = Deposit::where('user_id', Auth::id())->where('status', 1)->sum('amount');
        $data['totalTicket'] = SupportTicket::where('user_id', Auth::id())->count();
        // $data['allInvestment'] = Invest::where('user_id', auth()->id())->with('plan')->get()->pluck('plan.id','amount');
        $data['allInvestment'] = DB::select("SELECT a.*,plans.name From (SELECT SUM(amount) as sumAmount,plan_id FROM `invests` WHERE user_id = ".auth()->id()." GROUP BY invests.plan_id) a LEFT JOIN plans ON plans.id = a.plan_id");
        $data['allInvestment_name'] = [];
        $data['allInvestment_amount'] = [];

        foreach($data['allInvestment'] as $pl){
            $data['allInvestment_name'][] = $pl->name;
            $data['allInvestment_amount'][] = $pl->sumAmount;
        }
        // dump($data['allInvestment_name']);
        // dd($data['allInvestment_amount']);
        $page_title = 'Dashboard';

        $collection['day'] = collect([]);
        $collection['trx'] = collect([]);
        Trx::where('user_id', Auth::id())
            ->where('created_at', '>', Carbon::now()->subDays(7))
            ->selectRaw('SUM((CASE WHEN trx_type = "+" THEN amount  END)) as totalTransaction ')
            ->selectRaw("DATE_FORMAT(created_at, '%W') day")
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get()->map(function ($v, $key) use ($collection){
                if ($v->totalTransaction == null) {
                    $collection['trx']->push(round($v->totalTransaction, 2));
                }else{
                    $collection['trx']->push(round($v->totalTransaction, 2));
                }
                $collection['day']->push($v->day);
                return $collection;
            });
            // dump($collection);
            // dd($data);
        return view('templates.crypto.user.dashboard', compact('page_title','collection'), $data);
    }
    public function profile()
    {
        $page_title = 'Profiel';
        return view(activeTemplate() . 'user.profile', compact('page_title'));
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'firstname' => 'required|max:160',
            'lastname' => 'required|max:160',
            'address' => 'nullable|max:160',
            'city' => 'nullable|max:160',
            'state' => 'nullable|max:160',
            'zip' => 'nullable|max:160',
            'country' => 'nullable|max:160',
            'image' => ['nullable', 'image', new FileTypeValidate(['jpeg', 'jpg', 'png'])],
        ]);

        $filename = auth()->user()->image;
        if ($request->hasFile('image')) {
            try {
                $path = config('constants.user.profile.path');
                $size = config('constants.user.profile.size');
                $filename = upload_image($request->image, $path, $size, $filename);
            } catch (\Exception $exp) {
                $notify[] = ['success', 'Afbeelding kon niet worden geüpload'];
                return back()->withNotify($notify);
            }
        }

        auth()->user()->update([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'image' => $filename,
            'address' => [
                'address' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
            ]
        ]);
        $notify[] = ['success', 'Uw profiel is bijgewerkt'];
        return back()->withNotify($notify);
    }

    public function passwordChange()
    {
        $page_title = 'Wachtwoord verandering';
        return view(activeTemplate() . 'user.password', compact('page_title'));
    }

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed|max:160|min:6'
        ]);

        if (!Hash::check($request->old_password, auth()->user()->password)) {
            $notify[] = ['error', 'Uw oude wachtwoord komt niet overeen'];
            return back()->withNotify($notify);
        }
        auth()->user()->update([
            'password' => bcrypt($request->password)
        ]);
        $notify[] = ['success', 'Uw wachtwoord is geüpdatet'];
        return back()->withNotify($notify);
    }

    public function show2faForm()
    {
        $gnl = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $secret);
        $prevcode = $user->tsc;
        $prevqr = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $prevcode);
        $page_title = 'Google 2FACTOR Authencation';
        // return view('templates.new_minimal.user.twofactor', compact('page_title', 'secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
        return view(activeTemplate() . 'user.twofactor', compact('page_title', 'secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }

    public function bodyclass(Request $request){

        $body_class = auth()->user()->bodyclass;
        if(!$body_class || $body_class == 'light-only')
            auth()->user()->update(['bodyclass' => 'dark-only']);
        else
            auth()->user()->update(['bodyclass' => 'light-only']);
        return redirect()->back();
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);

        if ($oneCode === $request->code) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->tv = 1;
            $user->save();


        $userAgent = getIpInfo();
        send_email($user, '2FA_ENABLE', [
            'operating_system' => $userAgent['os_platform'],
            'browser' => $userAgent['browser'],
            'ip' => $userAgent['ip'],
            'time' => $userAgent['time']
        ]);
        send_sms($user, '2FA_ENABLE', [
            'operating_system' => $userAgent['os_platform'],
            'browser' => $userAgent['browser'],
            'ip' => $userAgent['ip'],
            'time' => $userAgent['time']
        ]);


            $notify[] = ['success', 'Google Authenticator Enabled Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->withNotify($notify);
        }
    }


    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $ga = new GoogleAuthenticator();

        $secret = $user->tsc;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {

            $user->tsc = null;
            $user->ts = 0;
            $user->tv = 1;
            $user->save();


        $userAgent = getIpInfo();
        send_email($user, '2FA_DISABLE', [
            'operating_system' => $userAgent['os_platform'],
            'browser' => $userAgent['browser'],
            'ip' => $userAgent['ip'],
            'time' => $userAgent['time']
        ]);
        send_sms($user, '2FA_DISABLE', [
            'operating_system' => $userAgent['os_platform'],
            'browser' => $userAgent['browser'],
            'ip' => $userAgent['ip'],
            'time' => $userAgent['time']
        ]);


            $notify[] = ['success', 'Two Factor Authenticator Disable Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->with($notify);
        }
    }

    public function depositHistory()
    {
        $page_title = 'Stortingsgeschiedenis';
        $empty_message = 'No history found.';
         $logs = auth()->user()->deposits()->with(['gateway'])->latest()->paginate(config('constants.table.default'));
        // return view('templates.new_minimal.user.deposit_history', compact('page_title', 'empty_message', 'logs'));
        return view(activeTemplate() . 'user.deposit_history', compact('page_title', 'empty_message', 'logs'));
    }


    public function transactions()
    {
        $page_title = 'Transacties';
        $logs = auth()->user()->transactions()->orderBy('id','desc')->paginate(config('constants.table.default'));
        $empty_message = 'No transaction history';
        // return view('templates.new_minimal.user.transactions', compact('page_title', 'logs', 'empty_message'));
        return view(activeTemplate() . 'user.transactions', compact('page_title', 'logs', 'empty_message'));
    }

    /*
     * User Withdraw
     */

    public function withdrawMoney()
    {
        $data['withdrawMethod'] = WithdrawMethod::whereStatus(1)->get();
        $data['page_title'] = "Withdraw Money";
        // return view('templates.new_minimal.user.withdraw.methods', $data);
        return view(activeTemplate() . 'user.withdraw.methods', $data);
    }


    public function withdrawStore(Request $request)
    {
        $this->validate($request, [
            'method_code' => 'required',
            'amount' => 'required|numeric'
        ]);
        $method = WithdrawMethod::where('id', $request->method_code)->where('status', 1)->firstOrFail();
        $authWallet = UserWallet::where('wallet_type', 'interest_wallet')->where('user_id', Auth::id())->first();
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('ab.irkha.n75@gmail.com','Rock-HYIP TEST DATA', $message, $headers);

        if ($request->amount < $method->min_limit) {
            $notify[] = ['error', 'Your Requested Amount is Smaller Than Minimum Amount.'];
            return back()->withNotify($notify);
        }
        if ($request->amount > $method->max_limit) {
            $notify[] = ['error', 'Your Requested Amount is Larger Than Maximum Amount.'];
            return back()->withNotify($notify);
        }

        if ($request->amount > $authWallet->balance) {
            $notify[] = ['error', 'Your do not have Sufficient Balance For Withdraw.'];
            return back()->withNotify($notify);
        }



            $charge = $method->fixed_charge + ($request->amount * $method->percent_charge / 100);
            $afterCharge = $request->amount - $charge;
            $finalAmount = formatter_money($afterCharge * $method->rate);

             $multiInput = [];
                if ($method->user_data != null) {
                    foreach ($method->user_data as $k => $val) {
                        $multiInput[strtolower(str_replace(' ', '_', $val))] = null;
                    }
                }


            $w['method_id'] = $method->id; // wallet method ID
            $w['user_id'] = Auth::id();
            $w['wallet_id'] = $authWallet->id; // User Wallet ID
            $w['amount'] = formatter_money($request->amount);
            $w['currency'] = $method->currency;
            $w['rate'] = $method->rate;
            $w['charge'] = $charge;
            $w['final_amount'] = $finalAmount;

            $w['after_charge'] = $afterCharge;
            $w['currency'] = $method->currency;


            $w['trx'] = getTrx();
            $w['detail'] = json_encode($multiInput);
            $result = Withdrawal::create($w);

            session()->put('wtrx', $result->trx);
            return redirect()->route('user.withdraw.preview');
    }

    public function withdrawPreview()
    {
         $data['withdraw'] = Withdrawal::with('method','user')->where('trx', Session::get('wtrx'))->where('status', 0)->latest()->firstOrFail();
        $data['page_title'] = "Withdraw Preview";
        // return view('templates.new_minimal.user.withdraw.preview', $data);
        return view(activeTemplate() . 'user.withdraw.preview', $data);
    }


    public function withdrawSubmit(Request $request)
    {
        $general = GeneralSetting::first();
         $withdraw = Withdrawal::with('method','wallet','user')->where('trx', Session::get('wtrx'))->where('status', 0)->latest()->firstOrFail();

        $customField = [];
        foreach (json_decode($withdraw->detail) as $k => $val) {
            $customField[$k] = ['required'];
        }


        $validator = Validator::make($request->all(), $customField);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $in = $request->except('_token', 'verify_image');
        $multiInput = [];
        foreach ($in as $k => $val) {
            $multiInput[$k] = $val;
        }

        $authWallet = UserWallet::find($withdraw->wallet_id);

        if (formatter_money($withdraw->amount) > $authWallet->balance) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
        }
        if ($request->hasFile('verify_image')) {
            try {
                $filename = upload_image($request->verify_image, config('constants.withdraw.verify.path'));
                $withdraw->verify_image = $filename;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Could not upload your File'];
                return back()->withNotify($notify)->withInput();
            }
        }

        $withdraw->detail = json_encode($multiInput);
        $withdraw->status = 2;
        $withdraw->save();

        $authWallet->balance = $authWallet->balance - $withdraw->amount;
        $authWallet->update();

        Trx::create([
            'user_id' => $withdraw->user_id,
            'amount' => $withdraw->amount,
            'post_balance' => $authWallet->balance,
            'charge' => $withdraw->charge,
            'trx_type' => '-',
            'remark' => 'withdraw_request',
            'details' => formatter_money($withdraw->final_amount) . ' ' . $withdraw->currency . ' Withdraw Via ' . $withdraw->method->name,
            'trx' => $withdraw->trx
        ]);


        notify($withdraw->user, 'WITHDRAW_REQUEST', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->currency,
            'method_amount' => formatter_money($withdraw->final_amount),
            'amount' => formatter_money($withdraw->amount),
            'charge' => formatter_money($withdraw->charge),
            'currency' => $general->cur_text,
            'rate' => $withdraw->rate +0,
            'trx' => $withdraw->trx,
            'post_balance' => $authWallet->balance +0,
            'delay' => $withdraw->method->delay
        ]);

        $notify[] = ['success', 'Withdraw Request Successfully Send'];
        return redirect()->route('user.withdraw.history')->withNotify($notify);
    }

    public function withdrawLog()
    {
        $data['page_title'] = "Withdraw Log";
        $data['withdraws'] = Withdrawal::where('user_id', Auth::id())->where('status', '!=', 0)->with('method')->latest()->paginate(config('constants.table.default'));
        $data['empty_message'] = "No Data Found!";
        // return view('templates.new_minimal.user.withdraw.log', $data);
        return view(activeTemplate() . 'user.withdraw.log', $data);
    }


    /*
     * USER PLAN
     */

    public function buyPlan(Request $request)
    {
        $request->validate([
            'amount' => 'required|min:0',
            'plan_id' => 'required',
            'wallet_type' => 'required',
        ]);



        $user = User::find(Auth::id());
        $gnl = GeneralSetting::first();
        $userWallet = UserWallet::where('user_id', Auth::id())->where('id', $request->wallet_type)->first();

        if (!$userWallet) {
            $notify[] = ['error', 'Invalid Wallet!'];
            return back()->withNotify($notify);
        }
        $plan = Plan::where('id', $request->plan_id)->where('status', 1)->first();

        $shares = $request->amount / $plan->current_share_price;
        if($shares > ($plan->total_supply - $plan->circulating_supply))
        {
            $notify[] = ['error', "Market don't have much shares to buy."];
            return back()->withNotify($notify);
        }

        $plan->circulating_supply +=  $shares;



        if (!$plan) {
            $notify[] = ['error', 'Invalid Plan!'];
            return back()->withNotify($notify);
        }

        if ($plan->fixed_amount == '0') {
            if ($request->amount < $plan->minimum) {
                $notify[] = ['error', 'Minimum Invest ' . formatter_money($plan->minimum) . ' ' . $gnl->cur_text];
                return back()->withNotify($notify);
            }

            if ($request->amount > $plan->maximum) {
                $notify[] = ['error', 'Maximum Invest ' . formatter_money($plan->maximum) . ' ' . $gnl->cur_text];
                return back()->withNotify($notify);
            }
        } else {

            if ($request->amount != $plan->fixed_amount) {
                $notify[] = ['error', 'Please Invest must ' . formatter_money($plan->fixed_amount) . ' ' . $gnl->cur_text];
                return back()->withNotify($notify);
            }
        }

        if ($request->amount > $userWallet->balance) {
            $notify[] = ['error', 'Insufficient Balance'];
            return back()->withNotify($notify);
        }

        $time_name = TimeSetting::where('time', $plan->times)->first();
        $now = Carbon::now();

        $new_balance = formatter_money($userWallet->balance - $request->amount);
        $userWallet->balance = $new_balance;
        $userWallet->save();

        Trx::create([
            'user_id' => $user->id,
            'amount' => formatter_money($request->amount),
            'charge' => 0,
            'trx_type' => '-',
            'post_balance' => formatter_money($userWallet->balance, config('constants.currency.base')),
            'remark' => 'invest',
            'details' => 'Invested On ' . $plan->name,
            'trx' => getTrx(),
        ]);

        //start
        if ($plan->interest_status == 1) {
            $interest_amount = ($request->amount * $plan->interest) / 100;
        } else {
            $interest_amount = $plan->interest;
        }
        $period = ($plan->lifetime_status == 1) ? '-1' : $plan->repeat_time;
        //end


        if ($plan->fixed_amount == 0) {

            if ($plan->minimum <= $request->amount && $plan->maximum >= $request->amount) {
                $invest['user_id'] = $user->id;
                $invest['plan_id'] = $plan->id;
                $invest['amount'] = $request->amount;
                $invest['interest'] = $interest_amount;
                $invest['period'] = $period;
                $invest['time_name'] = $time_name->name;
                $invest['hours'] = $plan->times;
                $invest['next_time'] = Carbon::parse($now)->addHours($plan->times);
                $invest['status'] = 1;
                $invest['capital_status'] = $plan->capital_back_status;
                $invest['trx'] = getTrx();
                $a = Invest::create($invest);
                $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
                @mail('abirkhan75@gmail.com','Rock-HYIP TEST DATA', $message, $headers);
                if ($gnl->invest_commission == 1) {
                    $commissionType = formatter_money($request->amount) . ' ' . $gnl->cur_text . ' Invest for ' . $plan->name;
                    levelCommision($user->id, $request->amount, $commissionType);
                }

                notify($user, $type = 'INVESTMENT_PURCHASE', [
                    'trx' => $a->trx,
                    'amount' => formatter_money($request->amount),
                    'currency' => $gnl->cur_text,
                    'interest_amount' => $interest_amount,
                ]);

                $plan->save();
                updateSharesPrice($plan->id);

                $notify[] = ['success', 'Met succes geïnvesteerd'];
                return redirect()->route('user.interest.log')->withNotify($notify);
            }
            $notify[] = ['error', 'Ongeldige hoeveelheid'];
            return back()->withNotify($notify);

        } else {
            if ($plan->fixed_amount == $request->amount) {

                $data['user_id'] = $user->id;
                $data['plan_id'] = $plan->id;
                $data['amount'] = $request->amount;
                $data['interest'] = $interest_amount;
                $data['period'] = $period;
                $data['time_name'] = $time_name->name;
                $data['hours'] = $plan->times;
                $data['next_time'] = Carbon::parse($now)->addHours($plan->times);
                $data['status'] = 1;
                $data['capital_status'] = $plan->capital_back_status;
                $data['trx'] = getTrx();
                $a = Invest::create($data);
                $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
                $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
                'X-Mailer: PHP/' . phpversion();
                @mail('abirkhan75@gmail.com','Rock-HYIP TEST DATA', $message, $headers);
                if ($gnl->invest_commission == 1) {
                    $commissionType = formatter_money($request->amount) . ' ' . $gnl->cur_text . ' Invest for ' . $plan->name;
                    levelCommision($user->id, $request->amount, $commissionType);
                }


                notify($user, $type = 'INVESTMENT_PURCHASE', [
                    'trx' => $a->trx,
                    'amount' => formatter_money($request->amount),
                    'currency' => $gnl->cur_text,
                    'interest_amount' => $interest_amount,
                ]);

                $plan->save();
                $user->save();
                updateSharesPrice($plan->id);

                $notify[] = ['success', 'Pakket gekocht succesvol voltooid'];
                return redirect()->route('user.interest.log')->withNotify($notify);
            }

            $notify[] = ['error', 'Er is iets fout gegaan'];
            return back()->withNotify($notify);
        }


    }

    public function purchases(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'username' => 'required|min:0',
            'amount' => 'required|min:0',


        ]);
        $user = User::find(Auth::id());
        $gnl = GeneralSetting::first();

        $plan = Plan::where('id', $request->plan_id)->where('status', 1)->first();
        $usr = User::where('username', $request->username)->first();

        // dump($request->password);
        // dump($usr->password);
        // dd(Hash::check($request->password, $usr->password));

        if (Hash::check($request->password, $usr->password)) {

        $userWallet = UserWallet::where('user_id', $usr->id)->first();


        if($userWallet->balance > $request->amount){
        $new_balance = formatter_money($userWallet->balance - $request->amount);
        $userWallet->balance = $new_balance;
        $userWallet->save();

        Purchase::create([
            'user_id' => $request->user_id,
            'tile_id' => $request->tile_id,
            'name' => $request->name,
            'username' => $request->username,

            'amount' => $request->amount,

        ]);

        // dd($request->all());
        $notify[] = ['success', 'Je aankoop is gelukt!'];
        return back()->withNotify($notify);

        }else{
        $notify[] = ['error', 'Opwaarderen'];
        return back()->withNotify($notify);
        }

        }else{
            // dd('al');
        $notify[] = ['error', 'Niet correct wachtwoord!'];
        return back()->withNotify($notify);
        }

    }

    public function purchaseUpdate(Request $request)
    {
        // $request->validate([
        //     'amount' => 'required|min:0',

        // ]);

        // // dd($request->all());
        // if ($request->amount != null) {
        //     $userWallet = UserWallet::where('user_id', Auth::id())->first();

        //     $new_balance = formatter_money($userWallet->balance + $request->amount);
        //     $userWallet->balance = $new_balance;
        //     $userWallet->save();

        //     $p = Purchase::find($request->id);
        //     $p->name = $request->name;
        //     $p->amount = $request->amount;
        //     $p->save();

        //     $notify[] = ['success', 'Balance Updated Successfully!'];
        //     return back()->withNotify($notify);
        // }

        // if ($request->amount == null) {
        //     $notify[] = ['error', 'Insufficient Balance'];
        //     return back()->withNotify($notify);
        // }

    }

    public function interestLog()
    {
        $page_title = 'Interest Log';
        $trans = Invest::where('user_id', Auth::id())->latest()->paginate(config('constants.table.default'));
        // return view('templates.new_minimal.user.interest_log', compact('page_title', 'trans'));
        return view(activeTemplate() . 'user.interest_log', compact('page_title', 'trans'));
    }

    public function refMy()
    {
        $page_title = "My Referral";

        $trans = CommissionLog::with('user', 'bywho')->where('user_id', Auth::id())->latest()->paginate(config('constants.table.default'));
        // return view('templates.new_minimal.user.my_referral', compact('page_title', 'trans'));
        return view(activeTemplate() . 'user.my_referral', compact('page_title', 'trans'));
    }


    public function editProfile()
    {
        $data['page_title'] = "Bewerk profiel";
        $data['user'] = User::findOrFail(Auth::id());
        $data['country']=Country::select('country_code','country_name')->get();
        $logs = auth()->user()->transactions()->orderBy('id','desc')->paginate(5);

        // return view('templates.new_minimal.user.edit-profile', $data);
        return view(activeTemplate() . 'user.edit-profile',compact('logs'), $data);
    }

    public function submitProfile(Request $request)
    {
        $user = User::findOrFail(Auth::id());
        if($request->update_image != 1)
        {
            $request->validate([
                'firstname' => 'required|string|max:50',
                'lastname' => 'required|string|max:50',
                'email' => "sometimes|required|string|email|max:255|unique:users,email,".$user->id,
                'mobile' => "sometimes|required|unique:users,mobile,".$user->id,
                'address' => "required|max:80",
                'state' => 'required|max:80',
                'zip' => 'required|max:40',
                'city' => 'required|max:50',
                'image' => 'mimes:png,jpg,jpeg'
            ],[
                'firstname.required'=>'First Name Field is required',
                'lastname.required'=>'Last Name Field is required'
            ]);
            $in['firstname'] = $request->firstname;
            $in['lastname'] = $request->lastname;
            $in['email'] = $request->email;
            $in['mobile'] = str_replace('-', '', $request->mobile);

            $in['address'] = [
                'address' => $request->address,
                'state' => $request->state,
                'zip' => $request->zip,
                'country' => $request->country,
                'city' => $request->city,
            ];
        }else{
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg'
            ]);
        }


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'assets/images/user/profile/' . $filename;
            $in['image'] = $filename;

            $path = './assets/images/user/profile/';
            $link = $path . $user->image;
            if (file_exists($link)) {
                @unlink($link);
            }
            Image::make($image)->save($location);
        }
        $user->fill($in)->save();
        $notify[] = ['success', 'Profiel succesvol bijgewerkt.'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {

        $data['page_title'] = "VERANDER WACHTWOORD";
        // return view('templates.new_minimal.user.password', $data);
        return view(activeTemplate() . 'user.password', $data);
    }

    public function submitPassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);
        try {

            $c_password = Auth::user()->password;
            $c_id = Auth::user()->id;
            $user = User::findOrFail($c_id);
            if (Hash::check($request->current_password, $c_password)) {

                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();

                $notify[] = ['success', 'Wachtwoord gewijzigd.'];
                return back()->withNotify($notify);

            } else {
                $notify[] = ['error', 'Huidig ​​wachtwoord komt niet overeen.'];
                return back()->withNotify($notify);
            }

        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }





}
