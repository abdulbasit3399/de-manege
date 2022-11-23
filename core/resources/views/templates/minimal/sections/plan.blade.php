<style>
.view_more{
    display:table;
    margin:0 auto;
}
.ticket-item {
    border-radius: 0;
}



.ticket-item {
    border-radius: 0;
    padding: 0;
}

.ticket-item .bottom {
    padding: 20px 15px;
}

.ticket-item .image-preview .imagepreview {
    width: 100% !important;
    display: block;
    margin-bottom: 0 !important;
    max-height: 270px;
    height: 270px !important;
    object-fit: cover;
}

.ticket-item .bottom p, section.ticket-section .ticket-item .bottom h6 {
    color: #2A2B30;
}

.ticket-item .bottom .total .row.flex-row div {
    color: #2A2B30;
}
.bg-1, .bg-2, .bg-3, .bg-4, .bg-5, .bg-6, .bg-7, .bg-8 {
    background-image: unset !important;
    box-shadow: 0 1px 2px 0 rgb(42 43 48 / 15%);
}

 .ticket-item .bottom h6 {
    color: #2A2B30;
}
.bottom .info .badge {
    margin-bottom: 15px;
}

.ticket-item .bottom .total .row.flex-row .value {
    font-weight: 500;
}

.ticket-item .bottom .total .row.flex-row div {
    color: #2A2B30;
    text-align: left;
}

.ticket-item .bottom .total .flex-row .attribute {
    margin-top: 15px;
    color: #515151 !important;
    font-weight: 300;
}

.bottom .info {
    margin-bottom: 15px;
    border-bottom: 1px solid #BDC3C6;
    padding-bottom: 16px;
}

.ticket-item .bottom h6 {
    margin-bottom: 15px;
}

.ticket-item .custom-button {
    color: #FFFFFF !important;
    background: #F78F56;
    margin-top: 15px;
}

@media only screen and (max-width: 767px) {
  .ticket-item .bottom .total .flex-row .col-md-6 {
    width: 50%;
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
    width:20px;
    height:20px;
    font-size:0px;
    background:#000;
    border-radius:50%;
}

.owl-next{
    left:auto;
    right:10px;
    width:20px;
    height:20px;
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
    font-size: 16px;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    color:#fff;
    line-height:normal;

}

.owl-prev::before{
    content: "\f104";
}

.owl-next::before{
    content: "\f105";
}


</style>
@php
    $planCaption = getContent('plan.content',true);

@endphp
@if($planCaption)
    @php
        $plans = \App\Plan::where('status', 1)->where('featured', 1)->latest()->get();
    @endphp
    <!-- ========Ticket-Section Starts Here ========-->
    <section class="ticket-section  c-shape-wrapper padding">
        <div class="c-shape01" data-paroller-factor="-0.30" data-paroller-factor-lg="0.60"
             data-paroller-type="foreground" data-paroller-direction="horizontal">
            <img src="{{asset('assets/images/frontend/animation/circle01.png')}}" alt="shapes">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-header">
                        <h2 class="title">{{__(@$planCaption->data_values->heading)}}</h2>
                        <p>{{__(@$planCaption->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-30-none">
                @php
                    $color = ['bg-1','bg-2','bg-3','bg-4','bg-5','bg-6','bg-7','bg-8'];
                @endphp

                @foreach($plans as $k => $data)
                    @php
                        $time_name = \App\TimeSetting::where('time', $data->times)->first();
                    @endphp
                    <div class="col-md-6 col-lg-3">
                        <div class="ticket-item {{$color[$k]}}">

                             <div class="image-preview owl-carousel owl-theme">
                                @php $img=json_decode($data->plan_image) @endphp
                                @if(isset($img))
                                @foreach($img as $i)
                                    <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item">
                                @endforeach
                                @endif
                            </div>

                             <div class="bottom">
                            <p> <a href="{{route('home.plan_document',['id'=>$data->id])}}" style="color: #2A2B30;" class="view_more">{{$data->name}}</a></p>

                                <div class="info">

                                </div>
                                 <div class="total">
                                    <div class="row flex-row">
                                             <div class="col-md-6">
                                                <div class="attribute">@lang('Return')</div>
                                                <div class="value"> <h6 class="sub-title">{{__($data->interest)}} @if($data->interest_status == 1)% @else {{__($general->cur_text)}} @endif</h6></div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="attribute"></div>
                                            <div class="value">
                                                @if($data->capital_back_status == 1)
                                                    <span class="badge badge-success" style="font-size:57%;">@lang('Capital Will Return Back')</span>
                                                @elseif($data->capital_back_status == 0)
                                                    <span class="badge badge-warning">@lang('Capital Will Store')</span>
                                                   @endif
                                                </div>
                                            </div>
                                            <div class="col-md-6">{{__($time_name->name)}} / @if($data->lifetime_status == 0) {{__($data->repeat_time)}} @lang('Times') @else @lang('Lifetime') @endif</div>
                                            <div class="col-md-6">@lang('24/7Support')</div>
                                             @if($data->fixed_amount == 0)
                                            <div class="col-md-6">
                                                <div class="attribute">@lang('Min.')</div>
                                                <div class="value">{{__($general->cur_sym)}}{{__($data->minimum)}}</div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="attribute">@lang('Max:')</div>
                                                <div class="value">{{__($general->cur_sym)}}{{__($data->maximum)}}</div>
                                            </div>
                                             @else
                                             <div class="col-md-6">
                                                <div class="attribute">@lang('Invest Amount')</div>
                                                <div class="value">{{__($general->cur_sym)}}{{__($data->maximum)}}</div>
                                            </div>
                                            @endif
                                    </div>
                              </div>
                              <a href="{{route('home.plan_document',['id'=>$data->id])}}" style="color: #007bff;" class="view_more">View more</a>
                               <a href="{{route('user.login')}}" class="custom-button custom-button-color investButton">@lang('Invest Now')</a>
                               </div>

                        </div>
                    </div>

                    @php
                        array_push($color, $color[$k]);
                    @endphp
                @endforeach
            </div>
        </div>
    </section>
    <!-- ========Ticket-Section Ends Here ========-->
@endif





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
  </script>
@endpush
