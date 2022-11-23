@extends('templates.crypto.layouts.user')
@section('style')
<style>

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

  .bd{
    border: 1px solid white;
    border-radius: 10px;
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
  .op{
    color: #7366FF; !important
  }

  .in{
    display: inline-block;
  }
</style>
@endsection
@section('scripts')
<script src="{{asset('assets/crypto/js/chart/sparkline/sparkline.js')}}"></script>
<script src="{{asset('assets/crypto/js/chart/sparkline/sparkline-script.js')}}"></script>
<script>
  // $('#pageWrapper').removeClass('compact-wrapper');
  // $('#pageWrapper').addClass('horizontal-wrapper');
  // $('.sidebar-wrapper').hide();

  $(".line-chart-sparkline").width(120).height(30);

</script>

<script type="text/javascript">
  let color = ['rgba(0, 92, 19,0.4)', 'rgba(183, 6, 24,0.4)'];
  @foreach($plans as $k => $data)
  let color{{$data->id}} = color[Math.floor(Math.random()*color.length)];
  $(".chart-{{$data->id}}").sparkline(Array.from({length: 15}, () => Math.floor(Math.random() * 40)), {
    type: 'line',
    width: '100%',
    height: '100%',
    tooltipClassname: 'chart-sparkline',
    lineColor: color{{$data->id}},
    fillColor: color{{$data->id}},
    highlightLineColor: color{{$data->id}},
    highlightSpotColor: color{{$data->id}},
    targetColor: color{{$data->id}},
    performanceColor: color{{$data->id}},
    boxFillColor: color{{$data->id}},
    medianColor: color{{$data->id}},
    minSpotColor: color{{$data->id}}
  });
  @endforeach
</script>

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
        $('.interestDetails').html(`@lang('Interest'): ${data.interest} %`);
      }else{
        $('.interestDetails').html(` @lang('Interest'): ${data.interest} ${currency}`);
      }
      if(data.lifetime_status == '0'){
        $('.interestValidaty').html(`${data.repeat_time} @lang('Year') ,  ${data.repeat_time} @lang('Times')`);
      }else{
        $('.interestValidaty').html(`${data.repeat_time} @lang('Year'),  @lang('Lifetime') `);
      }

      $('.planName').text(data.name);
      $('.plan_id').val(data.id);
    });
    $('#fixedAmount').keyup(function(){
      var total_shares = $(this).val() / $('#share_price').val();
      $('#totalShares').val(total_shares.toFixed(2));
    });
  });

</script>
@endsection



@section('content')

<div class="page-body">
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>{{__($page_title)}}</h3>
          </div>
          <div class="col-6">

          </div>
        </div>
      </div>
    </div>
    <div class="content-body">
      <div class="container">
        <div class="row mt-5">
          @php
          $color = ['bg-1','bg-2','bg-3','bg-4','bg-5','bg-6','bg-7','bg-8'];
          @endphp
          @foreach($plans as $k => $data)

          @php
          $time_name = \App\TimeSetting::where('time', $data->times)->first();
          @endphp
          {{--  <div class="ticket-item {{$color[$k]}}">  --}}
            <div class="col-6">
              <div class="col-sm-12">

                <div class="card">
                  <div class="card-body1">
                    <div class="media">
                      <div class="media-body">
                        <div id="carousel-keyboard" class="carousel slide" data-ride="carousel" data-keyboard="false">
                          <div class="carousel-inner" role="listbox" style="border-radius: 15px;">
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
                          {{-- <a class="carousel-control-prev" href="#carousel-keyboard" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#carousel-keyboard" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a> --}}
                        </div>
                        {{--  <img class="img-fluid mb-2 bd" alt="" width="100%" height="150px" src="{{ asset('assets/crypto/images/white-bg.jpg') }}">  --}}
                        <h6 class="mb-0 f-w-700">{{__(@$planCaption->data_values->title)}}</h6>
                        <p>{{__(@$planCaption->data_values->short_details)}}</p>
                        <h4 class="px-4"><a href="{{route('home.plan_document',['id'=>$data->id])}}" class="view_more">{{$data->name}}</a></h4>

                      </div>
                    </div>
                    <div class="px-4">
                    <table class="table table-bordernone pt-0">
                      <tbody class="f-w-500">
                        {{-- <tr class="bdr-black">
                          <td>
                            <div>
                              <p class="font-roboto">{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->cur_text)}} @endif</p>
                            </div>
                            <div>
                              <p class="font-roboto ">@lang('Return')</p>
                            </div>
                          </td>
                          <td>
                            <div>
                              <p class="font-roboto">{{$general->cur_sym}}{{$data->current_share_price ? round($data->current_share_price,2) : 1 }}</p>
                            </div>
                            <div>
                              <p class="font-roboto ">@lang('Share Price')</p>
                            </div>
                          </td>
                          <td>
                            <div>
                              <p class="font-roboto">{{$data->market_cap}}</p>
                            </div>
                            <div>
                              <p class="font-roboto ">@lang('Market Cap')</p>
                            </div>
                          </td>
                        </tr> --}}
                        <tr class="bdr-black">
                          <td class="p-0">
                            <div>
                              <h6 class="m-0 op"><strong>{{$general->cur_sym}}{{$data->current_share_price ? round($data->current_share_price,2) : 1 }}</strong></h6>
                            </div>
                            <div>
                              <p class="font-roboto">@lang('Price per Share')</p>
                            </div>
                          </td>
                          <td class="p-0">
                            <div>
                              <h6 class="m-0 op"><strong>{{__($general->cur_sym)}}{{__(number_format($data->minimum,2))}}</strong></h6>
                            </div>
                            <div>
                              <p class="font-roboto">@lang('Min Investment')</p>
                            </div>
                          </td>
                          <td class="p-0">
                            <div>
                              <h6 class="m-0 op"><strong>{{__($general->cur_sym)}}{{__(number_format($data->maximum,2))}}</strong></h6>
                            </div>
                            <div>
                              <p class="font-roboto">@lang('Max Investment')</p>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                    <div class="row col-md-12 col-sm-12 p-4">
                      <div class="col-md-6 col-sm-6 text-center">
                        <a href="{{route('home.plan_document',['id'=>$data->id])}}" class="view_more btn btn-outline-primary-2x">View more</a>
                      </div>
                      <div class="col-md-6 col-sm-6 text-center">
                        <a href="{{route('user.login')}}" data-bs-toggle="modal" data-bs-target="#depoModal" data-price="{{$data->current_share_price}}" data-resource="{{$data}}" class="custom-button investButton btn btn-outline-success-2x in " >@lang('Invest now')</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            {{--  </div>  --}}
          </div>
          @php
          array_push($color, $color[$k]);
          @endphp
          @endforeach
        </div>
      </div>

      <div class="container">
        <div class="row">

          <div class="col-sm-12">
            <div class="card">


              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">@lang('Name')</th>
                      <th scope="col">@lang('Price per Share')</th>
                      <th scope="col">@lang('Market Value')</th>
                      <th scope="col">@lang('Max Investment')</th>

                      <th scope="col">@lang('Expected Return')</th>

                      <th scope="col">@lang('Market Cap')</th>
                      {{--  <th scope="col">@lang('Min Investment')</th>  --}}
                      {{--  graph  --}}

                    </tr>
                  </thead>
                  @php
                  $color = ['bg-1','bg-2','bg-3','bg-4','bg-5','bg-6','bg-7','bg-8'];
                  @endphp
                  @foreach($plans as $k => $data)

                  @php
                  $time_name = \App\TimeSetting::where('time', $data->times)->first();
                  @endphp
                  <tbody class="f-w-500">
                    <tr class="bdr-black">
                      <td>
                        <div>
                          <p class="font-roboto"><a href="{{route('home.plan_document',['id'=>$data->id])}}" class="view_more">{{$data->name}}</a></p>
                        </div>

                      </td>
                      <td>
                        <div>
                          <p class="font-roboto">{{$general->cur_sym}}{{$data->current_share_price ? round($data->current_share_price,2) : 1 }}</p>
                        </div>

                      </td>
                      <td>
                        <div class="flot-chart-placeholder line-chart-sparkline chart-{{$data->id}} ht" ></div>
                      </td>
                      <td>
                        <div>
                          <p class="font-roboto">{{__($general->cur_sym)}}{{__(number_format($data->maximum,2))}}</p>
                        </div>

                      </td>
                      <td>
                        <div>
                          <p class="font-roboto">{{__($data->interest)}} @if($data->interest_status == 1) % @else {{__($general->cur_text)}} @endif</p>
                        </div>
                      </td>

                      <td>
                        <div>
                          <p class="font-roboto">${{$data->market_cap}}</p>
                        </div>

                      </td>

                      {{--  <td>
                        <div>
                          <p class="font-roboto value">{{__($general->cur_sym)}}{{__(number_format($data->minimum,2))}}</p>
                        </div>

                      </td>  --}}

                    </tr>

                  </tbody>

                  @php
                  array_push($color, $color[$k]);
                  @endphp
                  @endforeach
                </table>
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

@push('renderModal')
@php
$wallets = \App\UserWallet::where('user_id', Auth::id())->orderBy('id','asc')->first();
@endphp

<div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        @auth
        <h5 class="modal-title" id="ModalLabel">@lang('Confirm to invest on') <strong class="planName text-primary"></strong></h5>
        @endauth
        @guest
        <h5 class="modal-title" id="ModalLabel">@lang('Need Sign In') </h5>
        @endguest
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('user.buy.plan')}}" method="post">
          @csrf
          @auth
          <div class="modal-body">

            <div class="form-group">
              <h5 class="text-center investAmountRenge f-w-100"></h5>

              <p class="text-center interestDetails"></p>
              <p class="text-center interestValidaty"></p>

              <div class="mb-3">
               <label class="col-form-label">@lang('Available Balance')</label>
               <input type="text" value="{{__($general->cur_sym)}}{{__(number_format($wallets->balance,2))}}" readonly class="wallet_type form-control">
               <input type="hidden" name="wallet_type" value="{{ $wallets->id}}" >
             </div>
             <input type="hidden" name="plan_id" class="plan_id">
             <input type="hidden" id="share_price">

             <div class="mb-3">
              <label class="col-form-label">@lang('Invest Amount')</label>
              <input type="text" class="form-control fixedAmount" id="fixedAmount" name="amount" value="{{old('amount')}}" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
            </div>
            <div class="mb-3">
              <label class="col-form-label">@lang('Total Shares')</label>
              <input type="text" class="form-control fixedAmount" id="totalShares" readonly>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-primary" type="button" data-bs-dismiss="modal">Cancel</button>
          <button class="btn btn-secondary" type="submit">Invest</button>
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
</div>


@endpush
