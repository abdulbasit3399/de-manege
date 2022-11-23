<?php

namespace App\Http\Controllers;

use App\Frontend;
use App\GeneralSetting;
use App\Language;
use App\Page;
use App\Plan;
use App\Country;
use App\Invest;
use App\Subscriber;
use App\SupportAttachment;
use App\SupportMessage;
use App\SupportTicket;
use App\UserWallet;
use App\Tile;
use App\User;
use App\Purchase;



use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class SiteController extends Controller
{
    public function home()
    {

        $count = Page::where('tempname',activeTemplate())->where('slug','home')->count();
        if($count == 0){
            $in['tempname'] = activeTemplate();
            $in['name'] = 'HOME';
            $in['slug'] = 'home';
            Page::create($in);
        }
        $tile = Tile::all();
        $user = User::all();
        $data['page_title'] = 'Home';
        $data['sections'] = Page::where('tempname',activeTemplate())->where('slug','home')->firstOrFail();
        // return view('templates.minimal.home', $data);
        return view(activeTemplate() . 'home', $data)->with('tile', $tile)->with('user', $user);
    }

    public function pages($slug)
    {
        $page = Page::where('tempname',activeTemplate())->where('slug',$slug)->firstOrFail();
        $data['page_title'] = $page->name;
        $data['sections'] = $page;
        return view(activeTemplate() . 'pages', $data);
    }

    public function planCalculator(Request $request)
    {

        if ($request->planId == null) {
            return response(['errors'=> 'Please Select a Plan!']);
        }

        $requestAmount = $request->investInput;
        if ($requestAmount == null ||  0 > $requestAmount) {
            return response(['errors'=> 'Please Enter Invest Amount!']);
        }


        $gnl = GeneralSetting::first();


        $plan = Plan::where('id', $request->planId)->where('status', 1)->first();
        if (!$plan) {
            return response(['errors'=> 'Invalid Plan!']);
        }

        if ($plan->fixed_amount == '0') {
            if ($requestAmount < $plan->minimum) {
                return response(['errors'=> 'Minimum Invest ' . formatter_money($plan->minimum) . ' ' . $gnl->cur_text]);
            }
            if ($requestAmount > $plan->maximum) {
                return response(['errors'=> 'Maximum Invest ' . formatter_money($plan->maximum) . ' ' . $gnl->cur_text]);
            }
        } else {
            if ($requestAmount != $plan->fixed_amount) {
                return response(['errors'=> 'Fixed Invest amount ' . formatter_money($plan->fixed_amount) . ' ' . $gnl->cur_text]);
            }
        }


        //start
        if ($plan->interest_status == 1) {
            $interest_amount = ($requestAmount * $plan->interest) / 100;
//            $result['interest_amount'] = $interest_amount . "%";
            $result['interest_amount'] = $interest_amount . " ".$gnl->cur_text;
        } else {
            $interest_amount = $plan->interest;
            $result['interest_amount'] = $interest_amount . " ".$gnl->cur_text;
        }

        $period = ($plan->lifetime_status == 1) ? '-1' : $plan->repeat_time;


        if($plan->lifetime_status == '0'){
            $result['interestValidity'] =  'Per '. $plan->times . ' Hours, '. $plan->repeat_time. " Times";
        }else{
            $result['interestValidity'] =  'Per '. $plan->times . " Hours,  Lifetime";
        }
        return response($result);
        //end
    }
    public function register($reference)
    {
        $page_title = "Sign Up";
        $country=Country::select('country_code','country_name')->get();
        return view(activeTemplate() . 'user.auth.register', compact('reference', 'page_title','country'));
    }

    public function changeLang($lang)
    {
        $language = Language::where('code', $lang)->first();
        if (!$language) $lang = 'en';
        session()->put('lang', $lang);
        return redirect()->back();
    }

    public function plan()
    {

        $data['page_title'] = "Investment Plan";
        $data['plans'] = Plan::where('status', 1)->get();
        $data['wallets'] = UserWallet::where('user_id', Auth::id())->get();
        // return view('templates.new_minimal.plan', $data);
        return view(activeTemplate() . 'plan', $data);
    }

    public function purchase()
    {

        $data['page_title'] = "New Purchase";
        $data['plans'] = Plan::where('status', 1)->get();
        $data['wallets'] = UserWallet::where('user_id', Auth::id())->get();
        // return view('templates.new_minimal.plan', $data);

        return view('templates.minimal.purchase', $data);
    }

    public function purchaseEdit($id)
    {
       $data['page_title'] = "Purchase Edit";
       $data['pur'] = Purchase::where('id', $id)->first();
       return view('templates.minimal.purchase_edit', $data);
    }

    public function plan_document($id)
    {
       $data['page_title'] = "Plan Document Details";
       $data['plans'] = Plan::where('id', $id)->first();
       return view(activeTemplate() . 'plan_documents', $data);
    }


    public function invest()
    {
        $data['page_title'] = "My Investment";
        $data['invest_plan'] = Invest::where('status', 1)->where('user_id', Auth::id())->get();
        //p($data['invest_plan']);
        $invest_plan = Invest::where('status', 1)->where('user_id', Auth::id())->get();
        //p($invest_plan);
        foreach($invest_plan as $key=>$i)
        {
            $plan = Plan::where('id',$i['plan_id'])->get();

            $invest_plan[$key]['plan_name'] = $plan[0]['name'];
            $invest_plan[$key]['total_amount'] = $i['amount'] + $i['interest'];
        }

      $data['invest_plan'] = $invest_plan;
        // return view('templates.new_minimal.invest', $data);
        return view(activeTemplate() . 'invest', $data);
    }

    public function purchaseIndex()
    {
        $data['page_title'] = "Purchases";
        $data['pur'] = Purchase::all();

        return view('templates.minimal.purchase-index', $data);
    }


    public function blog()
    {
        $blogs = Frontend::where('data_keys', 'blog.element')->latest()->paginate(9);
        $recentBlog = Frontend::where('data_keys', 'blog.element')->latest()->limit(8)->get();
        $page_title = "Blog";
        return view(activeTemplate() . 'blog', compact('blogs', 'page_title', 'recentBlog'));
    }

    public function blogDetails($slug = null, $id, $data_keys = 'blog.element')
    {
        $post = Frontend::where('id', $id)->where('data_keys', $data_keys)->firstOrFail();


        $page_title = "Blog Details";
        $data['title'] = $post->data_values->title;
        $data['details'] = $post->data_values->description;
        $data['image'] =  asset('assets/images/frontend/blog/'.$post->data_values->image);
        $recentBlog = Frontend::where('data_keys', 'blog.element')->latest()->limit(8)->get();
        return view(activeTemplate() . 'blog-details', compact('recentBlog', 'post', 'data', 'page_title'));
    }
    public function contact()
    {
        $data['page_title'] = "Contact Us";
        $data['contact'] = Frontend::where('data_keys', 'contact_us.content')->firstOrFail();
        return view(activeTemplate() . 'contact', $data);
    }

    public function contactSubmit(Request $request)
    {
        $ticket = new SupportTicket();
        $message = new SupportMessage();

        $imgs = $request->file('attachments');
        $allowedExts = array('jpg', 'png', 'jpeg', 'pdf');

        $validator = $this->validate($request, [
            'attachments' => [
                'sometimes',
                'max:4096',
                function ($attribute, $value, $fail) use ($imgs, $allowedExts) {
                    foreach ($imgs as $img) {
                        $ext = strtolower($img->getClientOriginalExtension());
                        if (($img->getClientSize() / 1000000) > 2) {
                            return $fail("Images MAX  2MB ALLOW!");
                        }
                        if (!in_array($ext, $allowedExts)) {
                            return $fail("Only png, jpg, jpeg, pdf images are allowed");
                        }
                    }
                    if (count($imgs) > 5) {
                        return $fail("Maximum 5 images can be uploaded");
                    }
                },
            ],
            'name' => 'required|max:191',
            'email' => 'required|max:191',
            'subject' => 'required|max:100',
            'message' => 'required',
        ]);



        $random = getNumber();

        if(Auth::user()){
            $ticket->user_id = Auth::id();
            $ticket->name = Auth::user()->fullname;
            $ticket->email = Auth::user()->email;
        }else{
            $ticket->user_id = null;
            $ticket->name = $request->name;
            $ticket->email = $request->email;
        }



        $ticket->ticket = $random;
        $ticket->subject = $request->subject;
        $ticket->last_reply = Carbon::now();
        $ticket->status = 0;
        $ticket->save();

        $message->supportticket_id = $ticket->id;
        $message->message = $request->message;
        $message->save();


        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $image) {
                $filename = rand(1000, 9999) . time() . '.' . $image->getClientOriginalExtension();
                $image->move('assets/images/support', $filename);
                SupportAttachment::create([
                    'support_message_id' => $message->id,
                    'image' => $filename,
                ]);
            }
        }
        $notify[] = ['success', 'ticket created successfully!'];

        return redirect()->route('ticket.view',[$ticket->ticket])->withNotify($notify);



        /*



        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email',
            'message' => 'required',
            'subject' => 'required'
        ]);
        $subject = $request->subject;
        $txt = "<br><br>" . $request->message;
        $txt .= "<br><br>" . "Contact Number : " . $request->phone . "<br>";
        send_contact($request->email, $request->name, $subject, $txt);
        $notify[] = ['success', 'Contact Message Send'];
        return back()->withNotify($notify);

        */
    }


    public function rules()
    {
        $page_title = "RULES & REGULATION";
        $rules = Frontend::where('data_keys', 'rules.element')->get();
        $ruleheads = Frontend::where('data_keys', 'rules.content')->latest()->first();
        return view(activeTemplate() . 'rules', compact('rules', 'page_title', 'ruleheads'));
    }

    public function policyInfo($id, $slug = null)
    {
        $menu = Frontend::where('data_keys', 'company_policy.element')->where('id', $id)->firstOrFail();
        $page_title = $menu->data_values->title;
        return view(activeTemplate() . 'policy', compact('menu', 'page_title'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $macCount = Subscriber::where('email', trim(strtolower($request->email)))->count();
        if ($macCount > 0) {
            $notify[] = ['error', 'This Email Already Exist !!'];
            return redirect()->to(url()->previous() . "#subscribe")->withNotify($notify)->withInput();

        } else {
            Subscriber::create($request->only('email'));
            $notify[] = ['success', 'Subscribe Successfully!'];
            return redirect()->to(url()->previous() . "#subscribe")->withNotify($notify);

        }
    }
}
