@extends('admin.layouts.app')

@section('panel')


    @if($general->sys_version)
        <div class="row">
            <div class="col-md-12">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">
                        <h3> New Version Available <button class="btn btn-dark pull-right">Version {{json_decode($general->sys_version)->version}}</button> </h3>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-dark">What is the Update ?</h5>
                        <p><pre  style="font-size: 20px;">{{json_decode($general->sys_version)->details}}</pre></p>
                    </div>
                </div>
            </div>
        </div>

    @endif


<div class="row">


  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="34495e" data-before="2c3e50" style="background: #34495e; --before-bg-color:#2c3e50;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ collect($widget['total_users'])->count() }}</h2>
        <h6 class="mb-3">Aantal leden</h6>
        <a href="{{ route('admin.users.all') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-group"></i>
      </div>
    </div>
  </div>

  {{--  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="2ecc71" data-before="27ae60" style="background: #2ecc71; --before-bg-color:#27ae60;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ collect($widget['total_users'])->where('status', 1)->count() }}</h2>
        <h6 class="mb-3">Active Users</h6>
        <a href="{{ route('admin.users.active') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-user-circle"></i>
      </div>
    </div>
  </div>  --}}

  {{--  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="e74c3c" data-before="c0392b" style="background: #e74c3c; --before-bg-color:#c0392b;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ collect($widget['total_users'])->where('status', 0)->count() }}</h2>
        <h6 class="mb-3">Banned Users</h6>
        <a href="{{ route('admin.users.banned') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-user-times"></i>
      </div>
    </div>
  </div>  --}}

  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="7d5fff" data-before="7158e2" style="background: #7d5fff; --before-bg-color:#7158e2;">
      <div class="details">
        <h3 class="amount mb-2 font-weight-bold">{{ $general->cur_sym }}{{ formatter_money($widget['user_balance'])}}</h3>
        <h6 class="mb-3">Tegoed gebruikers</h6>
        <a href="{{ route('admin.users.withbalance') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-money"></i>
      </div>
    </div>
  </div>

  {{--  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2  border-radius-5" data-bg="ff5252" data-before="b33939" style="background: #ff5252; --before-bg-color:#b33939;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ collect($widget['total_users'])->where('ev', 0)->count() }}</h2>
        <h6 class="mb-3">Email Unverified Users</h6>
        <a href="{{ route('admin.users.emailUnverified') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-envelope"></i>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2  border-radius-5" data-bg="34ace0" data-before="227093" style="background: #34ace0; --before-bg-color:#227093;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ collect($widget['total_users'])->where('sv', 0)->count() }}</h2>
        <h6 class="mb-3">SMS Unverified Users</h6>
        <a href="{{ route('admin.users.smsUnverified') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-comments-o"></i>
      </div>
    </div>
  </div>  --}}







  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 slice border-radius-5" data-bg="2ecc71" data-before="27ae60" style="background: #2ecc71; --before-bg-color:#27ae60;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ formatter_money($widget['deposits']->total) }}</h2>
        <h6 class="mb-3">Aantal opwaardering</h6>
        <a href="{{ route('admin.deposit.approved') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-download"></i>
      </div>
    </div>
  </div>



  {{--  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 slice border-radius-5" data-bg="40407a" data-before="2c2c54" style="background: #40407a; --before-bg-color:#2c2c54;">
      <div class="details">
        <h3 class="amount mb-2 font-weight-bold">{{ $general->cur_sym }}{{ formatter_money($widget['deposits']->total_charge) }}</h3>
        <h6 class="mb-3">Total Deposit Charge</h6>
        <a href="{{ route('admin.deposit.approved') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-money"></i>
      </div>
    </div>
  </div>  --}}


    <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 slice border-radius-5" data-bg="34495e" data-before="2c3e50" style="background: #34495e; --before-bg-color:#2c3e50;">
            <div class="details">
                <h3 class="amount mb-2 font-weight-bold">{{ $general->cur_sym }}{{ formatter_money($widget['deposits']->total_amount) }}</h3>
                <h6 class="mb-3">Totaal opwaardeer bedrag</h6>
                <a href="{{ route('admin.deposit.approved') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
            </div>
            <div class="icon">
                <i class="fa fa-money"></i>
            </div>
        </div>
    </div>

{{--  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="B33771" data-before="6D214F" style="background: #B33771; --before-bg-color:#6D214F;">
      <div class="details">
        <h2 class="amount mb-2 font-weight-bold">{{ formatter_money($widget['withdrawals']->total) }}</h2>
        <h6 class="mb-3">Total Withdrawals</h6>
        <a href="{{ route('admin.withdraw.log') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-upload"></i>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="e67e22" data-before="d35400" style="background: #e67e22; --before-bg-color:#d35400;">
      <div class="details">
        <h3 class="amount mb-2 font-weight-bold">{{ $general->cur_sym }}{{ formatter_money($widget['withdrawals']->total_charge) }}</h3>
        <h6 class="mb-3">Total Withdrawal Charge</h6>
        <a href="{{ route('admin.withdraw.log') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-money"></i>
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-lg-6 col-sm-6">
    <div class="dashboard-w2 border-radius-5" data-bg="e74c3c" data-before="c0392b" style="background: #e74c3c; --before-bg-color:#c0392b;">
      <div class="details">
        <h3 class="amount mb-2 font-weight-bold">{{ $general->cur_sym }}{{ formatter_money($widget['withdrawals']->total_amount) }}</h3>
        <h6 class="mb-3">Total Withdrawal Amount</h6>
        <a href="{{ route('admin.withdraw.log') }}" class="btn btn-sm btn-neutral">Alles weergeven</a>
      </div>
      <div class="icon">
        <i class="fa fa-money"></i>
      </div>
    </div>
  </div>






</div>  --}}
{{--  <div class="row">

  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="font-weight-normal">Users By OS</h4>
      </div>
      <div class="card-body">
        <canvas id="userOsChart"></canvas>
      </div>
    </div>
  </div><!--card end-->

  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="font-weight-normal">Users By Browser</h4>
      </div>
      <div class="card-body">
        <canvas id="userBrowserChart"></canvas>
      </div>
    </div>
  </div><!--card end-->

  <div class="col-xl-4 col-lg-4 col-md-6">
    <div class="card">
      <div class="card-header">
        <h4 class="font-weight-normal">Users By Country</h4>
      </div>
      <div class="card-body">
        <canvas id="userCountryChart"></canvas>
      </div>
    </div>
  </div><!--card end-->

</div>  --}}
@endsection

@push('style-lib')
<link rel="stylesheet" href="{{ asset('assets/admin/css/chart.min.css') }}">
@endpush

@push('script-lib')
<script src="{{ asset('assets/admin/js/chart-all.min.js') }}"></script>
@endpush

@push('script')
<script>
var ctx = document.getElementById('userBrowserChart').getContext('2d');
  ctx.canvas.height = 260;
  var myChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
          labels: @json($chart['user_browser_counter']->keys()),
          datasets: [{
              data: {{ $chart['user_browser_counter']->flatten() }},
              backgroundColor: [
                '#e74c3c',
                '#9b59b6',
                '#34495e',
                '#e67e22',
                '#f1c40f',
                '#7f8c8d',
                '#3498db',
                '#1abc9c',
              ],
              borderColor: [
                  'rgba(231, 80, 90, 0.75)'
              ],
              borderWidth: 1,

          }]
      },
      options: {
          elements: {
              line: {
                  tension: 1 // disables bezier curves
              }
          },

      }
  });


var ctx = document.getElementById('userOsChart').getContext('2d');
ctx.canvas.height = 260;
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: @json($chart['user_os_counter']->keys()),
        datasets: [{
            data: {{ $chart['user_os_counter']->flatten() }},
            backgroundColor: [
              '#e74c3c',
              '#9b59b6',
              '#34495e',
              '#e67e22',
              '#f1c40f',
              '#7f8c8d',
              '#3498db',
              '#1abc9c',
            ],
            borderColor: [
                'rgba(231, 80, 90, 0.75)'
            ],
            borderWidth: 1,

        }]
    },
    options: {
        elements: {
            line: {
                tension: 1 // disables bezier curves
            }
        },

    }
});
var ctx = document.getElementById('userCountryChart').getContext('2d');
ctx.canvas.height = 260;
var myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: @json($chart['user_country_counter']->keys()),
        datasets: [{
            data: {{ $chart['user_country_counter']->flatten() }},
            backgroundColor: [
              '#e74c3c',
              '#9b59b6',
              '#34495e',
              '#e67e22',
              '#f1c40f',
              '#7f8c8d',
              '#3498db',
              '#1abc9c',
            ],
            borderColor: [
                'rgba(231, 80, 90, 0.75)'
            ],
            borderWidth: 1,

        }]
    },
    options: {
        elements: {
            line: {
                tension: 1 // disables bezier curves
            }
        },

    }
});
</script>
@endpush
