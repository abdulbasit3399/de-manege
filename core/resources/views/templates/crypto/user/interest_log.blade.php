@extends('templates.crypto.layouts.user')

@section('content')
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

<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>{{__($page_title)}}</h3>
          </div>
          <div class="col-6">
            {{--  <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
              <li class="breadcrumb-item">Widgets</li>
              <li class="breadcrumb-item active">General</li>
            </ol>  --}}
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-12 xl-100 box-col-12">
          <div class="card">
            <div class="card-body p-0 pb-3">
              <div class="user-status1 table-responsive best-seller-table1 mb-0">
                <table class="table table-bordernone rounded">
                  <thead class="table-primary">
                    <tr>
                        <th scope="col">@lang('Plan Name')</th>
                        <th scope="col">@lang('Payable Interest')</th>
                        <th scope="col">@lang('Period')</th>
                        <th scope="col">@lang('Received')</th>
                        <th scope="col">@lang('Capital Back')</th>
                        <th scope="col">@lang('Invest Amount')</th>
                        <th scope="col">@lang('Status')</th>
                        <th scope="col" style="width :20%">@lang('Next Payment')</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(count($trans)==0)
                        <tr>
                          <td colspan="8" class="text-center">@lang('No Data Available')</td>
                        </tr>
                        @endif
                        @foreach($trans as $data)
                        <tr>
                          <td data-label="@lang('Plan Name')">{{__($data->plan->name)}}</td>
                          <td data-label="@lang('Payable Interest')">{{__($general->currency_sym)}} {{__($data->interest)}} / {{__($data->time_name)}} </td>
                          <td data-label="@lang('Period')">@if($data->period == '-1') <span class="badge badge-light-success">@lang('Life-time')</span>  @else {{__($data->period)}} @lang('Times') @endif</td>
                          <td data-label="@lang('Received')">  {{__($data->return_rec_time)}} @lang('Times') </td>
                          <td data-label="@lang('Capital Back')">@if($data->capital_status == '1') <span class="badge badge-light-success">@lang('Yes')</span>  @else <span class="badge badge-light-warning">@lang('No')</span> @endif</td>
                          <td data-label="@lang('Invest Amount')">  {{__($general->currency_sym)}} {{__(number_format($data->amount,2))}} </td>
                          <td data-label="@lang('Status')" style="padding-top:20px">  @if($data->status == '1')  <span class="badge badge-light-warning"><i class="fas fa-spinner fa-spin"></i> @lang('Running')</span>  @else <span class="badge badge-light-primary">@lang('Complete')</span> @endif </td>
                          <td data-label="@lang('Next Payment')" scope="row" class="font-weight-bold " >  @if($data->status == '1') <p id="counter{{$data->id}}" class="demo countdown timess2 mt-1"></p> @else - @endif </td>

                          <script>createCountDown('counter<?php echo $data->id ?>', {{\Carbon\Carbon::parse($data->next_time)->diffInSeconds()}});</script>
                        </tr>
                        @endforeach
                    {{--  <tr>
                      <td>Dummy text usedout print</td>
                      <td class="digits">10</td>
                      <td class="digits font-primary">$6523</td>
                      <td class="text-end"><span class="badge badge-light-success"><i class="me-2" data-feather="check"></i> Done</span></td>
                    </tr>
                    <tr>
                      <td>Graphic or web designs</td>
                      <td class="digits">20</td>
                      <td class="digits font-primary">$6523</td>
                      <td class="text-end"><span class="badge badge-light-warning"><i class="me-2" data-feather="rotate-cw"></i> Pending</span></td>
                    </tr>
                    <tr>
                      <td>Attributed Passage</td>
                      <td class="digits">40</td>
                      <td class="digits font-primary">$6523</td>
                      <td class="text-end"><span class="badge badge-light-success"><i class="me-2" data-feather="check"></i> Done</span></td>
                    </tr>
                    <tr>
                      <td>Unknown typesetter</td>
                      <td class="digits">05</td>
                      <td class="digits font-primary">$6523</td>
                      <td class="text-end"><span class="badge badge-light-info"><i class="me-2" data-feather="clock"></i> In process</span></td>
                    </tr>
                    <tr>
                      <td>Have scrambled</td>
                      <td class="digits">08</td>
                      <td class="digits font-primary">$6523</td>
                      <td class="text-end"><span class="badge badge-light-warning"><i class="me-2" data-feather="rotate-cw"></i> Pending</span></td>
                    </tr>
                    <tr>
                      <td>Type specimen</td>
                      <td class="digits">12</td>
                      <td class="digits font-primary">$6523</td>
                      <td class="text-end"><span class="badge badge-light-warning"><i class="me-2" data-feather="rotate-cw"></i> Pending</span></td>
                    </tr>  --}}
                  </tbody>
                </table>
              </div>
              <div class="d-flex justify-content-center my-3">
                {{$trans->links()}}
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>
@endsection
