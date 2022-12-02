@extends('templates.crypto.layouts.user')
@section('style')
<style>
    .clr{
        color:#7366ffa6; !important
    }
    .bdr{
        border-bottom: 3px solid #7366ffa6;
    }
    .bdr-black{
        border-bottom: 1px solid #7366ffa6;
        padding-top: 2px;
    }
    .op{
        opacity: 70%;
    }
    .bg-w{
        background-color: white;
    }
    .img-wh{
        width: 100%;
        height: 400px;
        border: .1px solid white;
        border-radius: 10px;
    }

</style>
@endsection
@section('scripts')

<script>
    $('#pageWrapper').removeClass('compact-wrapper');
    $('#pageWrapper').addClass('horizontal-wrapper');
    $('.sidebar-wrapper').hide();
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
<br>
<section class="section-space layout" id="layout">
<div class="container my-5">
<div class="row">

<div class="col-xl-8 col-lg-8 col-md-8 col-xs-12 box-col-8">
    <div class="col-sm-12 h-100">
        <div class="card h-100">
        <div class="card-body">
            <div class="new-users-social">
                <div class="media">
                <div class="media-body">
                    <h6 class="mb-0 f-w-700">{{$plans->name}}</h6>
                    <p>The first global fully remote investment opportunity!</p>
                </div>
                </div>
            </div>
            @php $img=json_decode($plans->plan_image) @endphp
            @if(isset($img))
                @foreach($img as $i)
                    <img src="{{ get_image(config('constants.admin.plan_image.path').'/'. $i) }}" class="imagepreview item img-wh">
                @endforeach
            @endif
            {{--  <img class="img-fluid" alt="" src="{{ asset('assets/crypto/images/white-bg.jpg') }}">  --}}
            <div class="timeline-content">
                @if(isset($plans->overview) && $plans->overview!='')
                <div class="col-md-12 overview">
                   <?= $plans->overview ?>
                </div>
                @else
                 <div class="col-md-12 overview" style="display:none;">
                    <?= $plans->overview ?>
                </div>
                @endif

            </div>
        </div>
    </div>

    </div>
</div>
<div class="col-xl-4 col-lg-4 col-md-4 col-xs-8 box-col-8">
        <div class="col-sm-12 h-100">
        <div class="card h-100">
        <div class="card-body">
            <h3 class="mb-0 f-w-700 text-start clr">$ {{ $plans->share_price }}</h3>
            <h6 class="mb-0 pb-2 pt-1 f-w-700 text-start bdr">{{$plans->name}}</h6>
            <table class="mt-4 col-12">
                <tbody class="m-2">
                  <tr class="bdr-black">
                    <td class="mr-2">
                      <div class="">
                          <h6 class="font-roboto">{{__($plans->interest)}} @if($plans->interest_status == 1) % @else {{__($plans->cur_text)}} @endif </h6>
                      </div>
                      <div>
                        <p class="font-roboto op">Expected Return</p>
                    </div>
                    </td>
                    <td class="ml-2">
                        <div>
                          <p class="font-roboto">{{ $plans->market_cap }}</p>
                        </div>
                        <div>
                          <p class="font-roboto op">Market cap</p>
                      </div>
                      </td>
                  </tr>
                  <tr class="bdr-black">
                    <td>
                      <div>
                        <p class="font-roboto">{{__($general->cur_sym)}}{{__(number_format($plans->minimum,2))}}</p>
                      </div>
                      <div>
                        <p class="font-roboto op">Min Investment</p>
                    </div>
                    </td>
                    <td>
                        <div>
                            <p class="font-roboto">{{__($general->cur_sym)}}{{__(number_format($plans->maximum,2))}}</p>
                        </div>
                        <div>
                          <p class="font-roboto op">Max Investment</p>
                      </div>
                      </td>
                  </tr>
                  {{--  <tr class="bdr-black">
                    <td>
                      <div>
                        <p class="font-roboto">$0.87</p>
                      </div>
                      <div>
                        <p class="font-roboto op">Share Price</p>
                    </div>
                    </td>
                    <td>
                        <div>
                            <p class="font-roboto">$300.15</p>
                        </div>
                        <div>
                          <p class="font-roboto op">Investment</p>
                      </div>
                      </td>
                  </tr>
                  <tr class="bdr-black">
                    <td>
                      <div>
                        <p class="font-roboto">$0.87</p>
                      </div>
                      <div>
                        <p class="font-roboto op">Share Price</p>
                    </div>
                    </td>
                    <td>
                        <div>
                            <p class="font-roboto">$300.15</p>
                        </div>
                        <div>
                          <p class="font-roboto op">Investment</p>
                      </div>
                      </td>
                  </tr>  --}}
                </tbody>
              </table>
              <a href="{{route('user.login')}}" style="padding: 12px 0;border-radius: 11px;" data-bs-toggle="modal" data-bs-target="#depoModal" data-price="{{$plans->current_share_price}}" data-resource="{{$plans}}" class="btn btn-primary investButton mt-4 col-12" >@lang('Invest now')</a>

              <br>
              <br>
            {{--  <img class="img-fluid" alt="" src="{{ asset('assets/crypto/images/white-bg.jpg') }}">  --}}
            {{--  <div class="timeline-content">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse sed urna in justo euismod condimentum. Fusce
                  placerat enim et odio molestie sagittis.
                </p>

            </div>  --}}
        </div>
        </div>
        </div>

</div>
</div>
</div>

<div class="container">
    <div class="row">
    <div class="col-xl-8 col-lg-8 col-md-8 col-xs-6 box-col-8">
        <div class="card">
        <div class="card-body">
            <h5 class="mb-4">Reasons to Invest</h5>
            <div class="activity-media">

            @if($plans->plan_document!='')
            <div class="media">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body">
                <h6 class="f-18 font-roboto text-start">
                    Documents
                </h6>
                {{--  <a class="mb-4" style="float: right;color: gray;font-size: 20px;" href="javascript;"  onclick="downloadFiles();" >Download All <i class="fa fa-download" aria-hidden="true"></i></a>  --}}

                </div>
            </div>
            @else
            <div class="media">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body">
                <h6 class="f-18 font-roboto text-start">
                    Documents
                </h6>
                {{--  <a class="mb-4" style="float: right;color: gray;font-size: 20px;" href="javascript;"  onclick="downloadFiles();" >Download All <i class="fa fa-download" aria-hidden="true"></i></a>  --}}

                </div>
            </div>
            @endif

            @php
            $plan_documents = json_decode($plans->plan_document,true);
            @endphp

            @if($plan_documents && !empty($plan_documents))
            @foreach($plan_documents as $p)
             @php
                $extension =\File::extension($p);
             @endphp

             @if($extension=='gif')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <img src="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </img>
            </div>
             @endif
             @if($extension=='png')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <img src="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </img>
            </div>
             @endif
             @if($extension=='jpg')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <img src="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </img>
            </div>
             @endif
             @if($extension=='pdf')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <object data="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </object>
            </div>
             @endif
             @if($extension=='csv')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <object data="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </object>
            </div>
             @endif
             @if($extension=='txt')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <object data="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </object>
            </div>
             @endif
             @if($extension=='xls')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <object data="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </object>
            </div>
             @endif
             @if($extension=='docx')
             <div class="col-12">
                <a style="float: right;font-size: 29px;color: gray;" href="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" download > </a>
                <object data="{{ get_file(config('constants.admin.plan_document.path').'/'. $p) }}" type="application/pdf" width="100%" height="400">
                </object>
            </div>
             @endif

            @endforeach
            @endif

            @if(isset($plans->overview) && $plans->overview!='')
            <div class="media mt-2" style="border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Overview
                </h6>
                <?= $plans->overview ?>
                </div>
            </div>
            @else
            <div class="media mt-2" style="display:none; border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Overview
                </h6>
                <?= $plans->overview ?>
                </div>
            </div>
            @endif

            @if(isset($plans->investment_highlights) && $plans->investment_highlights!='')
            <div class="media mt-2 " style="border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Investment Highlights
                </h6>
                <?= $plans->investment_highlights ?>
                </div>
            </div>
            @else
            <div class="media mt-2" style="display:none; border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Investment Highlights
                </h6>
                <?= $plans->investment_highlights ?>
                </div>
            </div>
            @endif

            @if(isset($plans->sponsor) && $plans->sponsor!='')
            <div class="media mt-2 " style="border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Sponsor
                </h6>
                <?= $plans->sponsor ?>
                </div>
            </div>
            @else
            <div class="media mt-2 " style="display:none; border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Sponsor
                </h6>
                <?= $plans->sponsor ?>
                </div>
            </div>
            @endif

            @if(isset($plans->transaction_history) && $plans->transaction_history!='')
            <div class="media mt-2 " style="border-top:none;">
            <div class="recent-circle bg-primary">
            </div>
            <div class="media-body text-start">
            <h6 class="f-18 font-roboto text-start">
                Transaction History
            </h6>
            <?=$plans->transaction_history?>
            </div>
            </div>
            @else
            <div class="media mt-2 " style="display:none; border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Transaction History
                </h6>
                <?=$plans->transaction_history?>
                </div>
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
                <div class="media mt-2 " style="border-top:none;">
                    <div class="recent-circle bg-primary">
                    </div>
                    <div class="media-body text-start">
                    <h6 class="f-18 font-roboto text-start">
                        Risk Disclosures
                    </h6>
                    <?= $plans->risk_disclosures ?>
                    </div>
                </div>
               @else
                <div class="media mt-2 " style="display:none; border-top:none;">
                <div class="recent-circle bg-primary">
                </div>
                <div class="media-body text-start">
                <h6 class="f-18 font-roboto text-start">
                    Risk Disclosures
                </h6>
                <?= $plans->risk_disclosures ?>
                </div>
                </div>
               @endif

            </div>
        </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-xs-6 box-col-4">
        <h5 class="text-start">Rewards</h5>
        <p class="text-start">Get rewarded for investing more into Rentberry:</p>
        <div class="col-sm-12">
        <div class="card">
        <div class="card-body">
            <h3 class="mb-0 f-w-700 text-start clr">$11,097</h3>
            <h6 class="mb-0  pt-1 f-w-700 text-start">Investment</h6>
            <h5 class="mb-0 pb-2 pt-1 f-w-700 text-start">Huge Market Potential</h5>
            <p class="text-start">The company has surpassed 1M+ monthly active users and 5M+ listings worldwide.</p>
        </div>
        </div>
    </div>
    </div>
</div>
</div>
</section>

{{--  <section class="section-space   layout" id="layout">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow pulse">
          <div class="cuba-demo-content">
            <div class="couting">
              <h2>12+</h2>
              <p>Admin unique layouts</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row demo-imgs">

        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/dubai.jpg" alt="default"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="default">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="React"><a class="ms-2" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Angular"><a class="ms-2" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Vue"><a class="ms-2" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Laravel"><a class="ms-2" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Dubai</h3>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/los.jpg" alt="material"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="material-layout">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Los Angeles</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/paris.jpg" alt="classicSidebar"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="dark-sidebar">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Paris</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/tokyo.jpg" alt="compact"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="compact-wrap">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Tokyo</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/moscow.jpg" alt="collapse"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="compact-small">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Moscow</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/singapore.jpg" alt="enterprise"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="enterprice-type">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Singapore</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"> <img class="img-fluid" src="../assets/images/landing/layout-images/newyork.jpg" alt="centralize"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="box-layout">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">New York</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/barc.jpg" alt="further"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="advance-type">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Barcelona</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/madrid.jpg" alt="revolutionary"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="color-sidebar">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Madrid</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/romo.jpg" alt="statistics"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="material-icon">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Rome</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/seoul.jpg" alt="trendy"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="modern-layout">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">Seoul</h3>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 wow pulse demo-content">
          <div class="cuba-demo-img">
            <div class="overflow-hidden"><img class="img-fluid" src="../assets/images/landing/layout-images/london.jpg" alt="blank"></div>
            <div class="hover-link"><a class="html" href="Javascript:void(0);" target="_blank" data-attr="default-body">Html</a>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank">React</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://angular.pixelstrap.com/cuba/" target="_blank">Angular</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank">Vue</a></div>
              <div class="link-btn" data-bs-toggle="tooltip" data-bs-placement="top" title="Coming soon"><a class="ms-2 coming-soon disabled" href="http://laravel.pixelstrap.com/cuba/dashboard/index" target="_blank">Laravel</a></div>
            </div>
          </div>
          <div class="title-wrapper">
            <div class="content">
              <h3 class="theme-name mb-0">London</h3>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-space   app_bg frameworks-section" id="frameworks">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow pulse">
          <div class="cuba-demo-content mt50">
            <div class="couting">
              <h2>5+</h2>
            </div>
            <p class="mb-0">Top Frameworks</p>
          </div>
        </div>
        <div class="col-sm-12 framworks">
          <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item"><a class="nav-link d-flex active" id="pills-huis-tab" data-bs-toggle="pill" href="#pills-huis" role="tab" aria-controls="pills-huis" aria-selected="true"> <img src="../assets/images/landing/icon/html/html.png" alt="">
                <div class="text-start">
                  <h5 class="mb-0">HTML</h5>
                  <p class="mb-0">Frameworks</p>
                </div></a></li>
            <li class="nav-item"><a class="d-flex nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> <img src="../assets/images/landing/icon/react/react1.png" alt="">
                <div class="text-start">
                  <h5 class="mb-0">React</h5>
                  <p class="mb-0">Frameworks</p>
                </div></a></li>
            <li class="nav-item"><a class="d-flex nav-link" id="pills-angular-tab" data-bs-toggle="pill" href="#pills-angular" role="tab" aria-controls="pills-angular" aria-selected="false"> <img src="../assets/images/landing/icon/angular/angular.svg" alt="">
                <div class="text-start">
                  <h5 class="mb-0">Angular</h5>
                  <p class="mb-0">Frameworks</p>
                </div></a></li>
            <li class="nav-item"><a class="d-flex nav-link" id="pills-vue-tab" data-bs-toggle="pill" href="#pills-vue" role="tab" aria-controls="pills-vue" aria-selected="false"> <img src="../assets/images/landing/icon/vue/vue.png" alt="">
                <div class="text-start">
                  <h5 class="mb-0">Vue</h5>
                  <p class="mb-0">Frameworks</p>
                </div></a></li>
            <li class="nav-item"><a class="d-flex nav-link" id="pills-contact-tab" data-bs-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false"> <img src="../assets/images/landing/icon/laravel/laravel.png" alt="">
                <div class="text-start">
                  <h5 class="mb-0">Laravel</h5>
                  <p class="mb-0">Frameworks</p>
                </div></a></li>
          </ul>
          <div class="tab-content mt-5" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-huis" role="tabpanel" aria-labelledby="pills-huis-tab">
              <ul class="framworks-list">
                <li class="box wow fadeInUp">
                  <div> <img src="../assets/images/landing/icon/html/bootstrap.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Booxstrap 4X</h6>
                </li>
                <li class="box wow fadeInUp">
                  <div> <img src="../assets/images/landing/icon/html/css.png" alt=""></div>
                  <h6 class="mb-0 mt-3">CSS</h6>
                </li>
                <li class="box wow fadeInUp">
                  <div> <img src="../assets/images/landing/icon/html/sass.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Sass</h6>
                </li>
                <li class="box wow fadeInUp">
                  <div> <img src="../assets/images/landing/icon/html/pug.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Pug</h6>
                </li>
                <li class="box wow fadeInUp">
                  <div> <img src="../assets/images/landing/icon/html/npm.png" alt=""></div>
                  <h6 class="mb-0 mt-3">NPM</h6>
                </li>
                <li class="box wow fadeInUp">
                  <div> <img src="../assets/images/landing/icon/html/gulp.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Gulp</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/kit.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Starter Kit</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/uikits.png" alt=""></div>
                  <h6 class="mb-0 mt-3">40+ UI Kits</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/layout.png" alt=""></div>
                  <h6 class="mb-0 mt-3">8+ Layout</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/builders.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Builders</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/iconset.png" alt=""></div>
                  <h6 class="mb-0 mt-3">11 Icon Sets</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/forms.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Forms</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/table.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Tables</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/html/apps.png" alt=""></div>
                  <h6 class="mb-0 mt-3">17+ Apps</h6>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <ul class="framworks-list">
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/hook.png" alt=""></div>
                  <h6 class="mb-0 mt-3">React Hook</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/reactstrap.png" alt=""></div>
                  <h6 class="mb-0 mt-3">React Strap</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/noquery.png" alt=""></div>
                  <h6 class="mb-0 mt-3">No Jquery</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/redux.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Redux</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/firebase.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Firebase Auth</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/crud.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Firebase Crud</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/chat.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Chat</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/animation.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Router Animation</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/props_state.png" alt=""></div>
                  <h6 class="mb-0 mt-3">State & Props</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/react/reactrouter.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Reactrouter</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/react/chart.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Amazing Chart</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/react/map.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Map</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/react/gallery.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Gallery</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/react/application.png" alt=""></div>
                  <h6 class="mb-0 mt-3">9+ Apps</h6>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-angular" role="tabpanel" aria-labelledby="pills-angular-tab">
              <ul class="framworks-list">
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/1.png" alt=""></div>
                  <h6 class="mb-0 mt-3">SCSS</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/2.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Ng Bootstrap</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/3.png" alt=""></div>
                  <h6 class="mb-0 mt-3">RXjs</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/4.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Router</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/5.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Form</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/6.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Apex chart</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/7.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Chart.js</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/8.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Chartist</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/9.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Google Map</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/angular/10.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Gallery</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/angular/11.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Ecommerce</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/angular/12.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Firebase Auth</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/angular/13.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Firebase Crud</h6>
                </li>
                <li class="box wow bounceIn">
                  <div> <img src="../assets/images/landing/icon/angular/14.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Chat</h6>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-vue" role="tabpanel" aria-labelledby="pills-vue-tab">
              <ul class="framworks-list">
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/firebase.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Firebase</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/nojquery.png" alt=""></div>
                  <h6 class="mb-0 mt-3">No jquery</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/vuebootstrap.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Vue Bootstrap</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/vuex.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Vuex</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/chart.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Chart</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/vueswiper.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Vue Swiper</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/vuerouter.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Vue Router</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/vuemasonary.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Vue Masonary</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/vuecli.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Vue Cli</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/animation.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Animation</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/rangeslider.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Range Slider</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/vue/rtlsupport.png" alt=""></div>
                  <h6 class="mb-0 mt-3">RTL Support</h6>
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
              <ul class="framworks-list">
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/laravel.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Laravel 7</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/bootstrap.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Bootstrap 5</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/html/sass.png" alt=""></div>
                  <h6 class="mb-0 mt-3">SASS</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/blade.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Blade</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/layouts.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Layouts</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/npm.png" alt=""></div>
                  <h6 class="mb-0 mt-3">NPM</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/mix.png" alt=""></div>
                  <h6 class="mb-0 mt-3">MIX</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/yarn.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Yarn</h6>
                </li>
                <li class="box">
                  <div> <img src="../assets/images/landing/icon/laravel/sasswebpack.png" alt=""></div>
                  <h6 class="mb-0 mt-3">Sasswebpack</h6>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-space   bg-Widget pb-0 bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow pulse">
          <div class="cuba-demo-content mt50">
            <div class="couting">
              <h2>Cards</h2>
            </div>
            <p>So many unique cards</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid o-hidden">
      <div class="row landing-cards">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-sm-5 col-12"><img class="img-fluid landing-card" src="../assets/images/landing/cards/1.jpg" alt=""></div>
            <div class="col-sm-4 col-7"><img class="img-fluid landing-card" src="../assets/images/landing/cards/2.jpg" alt=""></div>
            <div class="col-sm-3 col-5"><img class="img-fluid landing-card" src="../assets/images/landing/cards/3.jpg" alt=""></div>
            <div class="col-sm-8 col-12">
              <div class="row">
                <div class="col-6"><img class="img-fluid landing-card" src="../assets/images/landing/cards/4.jpg" alt=""></div>
                <div class="col-6"><img class="img-fluid landing-card" src="../assets/images/landing/cards/5.jpg" alt=""></div>
                <div class="col-5"><img class="img-fluid landing-card" src="../assets/images/landing/cards/7.jpg" alt=""></div>
                <div class="col-7"><img class="img-fluid landing-card" src="../assets/images/landing/cards/8.jpg" alt=""></div>
              </div>
            </div>
            <div class="col-sm-4 col-12">
              <div class="row">
                <div class="col-sm-12 col-6"><img class="img-fluid landing-card" src="../assets/images/landing/cards/6.jpg" alt=""></div>
                <div class="col-sm-12 col-6"><img class="img-fluid landing-card" src="../assets/images/landing/cards/9.jpg" alt=""></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="row">
            <div class="col-lg-12 col-sm-4"><img class="img-fluid landing-card" src="../assets/images/landing/cards/10.jpg" alt=""></div>
            <div class="col-md-6 col-sm-4"><img class="img-fluid landing-card" src="../assets/images/landing/cards/15.jpg" alt=""><img class="img-fluid landing-card" src="../assets/images/landing/cards/11.jpg" alt=""><img class="img-fluid landing-card" src="../assets/images/landing/cards/21.jpg" alt=""></div>
            <div class="col-md-6 col-sm-4"><img class="img-fluid landing-card" src="../assets/images/landing/cards/14.jpg" alt=""><img class="img-fluid landing-card" src="../assets/images/landing/cards/13.jpg" alt=""></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-space  " id="applications">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow pulse">
          <div class="cuba-demo-content mt50">
            <div class="couting">
              <h2>20+</h2>
            </div>
            <p>Usefull application</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid container-modify apps">
      <div class="landing-slider">
        <div class="row">
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/social-app.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/social-app.jpg" alt=""></a></div>
            <h4>Social App</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/knowledgebase.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/knowlagebase-app.jpg" alt=""></a></div>
            <h4>knowledgebase</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/support-ticket.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/support-ticket-app.jpg" alt=""></a></div>
            <h4>Support Ticket</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/email-application.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/mail-app.jpg" alt=""></a></div>
            <h4>Email Dashboard</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/to-do.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/To-Do-app.jpg" alt=""></a></div>
            <h4>To-Do</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/job-cards-view.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/job-search-app.jpg" alt=""></a></div>
            <h4>Job Search</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/product-page.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/ecommerce-app.jpg" alt=""></a></div>
            <h4>Ecommerce</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/kanban.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/apps/kanban.jpg" alt=""></a></div>
            <h4>Kanban</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/file-manager.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/apps/file.jpg" alt=""></a></div>
            <h4>File Manager</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/projects.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/apps/project.jpg" alt=""></a></div>
            <h4>Project</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/contacts.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/apps/contacts.jpg" alt=""></a></div>
            <h4>Contacts</h4>
          </div>
          <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
            <div class="img-effect mb-3"><a href="../theme/chat.html" target="_blank"><img class="img-fluid cuba-img" src="../assets/images/landing/apps/chat.jpg" alt=""></a></div>
            <h4>Chat</h4>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-space   app_bg">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 wow pulse">
          <div class="cuba-demo-content email-txt text-start">
            <div class="couting">
              <h2> Email</h2>
              <p> Cuba comes with below six email template.</p>
              <ul class="landing-ul">
                <li>Basic template</li>
                <li>Basic With Header template</li>
                <li>Ecommerce template</li>
                <li>Ecommerce-2 template</li>
                <li>Ecommerce-3 template</li>
                <li>Order Success template</li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8 wow pulse"><a href="index.html"><img class="img-fluid email-img" src="../assets/images/landing/email_section_img.png" alt=""></a></div>
      </div>
    </div>
  </section>
  <section class="section-space   components-section" id="components">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 wow pulse">
          <div class="cuba-demo-content mt50">
            <div class="couting">
              <h2>UI</h2>
            </div>
            <p>Components</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container container-modify">
      <div class="row component_responsive">
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/1.png" alt="">
            <h6 class="m-0 Pt-4">SweetAlert2</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/2.png" alt="">
            <h6 class="m-0">Avatar</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/3.png" alt="">
            <h6 class="m-0">Scrollable</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/4.png" alt="">
            <h6 class="m-0">Tree view</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/5.png" alt="">
            <h6 class="m-0">Bootstrap notify</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/6.png" alt="">
            <h6 class="m-0">Rating </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/7.png" alt="">
            <h6 class="m-0">Dropzone</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/8.png" alt="">
            <h6 class="m-0">Tour</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/9.png" alt="">
            <h6 class="m-0">Animated modal</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/10.png" alt="">
            <h6 class="m-0">Owl Carousel</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/11.png" alt="">
            <h6 class="m-0">Ribbons </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/12.png" alt="">
            <h6 class="m-0">Pagination </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/13.png" alt="">
            <h6 class="m-0">Steps </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/14.png" alt="">
            <h6 class="m-0">Breadcrumb  </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/15.png" alt="">
            <h6 class="m-0">Range Slider </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/16.png" alt="">
            <h6 class="m-0">image cropper </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/17.png" alt="">
            <h6 class="m-0">Sticky </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/18.png" alt="">
            <h6 class="m-0">Progress </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/19.png" alt="">
            <h6 class="m-0">Tooltip </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/20.png" alt="">
            <h6 class="m-0">Spinners </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/21.png" alt="">
            <h6 class="m-0">Dropdown </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/22.png" alt="">
            <h6 class="m-0">Tabs </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/23.png" alt="">
            <h6 class="m-0">Accordion  </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/24.png" alt="">
            <h6 class="m-0">Navs</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/25.png" alt="">
            <h6 class="m-0">Shadow</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/26.png" alt="">
            <h6 class="m-0">state color</h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/27.png" alt="">
            <h6 class="m-0">List  </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/28.png" alt="">
            <h6 class="m-0">Grid </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/29.png" alt="">
            <h6 class="m-0">Helper classes </h6>
          </div>
        </div>
        <div class="col-xl-2 col-md-4 col-6 component-col-set">
          <div class="component-hover-effect"><img src="../assets/images/landing/icon/30.png" alt="">
            <h6 class="m-0">Typography</h6>
          </div>
        </div>
      </div>
    </div>
  </section>  --}}

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
