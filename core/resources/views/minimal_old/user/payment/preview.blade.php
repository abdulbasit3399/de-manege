@extends($activeTemplate.'layouts.user')

@section('content')

    @include($activeTemplate.'partials.breadcrumb')
    <!-- ========User-Panel-Section Starte Here ========-->
    <section class="user-panel-section padding-bottom padding-top">
        <div class="container user-panel-container">
            <div class=" user-panel-tab">
                <div class="row">
                    @include($activeTemplate.'partials.sidebar')

                    <div class="col-lg-9" id="myvideo">
                        <div class="user-panel-header mb-60-80">
                            <div class="left d-sm-block d-none">
                                <h6 class="title">{{__($page_title)}}</h6>
                            </div>
                            <ul class="right">
                                <li>
                                    <a href="#0" id="fullScreen"><i class="flaticon-ui-2"></i></a>
                                    <a href="#0" id="exitScreen"><i class="flaticon-ui-1"></i></a>
                                </li>

                                <li>
                                    <a href="#0" class="log-out d-lg-none">
                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>

                                            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-area fullscreen-width">
                            <div class="tab-item active">
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
                                                    <strong>{{formatter_money($data->amount)}} </strong> {{$general->cur_text}}
                                                </p>
                                                <p class="list-group-item">
                                                    @lang('Charge'):
                                                    <strong>{{formatter_money($data->charge)}}</strong> {{$general->cur_text}}
                                                </p>





                                                <p class="list-group-item">
                                                    @lang('Payable'): <strong> {{$data->amount + $data->charge}}</strong> {{$general->cur_text}}
                                                </p>
                                                
                                                <p class="list-group-item">
                                                    @lang('Account Number'): <strong> {{$data->account_number}}</strong> 
                                                </p>
                                                <p class="list-group-item">
                                                    @lang('routing'): <strong> {{$data->routing}}</strong> 
                                                </p>
                                                <p class="list-group-item">
                                                    @lang('Bank name'): <strong> {{$data->bank_name}}</strong>
                                                </p>                                                
                                                <p class="list-group-item">
                                                    @lang('Bank Address'): <strong> {{$data->bank_address}}</strong> 
                                                </p>
                                                <p class="list-group-item">
                                                    @lang('Customer Full Name'): <strong> {{$data->customer_full_name}}</strong> 
                                                </p>
                                                <p class="list-group-item">
                                                    @lang('Customer Address'): <strong> {{$data->customer_address}}</strong>
                                                </p>
                                                
                                                
                                                
                                                
                                
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

                                            </ul>


                                        @if($data->method_code<1000)
                                            <a href="{{route('user.deposit.confirm')}}" class="btn btn-custom2 btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                                        @else
                                            <a href="{{route('user.deposit.manual.confirm')}}" class="btn btn-custom2 btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->


@endsection

