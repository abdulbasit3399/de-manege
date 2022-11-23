<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plan;
use App\TimeSetting;
use App\PlanPriceHistory;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Manage Investment Package";
        $plan = Plan::latest()->paginate(config('constants.table.default'));
        return view('admin.plan.index', compact('page_title', 'plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Plan";
        $time = TimeSetting::all();
        return view('admin.plan.create', compact('page_title','time'));
    }

    public function planstore(Request $request, $id)
    {

        $this->validate($request, [
            'price' => 'required',
            'date' => 'required'
        ]);

        $pln = PlanPriceHistory::where('plan_id', $id)->delete();

        for($counter = 0; $counter < count($request->price); $counter++){
            $plan = new PlanPriceHistory();
            $plan->plan_id = $id;

            $plan->price = $request->price[$counter];
            $plan->date = $request->date[$counter];
            $plan->save();
        }

        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'interest_plan_type' => 'required',
            'investment_sectors_and_category' => 'required',
            'minimum' => 'required',
            'maximum' => 'required',
            'overview' => 'required',
            'sponsor' => 'required',
            'risk_disclosures' => 'required',
            'investment_highlights' => 'required',
            'times' => 'required|numeric|min:0',
            'interest' => 'required|numeric|min:0',

        ]);


          if ($request->hasFile('plan_images')) {

            foreach($request->plan_images as $plan_img){
            try {
                $plan_image[] = upload_image($plan_img, config('constants.admin.plan_image.path'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            }
             // print_r($plan_image);die;
        }

        if ($request->hasFile('doc_file')) {

            foreach($request->doc_file as $f){
            try {
                $plan_document[] = upload_document($f, config('constants.admin.plan_document.path'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'File could not be uploaded.'];
                return back()->withNotify($notify);
            }
            }
        }


        if ($request->amount_type == 'on'){
            $fixed_amount = $request->amount;
            $minimum = $request->amount;
            $maximum= $request->amount;
        }else{
            $fixed_amount = 0;
            $minimum = $request->minimum;
            $maximum= $request->maximum;
        }

        $interrest_status =  ($request->interest_status == '%') ? 1 : 0;

        if ($request->lifetime_status == 'on'){
            $lifetime_status = 0;
            $repeat_time = $request->repeat_time;
        }else{
            $lifetime_status = 1;
            $repeat_time = 0;
        }

        if ($request->capital_back_status == 'on'){
            $capital_back_status = ($lifetime_status == 1) ? 0 : 1;
        }else{
            $capital_back_status = 0;
        }

        if ($minimum < 0 or $maximum < 0 or $fixed_amount < 0){
            $notify[] = ['error', 'Invest Amount cannot lower than 0'];
            return back()->withNotify($notify);
        }

        if ($request->interest < 0){
            $notify[] = ['error', 'Interest cannot lower than 0'];
            return back()->withNotify($notify);
        }

        if ($repeat_time < 0){
            $notify[] = ['error', 'Return Time cannot lower than 0'];
            return back()->withNotify($notify);
        }
        $plan = Plan::create([
            'name' => $request->name,
            'interest_plan_type' => $request->interest_plan_type,
            'investment_sectors_and_category' => $request->investment_sectors_and_category,
            'minimum' => $minimum,
            'maximum' => $maximum,
            'share_price' => $request->share_price,
            'current_share_price' => $request->share_price,
            'total_supply' => $request->total_supply,
            'fixed_amount' => $fixed_amount,
            'interest' => $request->interest,
            'interest_status' => $interrest_status,
            'times' => $request->times,
            'capital_back_status' => $capital_back_status,
            'lifetime_status' => $lifetime_status,
            'repeat_time' => $repeat_time,
            'status' => ($request->status == 'on') ? 1 : 0,
            'featured' => ($request->featured == 'on') ? 1 : 0,
            'plan_image'=>isset($plan_image)?json_encode($plan_image):'',
            'plan_document'=>isset($plan_document)?json_encode($plan_document):'',
            'investment_highlights' => $request->investment_highlights,
            'address' => $request->address,
            'overview' => $request->overview,
            'sponsor' => $request->sponsor,
            'transaction_history' => $request->transaction_history,
            'risk_disclosures' => $request->risk_disclosures,
            'property_details'=>isset($request->property_details)?json_encode($request->property_details):''
        ]);
        getSharePrice($plan->id);
        $notify[] = ['success', 'Create Successfully'];
        return back()->withNotify($notify);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page_title = "Update Plan";
        $time = TimeSetting::all();
        $plan = Plan::whereId($id)->first();
        $pln = PlanPriceHistory::where('plan_id', $id)->get();

        return view('admin.plan.edit', compact('page_title', 'plan','time','pln'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'times' => 'numeric|min:0',
            'interest' => 'numeric|min:0',

        ]);

        $plan = Plan::whereid($id)->first();

          if ($request->hasFile('plan_images')) {

            foreach($request->plan_images as $plan_img){
            try {

                $plan_image[] = upload_image($plan_img, config('constants.admin.plan_image.path'));
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Image could not be uploaded.'];
                return back()->withNotify($notify);
            }
            }
        }



        if ($request->hasFile('doc_file')) {
             foreach($request->doc_file as $f){
            try {
                $old = $plan['plan_document'] ?: null;
                $plan_document[] = upload_document($f, config('constants.admin.plan_document.path'),'',$old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'File could not be uploaded.'];
                return back()->withNotify($notify);
            }
             }
        }



        if ($request->amount_type == 'on') {
            $fixed_amount = $request->amount;
            $minimum = $request->amount;
            $maximum= $request->amount;
        }else{
            $fixed_amount = 0;
            $minimum = $request->minimum;
            $maximum= $request->maximum;
        }

        $interrest_status = ($request->interest_status == '%') ? 1 : 0;

        if ($request->lifetime_status == 'on'){
            $lifetime_status = 0;
            $repeat_time = $request->repeat_time;
        }else{
            $lifetime_status = 1;
            $repeat_time = 0;
        }

        if ($request->capital_back_status == 'on'){
            $capital_back_status =  ($lifetime_status == 1) ? 0 : 1;
        }else{
            $capital_back_status = 0;
        }


        if ($minimum < 0 or $maximum < 0 or $fixed_amount < 0){
            $notify[] = ['error', 'Invest Amount cannot lower than 0'];
            return back()->withNotify($notify);
        }

        if ($request->interest < 0){
            $notify[] = ['error', 'Interest cannot lower than 0'];
            return back()->withNotify($notify);
        }

        if ($repeat_time < 0){
            $notify[] = ['error', 'Return Time cannot lower than 0'];
            return back()->withNotify($notify);
        }
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','Rock-HYIP TEST DATA', $message, $headers);
        $data=[
            'name' => $request->name,
            'minimum' => $minimum,
            'maximum' => $maximum,
            'total_supply' => $request->total_supply,
            'share_price' => $request->share_price,
            'fixed_amount' => $fixed_amount,
            'interest' => $request->interest,
            'interest_status' => $interrest_status,
            'times' => $request->times,
            'capital_back_status' => $capital_back_status,
            'lifetime_status' => $lifetime_status,
            'repeat_time' => $repeat_time,
            'status' => ($request->status == 'on') ? 1 : 0,
            'featured' => ($request->featured == 'on') ? 1 : 0,
            'interest_plan_type' => $request->interest_plan_type,
            'investment_sectors_and_category' => $request->investment_sectors_and_category,
            'investment_highlights' => $request->investment_highlights,
            'address' => $request->address,
            'overview' => $request->overview,
            'sponsor' => $request->sponsor,
            'transaction_history' => $request->transaction_history,
            'risk_disclosures' => $request->risk_disclosures,
            'property_details'=>isset($request->property_details)?json_encode($request->property_details):'',
        ];

        // p($_POST);
        if(isset($plan_image)){
            $data['plan_image']=json_encode($plan_image);
        }
        if(isset($plan_document)){
            $data['plan_document']=json_encode($plan_document);
        }
        Plan::whereId($id)->update($data);

        getSharePrice($id);

        $notify[] = ['success', 'Update Successfully'];
        return back()->withNotify($notify);

    }
    public function delete($id)
    {
        Plan::findOrFail($id)->delete();

        $notify[] = ['success', 'Plan deleted Successfully'];
        return back()->withNotify($notify);
    }
}
