@extends('templates.minimal.layouts.user')

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
      <section class="row">
        <div class="col-sm-12">

          <!-- What is-->
          <div id="what-is" class="card">
            <div class="card-header">
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                
              </div>
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row mb-60-80 justify-content-center">
                    <div class="col-md-8">
                      <ul class="list-group text-center">

                        <li class="list-group-item">
                          <img
                          src="{{ $data->gateway_currency()->methodImage() }}"
                          style="max-width:100px; max-height:100px; margin:0 auto;"/>
                        </li>


                        <p class="list-group-item">
                          @lang('Amount'):
                          <strong>{{formatter_money(number_format($data->amount,2))}} </strong> {{$general->cur_text}}
                        </p>
                        <p class="list-group-item">
                          @lang('Charge'):
                          <strong>{{number_format($data->charge,2)}}</strong> {{$general->cur_text}}
                        </p>





                        <p class="list-group-item">
                          @lang('Payable'): <strong> {{number_format($data->amount + $data->charge,2)}}</strong> {{$general->cur_text}}
                        </p>
                        @if($data->account_number)
                        <p class="list-group-item">
                          @lang('Account Number'): <strong> {{$data->account_number}}</strong> 
                        </p>
                        @endif
                        @if($data->routing)
                        <p class="list-group-item">
                          @lang('routing'): <strong> {{$data->routing}}</strong> 
                        </p>
                        @endif

                        @if($data->bank_name)
                        <p class="list-group-item">
                          @lang('Bank name'): <strong> {{$data->bank_name}}</strong>
                        </p>   
                        @endif
                        @if($data->bank_address)                                             
                        <p class="list-group-item">
                          @lang('Bank Address'): <strong> {{$data->bank_address}}</strong> 
                        </p>
                        @endif
                        @if($data->customer_full_name)
                        <p class="list-group-item">
                          @lang('Customer Full Name'): <strong> {{$data->customer_full_name}}</strong> 
                        </p>
                        @endif
                        @if($data->customer_address)
                        <p class="list-group-item">
                          @lang('Customer Address'): <strong> {{$data->customer_address}}</strong>
                        </p>
                        @endif
                        
                        
                        
                        
                        <p class="list-group-item">
                          @lang('Conversion Rate'): <strong>1 {{$general->cur_text}} = {{$data->rate +0}}  {{$data->baseCurrency()}}</strong>
                        </p>


                        <p class="list-group-item">
                          @lang('In') {{$data->baseCurrency()}}:
                          <strong>{{formatter_money($data->final_amo)}}</strong>
                        </p>


                        @if($data->gateway->crypto==1)
                        <p class="list-group-item">
                          @lang('Conversion with')
                          <b> {{ $data->method_currency }}</b> @lang('and final value will Show on next step')
                        </p>
                        @endif
                      </ul>



                    @if($data->method_code<1000)
                    <a href="{{route('user.deposit.confirm')}}" class="btn btn-primary btn-block font-weight-bold">@lang('Pay Now')</a>
                    @else
                    <a href="{{route('user.deposit.manual.confirm')}}" class="btn btn-primary btn-block font-weight-bold">@lang('Pay Now')</a>
                    @endif


                  </div>
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
  </div>
</div>
@endsection