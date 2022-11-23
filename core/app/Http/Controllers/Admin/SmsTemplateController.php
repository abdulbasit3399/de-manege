<?php

namespace App\Http\Controllers\Admin;

use App\GeneralSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SmsTemplate;
use Twilio\Rest\Client;

class SmsTemplateController extends Controller
{
    public function index()
    {
        $page_title = 'SMS Templates';
        $empty_message = 'No templates available';
        $sms_templates = SmsTemplate::paginate(config('constants.table.default'));
        return view('admin.sms_template.index', compact('page_title', 'empty_message', 'sms_templates'));
    }

    public function edit($id)
    {
        $sms_template = SmsTemplate::findOrFail($id);
        $page_title = $sms_template->name;
        return view('admin.sms_template.edit', compact('page_title', 'sms_template'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'sms_body' => 'required',
        ]);

        $sms_template = SmsTemplate::findOrFail($id);

        $sms_template->update([
            'sms_body' => $request->sms_body,
            'sms_status' => $request->sms_status ? 1 : 0,
        ]);

        $notify[] = ['success', $sms_template->name . ' template has been updated'];
        return back()->withNotify($notify);
    }


    public function smsSetting()
    {
        $page_title = 'SMS API';

        $general_setting = GeneralSetting::first();

        return view('admin.sms_template.sms_setting', compact('page_title', 'general_setting'));
    }

    public function smsSettingUpdate(Request $request)
    {
        $request->validate([
            // 'smsapi' => 'required',
            'twilio_from' => 'required',
            'twilio_sid' => 'required',
            'twilio_token' => 'required',
        ]);

        $general_setting = GeneralSetting::first();
        $general_setting->twilio_from = $request->twilio_from;
        $general_setting->twilio_sid = $request->twilio_sid;
        $general_setting->twilio_token = $request->twilio_token;
        $general_setting->save();

        // $general_setting->update([
        //     'smsapi' => $request->smsapi,
        // ]);

        $notify[] = ['success', 'SMS Template has been updated'];
        return back()->withNotify($notify);
    }

    public function sendTestSMS(Request $request)
    {
        
        $request->validate(['mobile' => 'required']);
        $general = GeneralSetting::first(['sn', 'smsapi','twilio_from','twilio_sid','twilio_token']);
        if ($general->sn == 1) {
            $sid = $general->twilio_sid;
            $token = $general->twilio_token;

            $client = new Client($sid, $token);

            $message = $client->messages->create(
              $request->mobile,
              [
                'from' => $general->twilio_from,
                'body' => 'This is a test sms'
              ]
            );
            // $message = shortcode_replacer("{{number}}", $request->mobile, $general->smsapi);
            // $message = shortcode_replacer("{{message}}", 'This is a test sms', $message);
            // $result = @file_get_contents($message);
        }

        $notify[] = ['success', 'You sould receive a test sms at ' . $request->mobile . ' shortly.'];
        return back()->withNotify($notify);
    }
}
