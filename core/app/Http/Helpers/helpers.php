<?php

use App\Plan;
use App\GeneralSetting;
use Twilio\Rest\Client;
use App\PlanPriceHistory;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Twilio\Exceptions\TwilioException;

function systemDetails()
{
    $system['name'] = 'rockhyip';
    $system['version'] = '2.0';
    return $system;
}

function get_image($image, $clean = '')
{
    return file_exists($image) && is_file($image) ? asset($image) . $clean : asset(config('constants.image.default'));
}

function get_file($file, $clean = '')
{
    return file_exists($file) ? asset($file) . $clean : '';
}


function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}


function description_shortener($string, $length = null)
{
    if (empty($length)) $length = config('constants.stringLimit.default');
    return Illuminate\Support\Str::limit($string, $length);
}


function sidenav_active($routename, $class = 'active open')
{
    if (is_array($routename)) {
        foreach ($routename as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routename)) {
        return $class;
    }
}

function buildernav_active($fullurl, $class = 'active open')
{
    if (url()->current() == $fullurl) {
        return $class;
    }
}


function show_datetime($date, $format = 'd M, Y h:ia')
{

    return \Carbon\Carbon::parse($date)->format($format);
}


function shortcode_replacer($shortcode, $replace_with, $template_string)
{

    return str_replace($shortcode, $replace_with, $template_string);
}


function verification_code($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}


function site_precision()
{
    return config('constants.currency.precision.' . strtolower(config('constants.currency.base')));
}

function formatter_money($money, $currency = null)
{
    if (!$currency) $currency = config('constants.currency.base');
    // $money = number_format($money,2);
    $money = round($money, config('constants.currency.precision.' . strtolower($currency)));
    return $money;
}


function upload_image($file, $location, $size = null, $old = null, $thumb = null)
{
    $path = make_directory($location);
    if (!$path) throw new Exception('File could not been created.');

    if (!empty($old)) {
        remove_file($location . '/' . $old);
        remove_file($location . '/thumb_' . $old);
    }

    $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();

    $image = Image::make($file);
    if (!empty($size)) {
        $size = explode('x', $size);
        $image->resize($size[0], $size[1]);
    }
    $image->save($location . '/' . $filename);

    if (!empty($thumb)) {

        $thumb = explode('x', $thumb);
        Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
    }

    return $filename;
}


function upload_document($file, $location, $size = null, $old = null, $thumb = null)
{
     $path = make_directory($location);
      if (!$path) throw new Exception('File could not been created.');
      
       if (!empty($old)) {
        remove_file($location . '/' . $old);
    }
      
      $fileName =  uniqid() . time() . '.' . $file->getClientOriginalName();
        $file->move($location, $fileName);
     return $fileName;
            
}

function make_directory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function remove_file($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

function send_general_email($email, $subject, $message, $receiver_name = '')
{
    $general = GeneralSetting::first();

    if ($general->en != 1 || !$general->efrom) {
        return;
    }

    $message = shortcode_replacer("{{message}}", $message, $general->etemp);
    $message = shortcode_replacer("{{name}}", $receiver_name, $message);
    $config = $general->mail_config;

    if ($config->name == 'php') {
        send_php_mail($email, $receiver_name, $general->efrom, $subject, $message);
    } else if ($config->name == 'smtp') {
        send_smtp_mail($config, $email, $receiver_name, $general->efrom, $general->sitetitle, $subject, $message);
    } else if ($config->name == 'sendgrid') {
        send_sendgrid_mail($config, $email, $receiver_name, $general->efrom, $general->sitetitle, $subject, $message);
    } else if ($config->name == 'mailjet') {
        send_mailjet_mail($config, $email, $receiver_name, $general->efrom, $general->sitetitle, $subject, $message);
    }
}

function send_email($user, $type, $shortcodes = [])
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act', $type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) {
        return;
    }

    $message = shortcode_replacer("{{name}}", $user->username, $general->etemp);
    $message = shortcode_replacer("{{message}}", $email_template->email_body, $message);

    if (empty($message)) {
        $message = $email_template->email_body;
    }

    foreach ($shortcodes as $code => $value) {
        $message = shortcode_replacer('{{' . $code . '}}', $value, $message);
    }
    $config = $general->mail_config;

    if ($config->name == 'php') {
        send_php_mail($user->email, $user->username, $general->efrom, $email_template->subj, $message);
    } else if ($config->name == 'smtp') {
        send_smtp_mail($config, $user->email, $user->username, $general->efrom, $general->sitetitle, $email_template->subj, $message);
    } else if ($config->name == 'sendgrid') {
        send_sendgrid_mail($config, $user->email, $user->username, $general->efrom, $general->sitetitle, $email_template->subj, $message);
    } else if ($config->name == 'mailjet') {
        send_mailjet_mail($config, $user->email, $user->username, $general->efrom, $general->sitetitle, $email_template->subj, $message);
    }
}




function send_ticket_email($ticket, $type, $shortcodes = [])
{
    $general = GeneralSetting::first();
    $email_template = \App\EmailTemplate::where('act', $type)->where('email_status', 1)->first();
    if ($general->en != 1 || !$email_template) {
        return;
    }

    $message = shortcode_replacer("{{name}}", $user->username, $general->etemp);
    $message = shortcode_replacer("{{message}}", $email_template->email_body, $message);

    if (empty($message)) {
        $message = $email_template->email_body;
    }

    foreach ($shortcodes as $code => $value) {
        $message = shortcode_replacer('{{' . $code . '}}', $value, $message);
    }
    $config = $general->mail_config;

    if ($config->name == 'php') {
        send_php_mail($user->email, $user->username, $general->efrom, $email_template->subj, $message);
    } else if ($config->name == 'smtp') {
        send_smtp_mail($config, $user->email, $user->username, $general->efrom, $general->sitetitle, $email_template->subj, $message);
    } else if ($config->name == 'sendgrid') {
        send_sendgrid_mail($config, $user->email, $user->username, $general->efrom, $general->sitetitle, $email_template->subj, $message);
    } else if ($config->name == 'mailjet') {
        send_mailjet_mail($config, $user->email, $user->username, $general->efrom, $general->sitetitle, $email_template->subj, $message);
    }
}

function send_php_mail($receiver_email, $receiver_name, $sender_email, $subject, $message)
{
    $gnl = GeneralSetting::first();
    $headers = "From: $gnl->sitename <$sender_email> \r\n";
    $headers .= "Reply-To: $gnl->sitename <$sender_email> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    @mail($receiver_email, $subject, $message, $headers);
}

function send_smtp_mail($config, $receiver_email, $receiver_name, $sender_email, $sender_name, $subject, $message)
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = $config->host;
        $mail->SMTPAuth   = true;
        $mail->Username   = $config->username;
        $mail->Password   = $config->password;
        if ($config->enc == 'ssl') {
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        }else{
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        }
        $mail->Port       = $config->port;
        $mail->CharSet = 'UTF-8';
        //Recipients
        $mail->setFrom($sender_email, $sender_name);
        $mail->addAddress($receiver_email, $receiver_name);
        $mail->addReplyTo($sender_email, $receiver_name);

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->send();
    } catch (Exception $e) {
        throw new Exception($e); 
    }
}

function send_sendgrid_mail($config, $receiver_email, $receiver_name, $sender_email, $sender_name, $subject, $message)
{
    require 'core/app/Http/Helpers/Lib/Sendgrid/vendor/autoload.php';

    $sendgridMail = new \SendGrid\Mail\Mail();
    $sendgridMail->setFrom($sender_email, $sender_name);
    $sendgridMail->setSubject($subject);
    $sendgridMail->addTo($receiver_email, $receiver_name);
    $sendgridMail->addContent("text/html", $message);
    $sendgrid = new \SendGrid($config->appkey);
    try {
        $response = $sendgrid->send($sendgridMail);
    } catch (Exception $e) {
        // echo 'Caught exception: '. $e->getMessage() ."\n";
    }
}

function send_mailjet_mail($config, $receiver_email, $receiver_name, $sender_email, $sender_name, $subject, $message)
{
    require 'core/app/Http/Helpers/Lib/Mailjet/vendor/autoload.php';
    $mj = new \Mailjet\Client($config->public_key, $config->secret_key, true, ['version' => 'v3.1']);
    $body = [
        'Messages' => [
            [
                'From' => [
                    'Email' => $sender_email,
                    'Name' => $sender_name,
                ],
                'To' => [
                    [
                        'Email' => $receiver_email,
                        'Name' => $receiver_name,
                    ]
                ],
                'Subject' => $subject,
                'TextPart' => "",
                'HTMLPart' => $message,
            ]
        ]
    ];
    $response = $mj->post(\Mailjet\Resources::$Email, ['body' => $body]);
}


function send_sms($user, $type, $shortcodes = [])
{
    $general = GeneralSetting::first(['sn', 'smsapi','twilio_from','twilio_sid','twilio_token']);
    $sms_template = \App\SmsTemplate::where('act', $type)->where('sms_status', 1)->first();
    if ($general->sn == 1 && $sms_template) {
        $template = $sms_template->sms_body;
        foreach ($shortcodes as $code => $value) {
            $template = shortcode_replacer('{{' . $code . '}}', $value, $template);
        }
        try{
            $sid = $general->twilio_sid;
            $token = $general->twilio_token;

            $client = new Client($sid, $token);

            if($user->user)
                $mobile = $user->user->mobile;
            else
                $mobile = $user->mobile;
            $message = $client->messages->create(
              $mobile,
              [
                'from' => $general->twilio_from,
                'body' => $template
              ]
            );
            $result = true;
        }catch(TwilioException $e)
        {
            $result = false;
            // dd($e->getMessage());
        }
        
        return $result;
        // $template = urlencode($template);
        // $message = shortcode_replacer("{{number}}", $user->mobile, $general->smsapi);
        // $message = shortcode_replacer("{{message}}", $template, $message);
        // $result = @file_get_contents($message);
    }
}

function activeTemplate($asset = false)
{

    $gs = GeneralSetting::first(['active_template']);
    $template = $gs->active_template;

    $sess = Session::get('template');
    if (trim($sess) != null) {
        $template = $sess;
    }


    if ($asset) return 'assets/templates/' . $template . '/';
    return 'templates.' . $template . '.';
}

function activeTemplateName()
{
    $gs = GeneralSetting::first(['active_template']);
    $template = $gs->active_template;

    $sess = session()->get('template');
    if (trim($sess) != null) {
        $template = $sess;
    }
    return $template;
}

function recaptcha()
{
    $recaptcha = \App\Plugin::where('act', 'google-recaptcha2')->where('status', 1)->first();
    return $recaptcha ? $recaptcha->generateScript() : '';
}


function getCustomCaptcha($height = 46, $width = '200px', $bgcolor = '#003', $textcolor = '#abc')
{

    $captcha = \App\Plugin::where('act', 'custom-captcha')->where('status', 1)->first();

    $code = rand(100000, 999999);
    $char = str_split($code);
    $ret = '<link href="https://fonts.googleapis.com/css?family=Patrick+Hand&display=swap" rel="stylesheet">';
    $ret .= '<div style="height: ' . $height . 'px; line-height: ' . $height . 'px; width:' . $width . '; text-align: center; background-color: ' . $bgcolor . '; color: ' . $textcolor . '; font-size: ' . ($height - 20) . 'px; font-weight: bold; letter-spacing: 20px; font-family: \'Patrick Hand\', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;">';
    foreach ($char as $value) {
        $ret .= '<span style="    float:left;     -webkit-transform: rotate(' . rand(-60, 60) . 'deg);">' . $value . '</span>';
    }
    $ret .= '</div>';
    $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
    $ret .= '<input type="hidden" name="captcha_secret" value="' . $captchaSecret . '">';
    return $ret;
}

function captchaVerify($code, $secret)
{
    $captcha = \App\Plugin::where('act', 'custom-captcha')->where('status', 1)->first();
    $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
    if ($captchaSecret == $secret) {
        return true;
    }
    return false;
}

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function remove_element($array, $value)
{
    return array_diff($array, (is_array($value) ? $value : array($value)));
}

function cryptoQR($wallet, $amount, $crypto = null)
{

    $varb = $wallet . "?amount=" . $amount;
    return "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=$varb&choe=UTF-8";
}


function curlContent($url)
{
    //open connection
    $ch = curl_init();
    //set the url, number of POST vars, POST data

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //execute post
    $result = curl_exec($ch);

    //close connection
    curl_close($ch);

    return $result;
}


function str_slug($title = null)
{
    return \Illuminate\Support\Str::slug($title);
}

function str_limit($title = null, $length = 10)
{
    return \Illuminate\Support\Str::limit($title, $length);
}

function diffForHumans($date = null)
{
    return \Carbon\Carbon::parse($date)->diffForHumans();
}

function notify($user, $type, $shortcodes = null)
{
    send_email($user, $type, $shortcodes);
    send_sms($user, $type, $shortcodes);
}


function send_contact($to, $name, $subject, $message)
{
    $general = GeneralSetting::first();
    $from = $general->efrom;

    $config = $general->mail_config;
    if ($config->name == 'php') {
        send_php_mail($from, $general->sitename, $to, $subject, $message);
    } else if ($config->name == 'smtp') {
        send_smtp_mail($config, $from, $general->sitename, $to, $name, $subject, $message);
    } else if ($config->name == 'sendgrid') {
        send_sendgrid_mail($config, $from, $general->sitename, $to, $name, $subject, $message);
    } else if ($config->name == 'mailjet') {
        send_mailjet_mail($config, $from, $general->sitename, $to, $name, $subject, $message);
    }
}


function getIpInfo()
{
    $ip = Null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;


    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}




function levelCommision($id, $amount, $commissionType = ''){
    $usr = $id;
    $user = \App\User::find($id);
    $i = 1;
    $gnl = GeneralSetting::first();

    $level = \App\Referral::count();

    while($usr!="" || $usr!="0" || $i<$level ) {
        $me = \App\User::find($usr);

        $refer= \App\User::find($me->refer);


        if($refer == "") {
            break;
        }
        $comission = \App\Referral::where('level',$i)->first();

        if (!$comission) {
            break;
        }
        
        $com = ($amount * $comission->percent)/100;


        $referWallet = \App\UserWallet::where('user_id',$refer->id)->where('wallet_type','interest_wallet')->first();
        $new_bal = formatter_money($referWallet->balance +$com);
        $referWallet->balance = $new_bal;
        $referWallet->save();

        $trx = getTrx();

        \App\Trx::create([
            'user_id' => $refer->id,
            'amount' => formatter_money($com),
            'post_balance' => $new_bal,
            'charge' => 0,
            'trx_type' => '+',
            'remark' => 'Commission',
            'details' => $i.'  level Referral Commission From '.$user->username,
            'trx' => $trx,
        ]);

        \App\CommissionLog::create([
            'user_id' => $refer->id,
            'who' => $id,
            'level' => $i.' level Referral Commission From '.$user->username,
            'amount' => formatter_money($com),
            'main_amo' => $new_bal,
            'title' => $commissionType,
            'trx' => $trx,
        ]);


        notify($refer, $type = 'REFERRAL_COMMISSION', [
            'amount' =>  formatter_money($com),
            'main_balance' => $new_bal,
            'trx' => $trx,
            'level' => $i.' level Referral Commission',
            'currency' =>$gnl->cur_text
        ]);



        $usr = $refer->id;
        $i++;
    }

    return 0;

}



function showBelowUser($id){
    $under_ref = \App\User::where('refer',$id)->get();
    $print = array();
    $i = 2;
    foreach ($under_ref as $data) {
        $cc = \App\User::where('refer',$data->id)->count();
        echo "<li class=\"container\">";
        echo '<p>'. $print[] = $data->username .'</p>';
        if($cc>0){
            echo '<ul>';
            echo '<li class="container">';
            echo '<p>'. $print[] =  showBelowUser($data->id) .'</p>';
            echo '</li>';
            echo '</ul>';
        }
        echo "</li>";
        $i++;
    }
}

function site_name()
{
    $general = GeneralSetting::first();
    $sitname = str_word_count($general->sitename);
    $sitnameArr = explode(' ', $general->sitename);
    if ($sitname > 1) {
        $title = "<span>$sitnameArr[0] </span> ". str_replace($sitnameArr[0],'',$general->sitename);
    } else {
        $title = "<span>$general->sitename</span>";
    }

    return $title;
}




function curlPostContent($url, $arr = null)
{
    if ($arr) {
        $params = http_build_query($arr);
    } else {
        $params = '';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

function getLatestVersion()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://verify.thesoftking.com/updates/version/' . systemDetails()['name'];
    $result = curlPostContent($url, $param);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}

function getTemplates()
{
    $param['purchasecode'] = env("PURCHASECODE");
    $param['website'] = @$_SERVER['HTTP_HOST'] . @$_SERVER['REQUEST_URI'] . ' - ' . env("APP_URL");
    $url = 'https://verify.thesoftking.com/updates/templates/' . systemDetails()['name'];
    $result = curlPostContent($url, $param);
    if ($result) {
        return $result;
    } else {
        return null;
    }
}

function getPageSections($arr = false)
{

    $jsonUrl = resource_path('views/') . str_replace('.', '/', activeTemplate()) . 'sections.json';
    $sections = json_decode(file_get_contents($jsonUrl));
    if ($arr) {
        $sections = json_decode(file_get_contents($jsonUrl), true);
        asort($sections);
    }
    return $sections;
}

function inputTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}

function getContent($data_keys, $singleQuery = false, $limit = null)
{
    if ($singleQuery) {
        $content = \App\Frontend::where('data_keys', $data_keys)->latest()->first();
    } else {
        $article = \App\Frontend::query();
        $article->when($limit != null, function ($q) use ($limit) {
            return $q->limit($limit);
        });
        $content = $article->where('data_keys', $data_keys)->latest()->get();
    }
    return $content;
}
function getSharePrice($plan_id,$update = 0)
{
    $prev_price = PlanPriceHistory::where([['date',date('Y-m-d')],['plan_id',$plan_id]])->orderBy('id','DESC')->first();
    $plan = Plan::find($plan_id);

    if($prev_price)
        $share_price = $prev_price->share_price;
    else
        $share_price = $plan->current_share_price;

    $market_cap = $share_price * ($plan->total_supply - $plan->circulating_supply);
    $plan->market_cap = $market_cap;
    
    
    if(!$prev_price)
    {
        $share_price = $market_cap / ($plan->total_supply - $plan->circulating_supply);

        $plan_price = new PlanPriceHistory;
        $plan_price->plan_id = $plan_id;
        $plan_price->date = date('Y-m-d');
        $plan_price->share_price = $share_price;
        $plan_price->market_cap = $market_cap;
        $plan_price->outstanding_shares = $plan->total_supply - $plan->circulating_supply;
        $plan_price->save();
    }

    $plan->current_share_price = $share_price;
    $plan->save();
    return $share_price;
}
function updateSharesPrice($plan_id)
{
    $plan = Plan::find($plan_id);
    $prev_price = PlanPriceHistory::where([['date',date('Y-m-d')],['plan_id',$plan_id]])->orderBy('id','DESC')->first();

    $share_price = $plan->market_cap / ($plan->total_supply - $plan->circulating_supply);
    $market_cap = $share_price * ($plan->total_supply - $plan->circulating_supply);
    
    $plan->market_cap = $market_cap;
    $plan->current_share_price = $share_price;
    $plan->save();

    if($prev_price)
    {
        $prev_price->share_price = $share_price;
        $prev_price->market_cap = $market_cap;
        $prev_price->outstanding_shares = $plan->total_supply - $plan->circulating_supply;
        $prev_price->save();
    }
    else{
        $plan_his = new PlanPriceHistory;
        $plan_his->plan_id = $plan_id;
        $plan_his->date = date('Y-m-d');
        $plan_his->share_price = $share_price;
        $plan_his->market_cap = $market_cap;
        $plan_his->outstanding_shares = $plan->total_supply - $plan->circulating_supply;
        $plan_his->save();
    }
    

}
