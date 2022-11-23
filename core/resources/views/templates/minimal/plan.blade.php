@extends('templates.minimal.layouts.user')

@section('style')
<style>

// .ticket-item {
//     border-radius: 0;
// }

.log-out .navbar-toggler-icon {
    display: unset;
    vertical-align: unset;
}

.ticket-item {
    border-radius: 0 ;
    padding: 0;
}

.ticket-item .bottom {
    padding: 20px 15px;
}

.imagepreview {
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

@media (max-width: 575px){
.owl-nav {
    display: block;
}
}

</style>
@endsection

@guest
@section('content')
@php
$planCaption = getContent('plan.caption',true);
@endphp

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">{{__($page_title)}}</h3>
      </div>

    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-md-12">
          <div id="what-is" class="card">
            <div class="card-header">
              <h2 class="title">{{__(@$planCaption->data_values->title)}}</h2>
              <p>{{__(@$planCaption->data_values->short_details)}}</p>
            </div>

            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row justify-content-center mb-30-none">

                    @php
                    $color = ['bg-1','bg-2','bg-3','bg-4','bg-5','bg-6','bg-7','bg-8'];
                    @endphp

                    @foreach($plans as $k => $data)
                    @php
                    $time_name = \App\TimeSetting::where('time', $data->times)->first();
                    @endphp
                    <div class="col-md-6 col-lg-3 my-2">
                      <div class="ticket-item {{$color[$k]}}">

                        <div id="carousel-keyboard" class="carousel slide" data-ride="carousel" data-keyboard="false">
                          <div class="carousel-inner" role="listbox">
                            @php $img=json_decode($data->plan_image) @endphp
                            @if(isset($img))
                            @php $active = 'active'; @endphp
                            @foreach($img as $i)

                            <div class="carousel-item {{$active}}">
                            <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item">
                            </div>

                            @php $active = ''; @endphp
                            @endforeach
                            @endif

                          </div>
                          <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>


                        {{-- <div class="image-preview owl-carousel owl-theme">
                         @php $img=json_decode($data->plan_image) @endphp
                         @if(isset($img))
                         @foreach($img as $i)
                         <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item" style="height: auto;width: 265px;margin:auto;">
                         @endforeach
                         @endif
                       </div> --}}
                       <div class="bottom">
                         <div class="plan_name"><a href="{{route('home.plan_document',['id'=>$data->id])}}" class="view_more" style="color: #2A2B30;">{{$data->name}}</a></div>

                         <div class="info">

                         </div>
                         <div class="total">
                          <div class="row flex-row">
                            <div class="col-md-6">
                              <div class="attribute">@lang('Return')</div>
                              <div class="value">   <h6 class="sub-title">{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->cur_text)}} @endif</h6></div>
                            </div>
                            <div class="col-md-6">
                              <div class="attribute"></div>
                              <div class="value">
                                @if($data->capital_back_status == 1)
                                <span class="badge badge-success" style="font-size: 57%;">@lang('Capital Will Return Back')</span>
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
                              <div class="value">{{__($general->cur_sym)}}{{__(number_format($data->minimum,2))}}</div>
                            </div>
                            <div class="col-md-6">
                              <div class="attribute">@lang('Max:')</div>
                              <div class="value">{{__($general->cur_sym)}}{{__(number_format($data->maximum,2))}}</div>
                            </div>
                            @else
                            <div class="col-md-6">
                              <div class="attribute">@lang('Invest Amount')</div>
                              <div class="value">{{__($general->cur_sym)}}{{__(number_format($data->maximum,2))}}</div>
                            </div>
                            @endif
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="{{route('home.plan_document',['id'=>$data->id])}}" style="color: #007bff;background: #007bff !important;" class="view_more custom-button  btn btn-primary">View more</a>
                          </div>
                          <div class="col-md-6">
                            <a href="{{route('user.login')}}" data-toggle="modal" data-target="#depoModal" data-resource="{{$data}}" data-price="{{$data->current_share_price}}"  class="custom-button custom-button-color investButton btn btn-warning">@lang('Invest Now')</a>
                          </div>
                        </div>

                      </div>


                    </div>
                  </div>

                  @php
                  array_push($color, $color[$k]);
                  @endphp
                  @endforeach
                </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@endguest
@auth

@section('content')

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">{{__($page_title)}}</h3>
      </div>

    </div>
    <div class="content-body">
      <div class="row">
        <div class="col-md-12">
          <div id="what-is" class="card">
            <div class="card-header">
              <h2 class="title">{{__(@$planCaption->data_values->title)}}</h2>
              <p>{{__(@$planCaption->data_values->short_details)}}</p>
            </div>

            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row justify-content-center mb-30-none">

                      @php
                      $color = ['bg-1','bg-2','bg-3','bg-4','bg-5','bg-6','bg-7','bg-8'];
                      @endphp
                      @foreach($plans as $k => $data)

                      @php
                      $time_name = \App\TimeSetting::where('time', $data->times)->first();
                      @endphp
                      <div class="col-md-6 col-lg-4 card">
                        <div class="ticket-item {{$color[$k]}}">

                          <div id="carousel-keyboard" class="carousel slide" data-ride="carousel" data-keyboard="false">
                            <div class="carousel-inner" role="listbox">
                              @php $img=json_decode($data->plan_image) @endphp
                              @if(isset($img))
                              @php $active = 'active'; @endphp
                              @foreach($img as $i)

                              <div class="carousel-item {{$active}}">
                              <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item">
                              </div>

                              @php $active = ''; @endphp
                              @endforeach
                              @endif

                            </div>
                            <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                         {{-- <div class="image-preview owl-carousel owl-theme">
                           @php $img=json_decode($data->plan_image) @endphp
                           @if(isset($img))
                           @foreach($img as $i)
                           <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item">
                           @endforeach
                           @endif
                         </div> --}}

                         <div class="bottom">
                           <p><a href="{{route('home.plan_document',['id'=>$data->id])}}" style="color: black;" class="view_more">{{$data->name}}</a></p>
                           <div class="info">

                           </div>
                           <div class="total">
                            <div class="row flex-row">
                              <div class="col-md-6">
                                <div class="attribute">@lang('Return')</div>
                                <div class="value"> <h6 class="sub-title" style="margin-top: 5px;">{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->cur_text)}} @endif</h6></div>
                              </div>
                              <div class="col-md-6">
                                <div class="attribute">@lang('Share Price')</div>
                                <div class="value">
                                  <h6 class="sub-title" style="margin-top: 5px;">{{$general->cur_sym}}{{$data->current_share_price ? round($data->current_share_price,2) : 1 }}</h6>
                                </div>
                             </div>
                              <div class="col-md-6">
                                <div class="attribute">@lang('Market Cap')</div>
                                <div class="value">
                                  <h6 class="sub-title" style="margin-top: 5px;">{{$data->market_cap}}</h6>
                                </div>
                             </div>
                             <div class="col-md-6">
                                <div class="attribute">@lang('Shares Available ')</div>
                                <div class="value">
                                  <h6 class="sub-title" style="margin-top: 5px;">{{$data->total_supply - $data->circulating_supply}}</h6>
                                </div>
                             </div>
                             @if($data->fixed_amount == 0)
                             <div class="col-md-6">
                              <div class="attribute">@lang('Min Investment')</div>
                              <div class="value">{{__($general->cur_sym)}}{{__(number_format($data->minimum,2))}}</div>
                            </div>
                            <div class="col-md-6">
                              <div class="attribute">@lang('Max Investment')</div>
                              <div class="value">{{__($general->cur_sym)}}{{__(number_format($data->maximum,2))}}</div>
                            </div>
                            @else
                            <div class="col-md-6">
                              <div class="attribute">@lang('Invest Amount')</div>
                              <div class="value">{{__($general->cur_sym)}}{{__(number_format($data->maximum,2))}}</div>
                            </div>
                            @endif
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <a href="{{route('home.plan_document',['id'=>$data->id])}}" style="color: #007bff;background: #007bff !important;" class="view_more custom-button  btn btn-primary">View more</a>
                          </div>
                          <div class="col-md-6">
                            <a href="{{route('user.login')}}" data-toggle="modal" data-target="#depoModal" data-price="{{$data->current_share_price}}" data-resource="{{$data}}"  class="custom-button custom-button-color investButton btn btn-warning">@lang('Invest Now')</a>
                          </div>
                        </div>

                      </div>

                    </div>
                  </div>

                  @php
                  array_push($color, $color[$k]);
                  @endphp
                  @endforeach
                </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
@endauth

@push('renderModal')
@php
$wallets = \App\UserWallet::where('user_id', Auth::id())->orderBy('id','asc')->first();
        // p($wallets);
@endphp

<!-- Modal -->
<div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        @auth
        <h5 class="modal-title" id="ModalLabel">@lang('Confirm to invest on') <strong class="planName text-white"></strong></h5>
        @endauth
        @guest
        <h5 class="modal-title" id="ModalLabel">@lang('Need Sign In') </h5>
        @endguest
      </div>
      <form action="{{route('user.buy.plan')}}" method="post">
        @csrf
        @auth
        <div class="modal-body">

          <div class="form-group">
            <h5 class="text-center investAmountRenge"></h5>

            <p class="text-center interestDetails"></p>
            <p class="text-center interestValidaty"></p>

            <div class="form-group">
             <strong>@lang('Wallet Name')</strong>
             <input type="text" value="{{ @$wallets->wallet_type }}" readonly class="wallet_type form-control">
             <input type="hidden" name="wallet_type" value="{{ $wallets->id}}" >
           </div>
           <input type="hidden" name="plan_id" class="plan_id">
           <input type="hidden" id="share_price">

           <div class="form-group">
            <strong>@lang('Invest Amount')</strong>
            <input type="text" class="form-control fixedAmount" id="fixedAmount" name="amount" value="{{old('amount')}}" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
          </div>
          <div class="form-group">
            <strong>@lang('Total Shares')</strong>
            <input type="text" class="form-control fixedAmount" id="totalShares" readonly>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger " data-dismiss="modal">@lang('No')</button>
        <button type="submit"  class="btn btn-success " >@lang('Yes')</button>
      </div>
      @endauth

      @guest
      <div class="modal-footer">
        <a href="{{route('user.login')}}" type="button" class="btn btn-success custom-success" >@lang('Please, Signin your account at first')</a>
      </div>
      @endguest
    </form>
  </div>
</div>
</div>
@endpush

@section('script')

<script>
  $(document).ready(function () {
    $('.investButton').on('click', function () {
      var data = $(this).data('resource');
      var symbol = "{{__($general->cur_sym)}}";
      var currency = "{{__($general->cur_text)}}";
      var share_price = $(this).data('price');
      $('#share_price').val(share_price);

      if(data.fixed_amount == '0'){
        $('.investAmountRenge').text(`@lang('Invest'): ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
        $('.fixedAmount').val('');
        $('#fixedAmount').attr('readonly', false);

      }else{
        $('.investAmountRenge').text(`@lang('Invest'): ${symbol}${data.fixed_amount}`);
        $('.fixedAmount').val(data.fixed_amount);

        $('#fixedAmount').attr('readonly', true);
      }

      if(data.interest_status == '1'){
        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} % </strong>`);
      }else{
        $('.interestDetails').html(`<strong> @lang('Interest'): ${data.interest} ${currency}  </strong>`);
      }
      if(data.lifetime_status == '0'){
        $('.interestValidaty').html(`<strong> ${data.repeat_time} @lang('Year') ,  ${data.repeat_time} @lang('Times')</strong>`);
      }else{
        $('.interestValidaty').html(`<strong> ${data.repeat_time} @lang('Year'),  @lang('Lifetime') </strong>`);
      }

      $('.planName').text(data.name);
      $('.plan_id').val(data.id);
    });
    $('#fixedAmount').keyup(function(){
      var total_shares = $(this).val() / $('#share_price').val();
      $('#totalShares').val(total_shares);
    });
  });

</script>
<script>
  // $('.owl-carousel').owlCarousel({
  //   loop:true,
  //   margin:0,
  //   nav:true,
  //   responsive:{
  //     0:{
  //       items:1
  //     }
  //   }
  // })
</script>
@endsection
