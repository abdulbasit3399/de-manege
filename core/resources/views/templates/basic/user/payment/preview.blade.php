@extends($activeTemplate .'layouts.user')

@section('content')
    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="title"><span>{{__($page_title)}}</span></h2>
                </div>
            </div>
        </div>
    </div>


    <div class="privacy-area mb-4">
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col-md-8">

                <div class="card card-deposit text-center">


                    <div class="card-body card-body-deposit">

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
                            <a href="{{route('user.deposit.confirm')}}" class="btn amr-btn btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                        @else
                            <a href="{{route('user.deposit.manual.confirm')}}" class="btn amr-btn btn-block py-3 font-weight-bold">@lang('Pay Now')</a>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>



    <div class="sec-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec"></div>
                </div>
            </div>
        </div>
    </div>


@endsection

