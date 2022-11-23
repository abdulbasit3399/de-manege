@extends($activeTemplate .'layouts.master')

 @section('content')
 <style>
        .editor-statusbar {
            display: none;
        }

        .text-xs-center {
            text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }

      .header-top, .page-header > *{
            display:none !important;
        }

        .page-header{
             background-image: none !important;
             padding: 0px !important;
        }


        .header{
            top:0px;
            background:#000036;
        }

        header.inActive, header.active{
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
        }



.account--section{
    margin-top: 0px;
    padding-top:89.5px;
}

 .col-md-12.plan_document {
    padding: 40px 0;
}

.owl-carousel .owl-item img{
    max-height:60vh;
    object-fit:cover;
}

.plan_document p {
    display: inline-table;
    word-break: break-all;

}
.plan_document a
{
    font-size:50px;
}

.custom-button {
color: #FFFFFF !important;
    background: #F78F56;
    margin-top: 15px;
}

// .plan_details-section>.container-fluid {
//     width: 70%;
// }

.invest_now_btn {
    text-align: center;
}
@media only screen and (max-width: 1199px) {
.plan_details-section>.container-fluid {
    width: 60%;
}
}

@media only screen and (max-width: 991px){
.plan_details-section>.container-fluid {
    width: 80%;
}
}
@media (max-width: 575px){
.owl-nav {
    display: block;
}
}

@media only screen and (max-width: 767px){
.plan_details-section>.container-fluid .col-md-6 {
    width: 50%;
}
.plan_details-section>.container-fluid {
    width: 100%;
}
}

@media only screen and (max-width: 575px){
.plan_details-section>.container-fluid .col-md-6 {
    width: 100%;

}

.image-preview img.imagepreview {
    object-fit:cover;
    width: 100% !important;
}

.plan_document .col-md-3 {
    width: 30%;
}
}

.owl-prev, .owl-next{
    position:absolute;
    top:50%;
    transform:translateY(-50%);
    display:flex;
    align-items:center;
    justify-content:center;
       -webkit-transform: rotateY(0deg) !important;
    -ms-transform: rotateY(0deg) !important;
    transform: rotateY(0deg) !important;
}


.owl-prev{
    left:10px;
    right:auto;
    width:40px;
    height:40px;
    font-size:0px;
    background:#000;
    border-radius:50%;
}

.owl-next{
    left:auto;
    right:10px;
    width:40px;
    height:40px;
    font-size:0px;
    background:#000;
    border-radius:50%;
}

.owl-nav{
    position:initial !important;
}

.owl-next::before, .owl-prev::before{
        display: inline-block;
    font: normal normal normal 14px/1 FontAwesome;
    font-size: 24px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color:#fff;
    line-height:normal;
    width:24px;
    height:24px;
    display:flex;
    align-items:center;
    justify-content:center;
}



.owl-prev::before{
    content: "\f104";
}

.owl-next::before{
    content: "\f105";
}

.account--section{
    padding-left:0px !important;
    padding-right:0px !important;

}
.cust-row .col-md-11 {
    border-bottom: 1px solid #ececec82;
    padding-bottom: 30px;
    padding-top: 15px;
    margin-bottom: 15px;
}
.cust-row .col-md-4 h4 {
    font-size: 18px;
    color: #777777;
    font-weight: 500;
}
.cust-row .col-md-4 {
    align-self: center;
}
.cust-row .col-md-4 .custom-button {
    float: right;
}
.row.cust-row {
    margin: auto;
}
.overview h4 {
    color: #777777;
    font-weight: 500;
}
.overview {
    padding-top: 50px;
}


.property_details tbody th, .property_details tbody td{
    padding:1rem 12px !important;
}
    </style>
 @include($activeTemplate.'partials.frontend-breadcrumb')
  @php
    $time_name = \App\TimeSetting::where('time', $plans->times)->first();
 @endphp


<div class="account--section sign-in-section plan_details-section active relative">
        <div class="image-preview owl-carousel owl-theme">
            @php $img=json_decode($plans->plan_image) @endphp
            @if(isset($img))
                @foreach($img as $i)
                    <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item">
                @endforeach
            @endif
        </div>
        <div class="container mt-3">
            <div class="row ">

                <div class="col-md-10">
                <div class="row cust-row">
                    <div class="col-md-11">
                        <div class="row ">
                            <div class="col-md-8">
                            @if($plans->address!='')
                                <a href="http://maps.google.com/?q=1200/'{{$plans->address}}'"><i class="fa fa-map-marker" aria-hidden="true"></i></a>{{$plans->address}}
                            @else
                             <a style="display:none" href="http://maps.google.com/?q=1200/'{{$plans->address}}'"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                            @endif
                            </div>

                            <div class="col-md-4"><a href="#" style="float: right;" data-toggle="modal" data-target="#depoModal" data-resource="{{@$data}}"  class="btn btn-primary investButton">@lang('Invest Now')</a></div>
                        </div>
                    </div>
                </div>
                    <div class="form-group col-md-12">
                      <div class="row">
                          <div class="col-4">
                            <strong style="float:left; width:100%; display:block;">Name</strong>
                            <span  style="float:left; width:100%; display:block;">{{$plans->name}}</span>
                         </div>
                         <div class="col-4">
                            <strong style="float:left; width:100%; display:block;">Return</strong>
                            <span style="float:left; width:100%; display:block;">{{__($plans->interest)}} @if($plans->interest_status == 1) % @else {{__($plans->cur_text)}} @endif </span>
				        </div>
				        <div class="col-4">
                            <strong  style="float:left; width:100%; display:block;">Capital</strong>
    						@if($plans->capital_back_status == 1)
                                <span  style="float:left; width:auto%; display:block;" class="badge badge-success" style="font-size: 57%;">@lang('Capital Will Return Back')</span>
                            @elseif($plans->capital_back_status == 0)
                                <span  style="float:left; width:auto%; display:block;" class="badge badge-warning">@lang('Capital Will Store')</span>
                            @endif
                        </div>
                    </div>
				</div>
					<div class="form-group col-md-12">
					  <div class="row">
					     <div class="col-4">
                             <strong style="float:left; width:100%; display:block;">Terms</strong>
                             <span style="float:left; width:100%; display:block;">{{__($time_name->name)}} / @if($plans->lifetime_status == 0) {{__($plans->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif </span>
                        </div>
                        <div class="col-4">
                            @if($plans->fixed_amount == 0)
                            <strong style="float:left; width:100%; display:block;">Min</strong>
                            <span style="float:left; width:100%; display:block;">{{__($general->cur_sym)}}{{__(number_format($plans->minimum,2))}}</span>
                       </div>
                        <div class="col-4">
                            <strong style="float:left; width:100%; display:block;">max</strong>
                            <span style="float:left; width:100%; display:block;">{{__($general->cur_sym)}}{{__(number_format($plans->maximum,2))}}</span>
                            @else
                            <strong style="float:left; width:100%; display:block;">Invest Amount</strong>
                            <span style="float:left; width:100%; display:block;">{{__($general->cur_sym)}}{{__(number_format($plans->maximum,2))}}</span>
                            @endif
                        </div>
					</div>
            </div>

              @if(isset($plans->overview) && $plans->overview!='')
                <div class="col-md-12 overview">
                   <h4 class="mb-2">Overview</h4>
                   <?= $plans->overview ?>
                </div>
                @else
                 <div class="col-md-12 overview" style="display:none;">
                    <h4 class="mb-2">Overview</h4>
                    <?= $plans->overview ?>
                </div>
                @endif

                @if(isset($plans->investment_highlights) && $plans->investment_highlights!='')
                <div class="col-md-12 overview">
                   <h4 class="mb-2">Investment Highlights</h4>
                   <?= $plans->investment_highlights ?>
                </div>
                @else
                 <div class="col-md-12 overview" style="display:none;">
                    <h4 class="mb-2">Investment Highlights</h4>
                    <?= $plans->investment_highlights ?>
                </div>
                @endif

                @if(isset($plans->sponsor) && $plans->sponsor!='')
                <div class="col-md-12 overview">
                   <h4 class="mb-2">Sponsor</h4>
                    <?= $plans->sponsor ?>
                </div>
                @else
                <div class="col-md-12 overview" style="display:none;">
                   <h4 class="mb-2">Sponsor</h4>
                    <?= $plans->sponsor?>
                </div>
                @endif

                 @if(isset($plans->transaction_history) && $plans->transaction_history!='')
                <div class="col-md-12 overview">
                   <h4 class="mb-2">Transaction History</h4>
                    <?=$plans->transaction_history?>
                </div>
                @else
                 <div class="col-md-12 overview" style="display:none;">
                   <h4 class="mb-2">Transaction History</h4>
                   <?=$plans->transaction_history?>
                </div>
                @endif
                  @php $data=json_decode($plans->property_details) @endphp
                @if(isset($data) && $data!='')
                <div class="col-md-12 overview">
                    <h4 class="mb-2">Property Details</h4>
                                  <table class="table align-items-center table-light table-responsive-md property_details">
                                    <thead>
                                        <tr>
                                            <td>Tenent</td>
                                            <td>Unit</td>
                                            <td>Type</td>
                                            <td>Term</td>
                                            <td>Sf</td>
                                            <td>Start Date</td>
                                            <td>End Date</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Habit Burger</td>
                                              <td>{{ isset($data[0]->unit) ? ($data[0]->unit) :'' }}</td>
                                              <td>{{ isset($data[0]->Type) ? ($data[0]->Type) :''}}</td>
                                              <td>{{ isset($data[0]->Trem) ? ($data[0]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[0]->sf) ? ($data[0]->sf) :''}}</td>
                                              <td>{{ isset($data[0]->startdate) ? ($data[0]->startdate) :''}}</td>
                                              <td>{{ isset($data[0]->enddate) ? ($data[0]->enddate) :''}}</td>
                                        </tr>
                                         <tr>
                                            <td>Whealthy</td>
                                              <td>{{ isset($data[1]->unit) ? ($data[1]->unit) :'' }}</td>
                                              <td>{{ isset($data[1]->Type) ? ($data[1]->Type) :''}}</td>
                                              <td>{{ isset($data[1]->Trem) ? ($data[1]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[1]->sf) ? ($data[1]->sf) :''}}</td>
                                              <td>{{ isset($data[1]->startdate) ? ($data[1]->startdate) :''}}</td>
                                              <td>{{ isset($data[1]->enddate) ? ($data[1]->enddate) :''}}</td>
                                        </tr>
                                         <tr>
                                            <td>Taqueria Zamora</td>
                                               <td>{{ isset($data[2]->unit) ? ($data[2]->unit) :'' }}</td>
                                              <td>{{ isset($data[2]->Type) ? ($data[2]->Type) :''}}</td>
                                              <td>{{ isset($data[2]->Trem) ? ($data[2]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[2]->sf) ? ($data[2]->sf) :''}}</td>
                                              <td>{{ isset($data[2]->startdate) ? ($data[2]->startdate) :''}}</td>
                                              <td>{{ isset($data[2]->enddate) ? ($data[2]->enddate) :''}}</td>
                                        </tr>
                                         <tr>
                                              <td>Vacant Retail</td>
                                                <td>{{ isset($data[3]->unit) ? ($data[3]->unit) :'' }}</td>
                                              <td>{{ isset($data[3]->Type) ? ($data[3]->Type) :''}}</td>
                                              <td>{{ isset($data[3]->Trem) ? ($data[3]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[3]->sf) ? ($data[3]->sf) :''}}</td>
                                              <td>{{ isset($data[3]->startdate) ? ($data[3]->startdate) :''}}</td>
                                              <td>{{ isset($data[3]->enddate) ? ($data[3]->enddate) :''}}</td>
                                        </tr>
                                         <tr>
                                               <td>Chase Bank</td>
                                              <td>{{ isset($data[4]->unit) ? ($data[4]->unit) :'' }}</td>
                                              <td>{{ isset($data[4]->Type) ? ($data[4]->Type) :''}}</td>
                                              <td>{{ isset($data[4]->Trem) ? ($data[4]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[4]->sf) ? ($data[4]->sf) :''}}</td>
                                              <td>{{ isset($data[4]->startdate) ? ($data[4]->startdate) :''}}</td>
                                              <td>{{ isset($data[4]->enddate) ? ($data[4]->enddate) :''}}</td>
                                        </tr>
                                         <tr>
                                            <td>Med Office 1- Vacant</td>
                                             <td>{{ isset($data[5]->unit) ? ($data[5]->unit) :'' }}</td>
                                              <td>{{ isset($data[5]->Type) ? ($data[5]->Type) :''}}</td>
                                              <td>{{ isset($data[5]->Trem) ? ($data[5]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[5]->sf) ? ($data[5]->sf) :''}}</td>
                                              <td>{{ isset($data[5]->startdate) ? ($data[5]->startdate) :''}}</td>
                                              <td>{{ isset($data[5]->enddate) ? ($data[5]->enddate) :''}}</td>
                                        </tr>
                                          <tr>
                                            <td>Med Office 2- Vacant</td>
                                             <td>{{ isset($data[6]->unit) ? ($data[6]->unit) :'' }}</td>
                                              <td>{{ isset($data[6]->Type) ? ($data[6]->Type) :''}}</td>
                                              <td>{{ isset($data[6]->Trem) ? ($data[6]->Trem) :''}} Year</td>
                                              <td>{{ isset($data[6]->sf) ? ($data[6]->sf) :''}}</td>
                                              <td>{{ isset($data[6]->startdate) ? ($data[6]->startdate) :''}}</td>
                                              <td>{{ isset($data[6]->enddate) ? ($data[6]->enddate) :''}}</td>
                                        </tr>
                                         <tr>
                                            <td>Total/Average</td>
                                              <td></td>
                                              <td></td>
                                              <td>{{ $data[0]->Trem + $data[1]->Trem + $data[2]->Trem  + $data[3]->Trem  + $data[4]->Trem  + $data[5]->Trem + $data[6]->Trem }} Year</td>
                                              <td>{{ $data[0]->sf + $data[1]->sf + $data[2]->sf  + $data[3]->sf  + $data[4]->sf  + $data[5]->sf + $data[6]->sf }}</td>
                                              <td></td>
                                              <td></td>
                                        </tr>
                                    </tbody>
                                  </table>
                </div>
                 @endif
                @if(isset($plans->risk_disclosures) && $plans->risk_disclosures!='')
                <div class="col-md-12 overview">
                   <h4 class="mb-2">Risk Disclosures</h4>
                    <?= $plans->risk_disclosures ?>
                </div>
               @else
                   <div class="col-md-12 overview" style="display:none;">
                   <h4 class="mb-2">Risk Disclosures</h4>
                     <?= $plans->risk_disclosures ?>
                </div>
               @endif
               @if($plans->plan_document!='')
                <div class="col-md-12 overview ">
                   <h4 class="mb-2">Documents</h4>
                     <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6">
                            <p></p>
                          </div>
                          <div class="col-md-6">
                          <a class="mb-4" style="float: right;color: gray;font-size: 20px;" href="javascript;"  onclick="downloadFiles();" >Download All <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                @else
                 <div class="col-md-12 overview" style="display:none;">
                   <h4 class="mb-2">Documents</h4>
                     <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6">
                            <p></p>
                          </div>
                          <div class="col-md-6">
                          <a class="mb-4" style="float: right;color: gray;font-size: 20px;" href="javascript;"  onclick="downloadFiles();" >Download All <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                @endif
                              @php
                $plan_documents = json_decode($plans->plan_document,true);
                 @endphp
                @if($plan_documents && !empty($plan_documents))
                  @foreach($plan_documents as $p)
                   @php
                      $extension =\File::extension($p);;
                   @endphp

                     @if($extension=='csv')
                    <div class="row">
                    <div class="col-md-12">
                      <div class="row mb-2">
                          <div class="col-md-6 col-8">
                            <p style="margin-top: 0px; float:left; width:100%; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:400px;"><img src="../../assets/images/csv_icon.svg" style="height: 35px;width: 35px; margin-right:10px;"> {{ $p }}</p>
                          </div>
                          <div class="col-md-6 col-4">
                          <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                      @endif
                      @if($extension=='txt')
                       <div class="row">
                    <div class="col-md-12">
                      <div class="row mb-2">
                          <div class="col-md-6 col-8">
                            <p style="margin-top: 0px; float:left; width:100%; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:400px;"><img src="../../assets/images/txt_icon.svg" style="height: 35px;width: 35px; margin-right:10px;"> {{ $p }}</p>
                          </div>
                          <div class="col-md-6 col-4">
                          <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                      @endif

                      @if($extension=='xls')
                 <div class="row">
                    <div class="col-md-12">
                      <div class="row mb-2">
                          <div class="col-md-6 col-8">
                            <p style="margin-top: 0px; float:left; width:100%; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:400px;"><img src="../../assets/images/xls_icon.svg" style="height: 35px;width: 35px; margin-right:10px;"> {{ $p }}</p>
                          </div>
                          <div class="col-md-6 col-4">
                          <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                      @endif
                       @if($extension=='pdf')
                    <div class="row mb-2">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6 col-8">
                            <p style="margin-top: 0px; float:left; width:100%; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:400px;"><img src="../../assets/images/pdf_icon.svg" style="height: 35px;width: 35px; margin-right:10px;"> {{ $p }}</p>
                          </div>
                          <div class="col-md-6 col-4">
                          <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                      @endif
                      @if($extension=='docx')
                    <div class="row mb-2">
                    <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-6 col-8">
                            <p style="margin-top: 0px; float:left; width:100%; display:block; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:400px;"><img src="../../assets/images/docx_icon.svg" style="height: 35px;width: 35px; margin-right:10px;"> {{ $p }}</p>
                          </div>
                          <div class="col-md-6 col-4">
                          <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > <i class="fa fa-download" aria-hidden="true"></i></a>
                          </div>
                      </div>
                    </div>
                    </div>
                      @endif
                  @endforeach
                @endif

                </div>
            </div>

        </div>
    </div>
    <!-- ========Header-Section Ends Here ========-->
</div>


@endsection

@push('renderModal')



    @php
        $wallets = \App\UserWallet::where('user_id', Auth::id())->get();
    @endphp
    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <strong class="modal-title" id="ModalLabel">

                        @guest
                            @lang('At First Sign In your Account')
                        @else
                            @lang('Confirm to invest on') <span class="planName"></span>
                        @endguest
                    </strong>
                    <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </a>
                </div>
                <form action="{{route('user.buy.plan')}}" method="post">
                    @csrf
                    @auth
                        <div class="modal-body">

                            <div class="form-group">
                                <h6 class="text-center investAmountRenge"></h6>

                                <p class="text-center mt-1 interestDetails"></p>
                                <p class="text-center interestValidaty"></p>

                                <div class="form-group">
                                    <strong>@lang('Select Wallet')</strong>
                                    <select class="form-control" name="wallet_type">
                                        @foreach($wallets as $k=>$data)
                                            <option value="{{$data->id}}"> {{__(str_replace('_',' ',$data->wallet_type))}}
                                                ({{formatter_money($data->balance)}} {{__($general->currency)}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="plan_id" class="plan_id">


                                <div class="form-group">
                                    <strong>@lang('Invest Amount')</strong>
                                    <input type="text" class="form-control fixedAmount" id="fixedAmount" name="amount"
                                           value="{{old('amount')}}"
                                           onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm"
                                    data-dismiss="modal">@lang('No')</button>

                            <button type="submit" class="btn btn-success ">@lang('Yes')</button>
                        </div>
                    @endauth

                    @guest

                        <div class="modal-footer">
                            <a href="{{route('user.login')}}" type="button"
                               class="btn btn-success custom-success">@lang('Please, Signin your account at first')</a>
                        </div>
                    @endguest
                </form>
            </div>
        </div>
    </div>
@endpush



@push('script')

    <script>

        (function ($) {
            "use strict";

            $(document).ready(function () {
                $('.investButton').on('click', function () {
                    var data = $(this).data('resource');
                    var symbol = "{{__($general->cur_sym)}}";
                    var currency = "{{__($general->cur_text)}}";

                    if (data.fixed_amount == '0') {
                        $('.investAmountRenge').text(`@lang('Invest'): ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
                        $('.fixedAmount').val('');
                        $('#fixedAmount').attr('readonly', false);

                    } else {
                        $('.investAmountRenge').text(`@lang('Invest'): ${symbol}${data.fixed_amount}`);
                        $('.fixedAmount').val(data.fixed_amount);

                        $('#fixedAmount').attr('readonly', true);
                    }

                    if (data.interest_status == '1') {
                        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} % </strong>`);
                    } else {
                        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} ${currency}  </strong>`);
                    }
                    if (data.lifetime_status == '0') {
                        $('.interestValidaty').html(`<strong>  @lang('Per') ${data.times} @lang('Hours') ,  ${data.repeat_time} @lang('Times')</strong>`);
                    } else {
                        $('.interestValidaty').html(`<strong>  @lang('Per') ${data.times} @lang('Hours'),  @lang('Lifetime') </strong>`);
                    }

                    $('.planName').text(data.name);
                    $('.plan_id').val(data.id);

                });
            });
        })(jQuery);

    </script>

 <script>
  $('.owl-carousel').owlCarousel({
    loop:true,
    margin:0,
    nav:true,
    responsive:{
        0:{
            items:1
        }
    }
})
function downloadFiles() {
    event.preventDefault();
     @if($plan_documents && !empty($plan_documents))
        @foreach($plan_documents as $p)
            window.open(" {{  get_file(config('constants.admin.plan_document.path').'/'. $p) }}");
   @endforeach
   @endif

}
 </script>


@endpush
