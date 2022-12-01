<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use App\User;
use App\Country;
use App\Http\Controllers\Controller;
use App\UserLogin;
use App\UserWallet;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware(['guest']);
        $this->middleware('regStatus')->except('registrationNotAllowed');
    }

    public function showRegistrationForm($ref = null)
    {
        $page_title = "Voeg gebruiker toe";
        // $country=Country::select('country_code','country_name')->get();
        return view('admin.users.add_user', compact('page_title'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $validate =  Validator::make($data, [
            'firstname' => 'required|string|max:60',
            'lastname' => 'required|string|max:60',
            'country' => 'required|string|max:80',
            'email' => 'required|string|email|max:160|unique:users',
            'mobile' => 'required|string|max:30|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|string|unique:users|min:6',
            'captcha' => 'sometimes|required',
            'age' => 'required',
            'investment_experience' => 'required',
            'wisdom_source' => 'required',
            'investment_duration' => 'required',
            'investment_planning' => 'required',
        ]);



        return $validate;
    }

    public function registerr(Request $request)
    {

        $this->validate($request, [
            'password' => [
                'required',
                'min:4',
                'max:4',

                'regex:/[0-9]/',

            ]
         ]);
    // dd($request->all());
         $user = User::create([

            'firstname' => $request->firstname,
            'lastname' => $request->lastname,

            'username' => $request->username,
            'password' => Hash::make($request->password),

        ]);
        UserWallet::create([
            'user_id' => $user->id,
            'balance' => 0,
            'wallet_type' => 'deposit_wallet',
        ]);

        return redirect()->route('admin.users.all');
        // dd($request->all());
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // if(isset($request->captcha)){
        //     if(!captchaVerify($request->captcha, $request->captcha_secret)){
        //         $notify[] = ['error',"Invalid Captcha"];
        //         return back()->withNotify($notify)->withInput();
        //     }
        // }


        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }



    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $gnl = GeneralSetting::first();

        if(isset($data['referBy'])){
            $referUser = User::where('username',$data['referBy'])->first();
        }
        //p($data);
        $user =  User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username' => $data['username'],
            'refer' =>  isset($data['referBy']) ?  $referUser->id : null,
            'mobile' => $data['mobile'],
            'address' => [
                'address' => '',
                'state' => '',
                'zip' => '',
                'country' => '',
                'city' => '',
            ],
            'status' => 1,
            'ev' =>  $gnl->ev ? 0 : 1,
            'sv' =>  $gnl->sv ? 0 : 1,
            'ts' => 0,
            'tv' => 1,
            'age' =>$data['age'],
            'investment_experience'=>$data['investment_experience'],
            'wisdom_source'=>$data['wisdom_source'],
            'investment_duration'=>$data['investment_duration'],
            'investment_planning'=>$data['investment_planning']
        ]);

        UserWallet::create([
            'user_id' => $user->id,
            'balance' => 0,
            'wallet_type' => 'deposit_wallet',
        ]);

        UserWallet::create([
            'user_id' => $user->id,
            'balance' => 0,
            'wallet_type' => 'interest_wallet',
        ]);


        $info = json_decode(json_encode(getIpInfo()), true);
        $ul['user_id'] = $user->id;
        $ul['user_ip'] =  request()->ip();
        $ul['longitude'] =  @implode(',',$info['long']);
        $ul['latitude'] =  @implode(',',$info['lat']);
        $ul['location'] =  @implode(',',$info['city']) . (" - ". @implode(',',$info['area']) ."- ") . @implode(',',$info['country']) . (" - ". @implode(',',$info['code']) . " ");
        $ul['country_code'] = @implode(',',$info['code']);
        $ul['browser'] = @$info['browser'];
        $ul['os'] = @$info['os_platform'];
        $ul['country'] =  @implode(',', $info['country']);
        UserLogin::create($ul);

        return $user;
    }

    public function registered()
    {
        return redirect()->route('user.home');
    }



}
