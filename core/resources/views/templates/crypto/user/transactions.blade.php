@extends('templates.crypto.layouts.user')

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>{{__($page_title)}}</h3>
          </div>
          {{--  <div class="col-6">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
              <li class="breadcrumb-item">Bootstrap Tables</li>
              <li class="breadcrumb-item active">Bootstrap Styling Tables</li>
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
            <div class="card-block row">
              <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive">
                  <table class="table">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col">@lang('Transaction ID')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Remaining Balance')</th>
                            <th scope="col">@lang('Details')</th>
                            <th scope="col">@lang('Date')</th>
                          </tr>
                    </thead>
                    <tbody>
                        @if(count($logs) >0)
                        @foreach($logs as $k=>$data)
                        <tr>
                          <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                          <td data-label="@lang('Amount')">
                            <strong @if($data->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($data->trx_type == '+') ? '+':'-'}} {{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                          </td>
                          <td data-label="@lang('Remaining Balance')">
                            <strong class="text-info">{{formatter_money($data->post_balance)}} {{$general->cur_text}}</strong>
                          </td>
                          <td data-label="@lang('Details')">{{$data->details}}</td>
                          <td data-label="@lang('Date')">{{date('d M, Y', strtotime($data->created_at))}}</td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                          <td colspan="5"> @lang('No results found')!</td>
                        </tr>
                        @endif
                    </tbody>
                  </table>
                </div>
                <div class="d-flex justify-content-center">
                <div class="p-3">
                {{$logs->links()}}
                </div>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid Ends-->
  </div>

@endsection

@section('scripts')

@endsection
