@extends('templates.crypto.layouts.user')

@section('content')
<!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>{{__($page_title)}}</h3>
                </div>
                {{--  <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Bootstrap Tables</li>
                    <li class="breadcrumb-item active">Bootstrap Basic Tables</li>
                  </ol>
                </div>  --}}
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">

              <div class="col-sm-12">
                <div class="card">
                  {{--  <div class="card-header">
                    <h5>Hoverable rows</h5><span>Use a class <code>table-hover</code> to enable a hover state on table rows within a <code>tbody</code>.</span>
                  </div>  --}}
                  <div class="table-responsive">
                    <table class="table table-bordernone rounded">
                        <thead class="table-primary">
                        <tr>
                            <th scope="col">@lang('ID')</th>
                            <th scope="col">@lang('Plan Name')</th>
                            <th scope="col">@lang('Plan Amount')</th>
                            <th scope="col">@lang('Interest Amount')</th>
                            <th scope="col">@lang('Total Amount you get')</th>
                            <th scope="col">@lang('Date')</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($invest_plan) >0)
                         @foreach($invest_plan as $k=>$data)
                         <tr>
                          <td>{{$data->id}}</td>
                          <td>{{$data->plan_name}}</td>
                          <td>{{number_format($data->amount,2)}}</td>
                          <td>{{number_format($data->interest,2)}}</td>
                          <td>{{number_format($data->total_amount,2)}}</td>
                          <td>{{$data->created_at}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="6"> @lang('No results found')!</td>
                        </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- footer start-->
@endsection
