@extends('admin.layouts.app')
@section('panel')
<script>
        function createCountDown(elementId, sec) {
            var tms = sec;
            var x = setInterval(function() {
                var distance = tms*1000;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML =days+"d: "+ hours + "h "+ minutes + "m " + seconds + "s ";
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById(elementId).innerHTML = "{{__('COMPLETE')}}";
                }
                tms--;
            }, 1000);
        }
    </script>
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="table-responsive table-responsive-xl">
					<table class="table align-items-center table-light">
						<thead>
							<tr>
								<th>Invest Date</th>
								<th>Username</th>
								<th>Plan Name</th>
                                <th>Payable Interest</th>
                                <th>Period</th>
                                <th>Received</th>
                                <th>Capital Back</th>
                                <th>Invest Amount</th>
                                <th>Status</th>
                                <th>Next Payment</th>
							</tr>
						</thead>
						<tbody>
							@forelse($invests as $data)
							<tr>
								<td>{{__($data->created_at->format('Y-m-d'))}}</td>
								<td><a href="{{ route('admin.users.detail', $data->user->id) }}"> {{__($data->user->username)}}</a></td>
								<td>{{__($data->plan->name)}}</td>
                                    <td>{{__($general->currency_sym)}} {{__($data->interest)}} / {{__($data->time_name)}} </td>
                                    <td>@if($data->period == '-1') <span class="badge badge-success">@lang('Life-time')</span>  @else {{__($data->period)}} @lang('Times') @endif</td>
                                    <td>  {{__($data->return_rec_time)}} @lang('Times') </td>
                                    <td>@if($data->capital_status == '1') <span class="badge badge-success">@lang('Yes')</span>  @else <span class="badge badge-warning">@lang('No')</span> @endif</td>
                                    <td>  {{__($general->currency_sym)}} {{__($data->amount)}} </td>
                                    <td>  @if($data->status == '1')  <span class="badge badge-warning"><i class="fa fa-spinner fa-spin"></i> @lang('Running')</span>  @else <span class="badge badge-primary">@lang('Complete')</span> @endif </td>
                                    <td Next Payment scope="row" style="font-weight:bold;">  @if($data->status == '1') <p id="counter{{$data->id}}" class="demo countdown timess2"></p> @else - @endif </td>
							</tr>
							<script>createCountDown('counter<?php echo $data->id ?>', {{\Carbon\Carbon::parse($data->next_time)->diffInSeconds()}});</script>
							@empty
							<tr>
								<td class="text-muted text-center" colspan="100%">Data Not Found</td>
							</tr>

							@endforelse
						</tbody>
					</table>
				</div>
				<div class="card-footer py-4">
					<nav aria-label="...">
						{{ $invests->links() }}
					</nav>
				</div>
			</div>
		</div>
	</div>
@endsection