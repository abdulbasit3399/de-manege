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
        <section class="row">
            <div class="col-sm-12">
              <!-- What is-->
              <div id="what-is" class="card">
                  <div class="card-body">
                      <div class="row mb-60-80 justify-content-center">
                        <div class="col-md-8">
                          <ul class="list-group text-center">
                            <li class="list-group-item p-3">
                              <img
                              src="{{ $data->gateway_currency()->methodImage() }}"
                              />
                            </li>

                            <li class="list-group-item p-3">
                              @lang('Amount'):
                              <strong>{{formatter_money(number_format($data->amount,2))}} </strong> {{$general->cur_text}}
                            </li>
                            <li class="list-group-item p-3">
                              @lang('Charge'):
                              <strong>{{number_format($data->charge,2)}}</strong> {{$general->cur_text}}
                            </li>

                            <li class="list-group-item p-3">
                              @lang('Payable'): <strong> {{number_format($data->amount + $data->charge,2)}}</strong> {{$general->cur_text}}
                            </li>
                            @if($data->account_number)
                            <li class="list-group-item p-3">
                              @lang('Account Number'): <strong> {{$data->account_number}}</strong>
                            </li>
                            @endif
                            @if($data->routing)
                            <li class="list-group-item p-3">
                              @lang('routing'): <strong> {{$data->routing}}</strong>
                            </li>
                            @endif

                            @if($data->bank_name)
                            <li class="list-group-item p-3">
                              @lang('Bank name'): <strong> {{$data->bank_name}}</strong>
                            </li>
                            @endif
                            @if($data->bank_address)
                            <li class="list-group-item p-3">
                              @lang('Bank Address'): <strong> {{$data->bank_address}}</strong>
                            </li>
                            @endif
                            @if($data->customer_full_name)
                            <li class="list-group-item p-3">
                              @lang('Customer Full Name'): <strong> {{$data->customer_full_name}}</strong>
                            </li>
                            @endif
                            @if($data->customer_address)
                            <li class="list-group-item p-3">
                              @lang('Customer Address'): <strong> {{$data->customer_address}}</strong>
                            </li>
                            @endif

                            <li class="list-group-item p-3">
                              @lang('Conversion Rate'): <strong>1 {{$general->cur_text}} = {{$data->rate +0}}  {{$data->baseCurrency()}}</strong>
                            </li>

                            <li class="list-group-item p-3">
                              @lang('In') {{$data->baseCurrency()}}:
                              <strong>{{formatter_money($data->final_amo)}}</strong>
                            </li>

                            @if($data->gateway->crypto==1)
                            <li class="list-group-item p-3">
                              @lang('Conversion with')
                              <b> {{ $data->method_currency }}</b> @lang('and final value will Show on next step')
                            </li>
                            @endif
                          </ul>

                        <div class="text-center pt-3">
                        @if($data->method_code<1000)
                        <a href="{{route('user.deposit.confirm')}}" class="btn btn-primary btn-block font-weight-bold col-12">@lang('Pay Now')</a>
                        @else
                        <a href="{{route('user.deposit.manual.confirm')}}" class="btn btn-primary btn-block font-weight-bold col-12">@lang('Pay Now')</a>
                        @endif
                        </div>

                      </div>
                    </div>
                  </div>
              </div>
              <!--/ What is-->

            </div>
          </section>
    </div>
    </div>
    <!-- Container-fluid Ends-->
</div>
<!-- footer start-->

@endsection
