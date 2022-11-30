@extends('templates.minimal.layouts.user')

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/charts/chartist.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/pages/chat-application.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/pages/dashboard-analytics.css')}}">
@endsection

@section('content')
<style type="text/css">
  .inner-card{
    box-shadow: 0px 1px 15px 1px rgb(62 57 107 / 7%) !important;
  }
  .user-info-item .user-info-header .right {
    width: 50px;
  }
  .user-info-item .user-info-header .right img {
    max-width: 100%;
  }
  .user-info-item .user-info-header .left {
    width: calc(100% - 50px);
  }
</style>
<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
      <div class="content-header-left col-md-4 col-12 mb-2">
        <h3 class="content-header-title">{{__($page_title)}}</h3>
      </div>

    </div>
    <div class="content-body">
      <section class="row">
        <div class="col-sm-12">
          <div id="what-is">
            <br/>
            <br/>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row mb-60-80">
                  <?php $if = 0;
                    $textVar = "Balans beschikbaar";
                  ?>
                  @foreach($authWallets as $k=> $data)
                  <?php
                  if($if == '1'){
                   $textVar = "Target Return";
                 }
               ?>
               <div class="col-md-4">
                <div class="card inner-card pull-up border-top-info border-top-3 rounded-0">
                  <div class="card-header">
                    <h4 class="card-title">{{$textVar}}</h4>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body p-1">
                      <h4 class="font-large-1 text-bold-400">{{$general->cur_sym}}{{formatter_money($data->balance)}}
                        @if($data->type == 'deposit_wallet')
                        <a href="{{route('user.deposit.history')}}" class="float-right">
                          <i class="ft-users "></i>
                        </a>
                        @elseif($data->type == 'interest_wallet')
                        <a href="{{route('user.referral')}}" class="float-right">
                          <i class="ft-users "></i>
                        </a>
                        @endif
                      </h4>
                    </div>

                  </div>
                </div>

              </div>
              <?php $if++; ?>
              @endforeach

              {{--  <div class="col-md-4">
                <div class="card inner-card pull-up border-top-info border-top-3 rounded-0">
                  <div class="card-header">
                    <h4 class="card-title">@lang('Total Invest')</h4>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body p-1">
                      <h4 class="font-large-1 text-bold-400">{{$general->cur_sym}}{{formatter_money($totalInvest)}}
                        <a href="{{route('user.interest.log')}}" class="float-right">
                          <img src="{{asset($activeTemplateTrue.'images/user/balance.png')}}" alt="user">
                        </a>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>  --}}

              {{--  <div class="col-md-4">
                <div class="card inner-card pull-up border-top-info border-top-3 rounded-0">
                  <div class="card-header">
                    <h4 class="card-title">@lang("Total Withdraw")</h4>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body p-1">
                      <h4 class="font-large-1 text-bold-400">{{$general->cur_sym}}{{formatter_money($totalWithdraw)}}
                        <a href="{{route('user.withdraw.history')}}" class="float-right">
                          <img src="{{asset($activeTemplateTrue.'images/user/withdraw.png')}}" alt="user">
                        </a>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>  --}}
              <div class="col-md-4">
                <div class="card inner-card pull-up border-top-info border-top-3 rounded-0">
                  <div class="card-header">
                    <h4 class="card-title">@lang('Total Deposit')</h4>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body p-1">
                      <h4 class="font-large-1 text-bold-400">{{$general->cur_sym}}{{formatter_money($totalDeposit)}}
                        <a href="{{route('user.deposit.history')}}" class="float-right">
                          <img src="{{asset($activeTemplateTrue.'images/user/balance.png')}}" alt="user">
                        </a>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>
              {{--  <div class="col-md-4">
                <div class="card inner-card pull-up border-top-info border-top-3 rounded-0">
                  <div class="card-header">
                    <h4 class="card-title">@lang('Total Ticket')</h4>
                  </div>
                  <div class="card-content collapse show">
                    <div class="card-body p-1">
                      <h4 class="font-large-1 text-bold-400">{{$totalTicket}}
                        <a href="{{route('ticket')}}" class="float-right">
                          <img src="{{asset($activeTemplateTrue.'images/user/earn.png')}}" alt="user">
                        </a>
                      </h4>
                    </div>
                  </div>
                </div>
              </div>  --}}

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>

<div class="content-body">
    <section class="row">
      <div class="col-sm-12">

        <!-- What is-->
        <div id="what-is" class="card">
            <h3 class="pt-1 pl-1">Purchases</h3>
          <div class="card-content collapse show">
            <div class="card-body">
              <div class="card-text">
                <div class="table-responsive table-responsive--md">
                       <table class="table table-striped">
                        <thead class="thead-dark">
                         <tr>
                          <th scope="col">@lang('ID')</th>
                          <th scope="col">@lang('Name')</th>
                          <th scope="col">@lang('Amount')</th>

                          <th scope="col">@lang('Date')</th>
                          {{--  <th scope="col">@lang('Actions')</th>  --}}

                        </tr>
                      </thead>
                      <tbody>

                       @foreach($pur as $purs)
                       <tr>
                        <td>{{$purs->id}}</td>
                        <td>{{$purs->name}}</td>
                        <td>{{number_format($purs->amount,2)}}</td>
                        <td>{{ Carbon\Carbon::parse($purs->created_at)->format('d F, y') }}</td>

                      {{--  <td>
                          <a href="{{ url('/purchase/edit', $data->id) }}" class="label label-primary"><i class="fas fa-edit"></i></a>
                      </td>  --}}

                      </tr>
                      @endforeach



                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ What is-->

        <!-- Kick start -->

        <!-- Simple Card-->
      </div>
    </section>

  </div>
{{-- <div class="content-body px-2">
  <section class="row">
    <div class="col-sm-12">
      <div id="what-is" class="card">
        <div class="card-header">
          <h4>@lang('Total Investment')</h4>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="card-text">
              <div class="chart-scroll m-0">
                <div class="chart-wrapper m-0">
                  <canvas id="myCharT" width="400" height="160"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div> --}}

{{--  <div class="content-body px-2">
  <section class="row">
     <div class="col-lg-8 col-md-8">
      <div class="card" style="height:100% !important">
        <div class="card-header">
          <h4 class="card-title">Revenue Statistics</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">

          </div>
        </div>
        <div class="card-content collapse show">
          <div class="card-body p-0 pb-0">
            <div class="chartist">
              <div id="project-stats" class="height-400 areaGradientShadow1"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4">
      <div class="card" style="height:100% !important">
        <div class="card-header">
          <h4 class="card-title">@lang('Total Investment')</h4>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <!-- <div class="heading-elements">
              <ul class="list-inline mb-0">
                  <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                  <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                  <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  <li><a data-action="close"><i class="ft-x"></i></a></li>
              </ul>
          </div> -->
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="height-400">
                <canvas id="simple-doughnut-chart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>  --}}


{{-- <div class="content-body px-2">
  <section class="row">
    <div class="col-sm-12">
      <div id="what-is" class="card">
        <div class="card-header">
          <h4>@lang('Revenue Statistics')</h4>
        </div>
        <div class="card-content collapse show">
          <div class="card-body">
            <div class="card-text">
              <div class="chart-scroll m-0">
                <div class="chart-wrapper m-0">
                  <canvas id="myCharT1" width="400" height="160"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div> --}}




</div>
</div>


@endsection

@section('script')
<script src="{{asset('assets/new_assets/app-assets/vendors/js/charts/chartist.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/new_assets/app-assets/vendors/js/charts/chartist-plugin-tooltip.min.js')}}" type="text/javascript"></script>
{{-- <script src="{{asset('assets/new_assets/app-assets/js/scripts/pages/dashboard-analytics.js')}}" type="text/javascript"></script> --}}


<script src="{{asset($activeTemplateTrue.'js/chart.js')}}"></script>


<script>
  var projectStats = new Chartist.Line('#project-stats', {

      labels: @json($collection['day']),
      series: [
          @json($collection['trx'])
      ]
    }, {
      lineSmooth: Chartist.Interpolation.simple({
          divisor: 2
      }),
      fullWidth: true,
      showArea: true,
      chartPadding: {
          right: 35
      },

      axisX: {
          showGrid: false,
      },
      axisY: {
           labelInterpolationFnc: function (value) {
              return value + 'k';
          },
          scaleMinSpace: 40,
          showGrid: false,
      },
      plugins: [
          Chartist.plugins.tooltip({
              appendToBody: true,
              pointClass: 'ct-point'
          })
      ],
      low: 0,
      onlyInteger: true,
  });

  projectStats.on('created', function (data) {
      var defs = data.svg.querySelector('defs') || data.svg.elem('defs');
      defs.elem('linearGradient', {
          id: 'area-gradient',
          x1: 1,
          y1: 0,
          x2: 0,
          y2: 0
      }).elem('stop', {
          offset: 0,
          'stop-color': 'rgba(248,161,236, 1)'
      }).parent().elem('stop', {
          offset: 1,
          'stop-color': 'rgba(115,150,255, 1)'
      });

      return defs;


  }).on('draw', function (data) {
      var circleRadius = 9;
      if (data.type === 'point') {
          var circle = new Chartist.Svg('circle', {
              cx: data.x,
              cy: data.y,
              'ct:value': data.y,
              r: circleRadius,
              class: data.value.y === 180 || data.value.y === 150 ? 'ct-point-circle ct-point' : 'ct-point ct-point-circle-transperent'
          });
          data.element.replace(circle);
      }
      if (data.type === 'line' || data.type == 'area') {
          data.element.animate({
              d: {
                  begin: 1000,
                  dur: 1000,
                  from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                  to: data.path.clone().stringify(),
                  easing: Chartist.Svg.Easing.easeOutQuint
              }
          });
      }
  });


$(window).on("load", function(){

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-doughnut-chart");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration:500,
    };

    // Chart Data
    var chartData = {
        labels: @json($allInvestment_name),
        datasets: [{
            label: "My First dataset",
            data: @json($allInvestment_amount),
            backgroundColor: ['#666EE8', '#28D094', '#FF4961','#1E9FF2', '#FF9149'],
        }]
    };

    var config = {
        type: 'doughnut',

        // Chart Options
        options : chartOptions,

        data : chartData
    };

    // Create the chart
    var doughnutSimpleChart = new Chart(ctx, config);

});

  // var ctx = document.getElementById('myCharT1').getContext('2d');
  // var myChart = new Chart(ctx, {
  //   type: 'line',
  //   // type: 'doughnut',
  //   data: {
  //     labels: @json($collection['day']),
  //     datasets: [{
  //       label: '# Weekly Revenue',
  //       data: @json($collection['trx']),
  //       backgroundColor: [
  //       'rgba(58, 248, 93, 0.26)',
  //       'rgba(54, 162, 235, 0.2)',
  //       'rgba(255, 206, 86, 0.2)',
  //       'rgba(75, 192, 192, 0.2)',
  //       'rgba(153, 102, 255, 0.2)',
  //       'rgba(255, 159, 64, 0.2)',
  //       'rgba(58, 248, 93, 0.26)'
  //       ],
  //       borderColor: [
  //       'rgba(58, 248, 80, 0.65)',
  //       'rgba(54, 162, 235, 1)',
  //       'rgba(255, 206, 86, 1)',
  //       'rgba(75, 192, 192, 1)',
  //       'rgba(153, 102, 255, 1)',
  //       'rgba(255, 159, 64, 1)',
  //       'rgba(58, 248, 80, 0.65)'
  //       ],
  //       borderWidth: 1
  //     }]
  //   },
  //   options: {
  //     scales: {
  //       yAxes: [{
  //         ticks: {
  //           beginAtZero: true
  //         }
  //       }]
  //     }
  //   }
  // });

  // var ctx = document.getElementById('myCharT').getContext('2d');
  // var myChart = new Chart(ctx, {
  //   // type: 'line',
  //   type: 'doughnut',
  //   data: {
  //     labels: @json($allInvestment_name),
  //     datasets: [{
  //       label: '# Total Investment',
  //       data: @json($allInvestment_amount),
  //       backgroundColor: [
  //       'rgb(255, 99, 132)',
  //       'rgb(255, 205, 86)',
  //       'rgb(255, 159, 64)',
  //       'rgb(75, 192, 192)',
  //       'rgb(54, 162, 235)',
  //       'rgb(153, 102, 255)',
  //       'rgb(201, 203, 207)',
  //       'rgba(58, 248, 93)',
  //       ],

  //       borderWidth: 1
  //     }]
  //   },
  //   options: {
  //     responsive: true,
  //     plugins: {
  //       legend: {
  //         position: 'top',
  //       },
  //       title: {
  //         display: true,
  //         text: 'Total Investment'
  //       }
  //     }

  //   }
  // });
</script>

@endsection
