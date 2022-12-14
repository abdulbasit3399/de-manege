@extends($activeTemplate .'layouts.user')

@section('content')

    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="title"><span>@lang('Payment Preview')</span></h2>
                </div>
            </div>
        </div>
    </div>




    <div class="privacy-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">


                        <div class="card-body">

                            <div class="row align-items-center">
                                <div class="col-md-4 mb-3 mb-md-0">

                                    <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt=".." style="width: 100%">
                                </div>
                                <div class="col-md-8">
                                    <form action="{{ route('ipn.g107') }}" method="POST" class="text-center">
                                        @csrf
                                        <h3>@lang('Please Pay') {{formatter_money($deposit->final_amo)}} {{$deposit->method_currency}}</h3>
                                        <h3 class="my-3">@lang('To Get') {{formatter_money($deposit->amount)}}  {{$general->cur_text}}</h3>


                                        <button type="button" class=" mt-4 btn amr-btn text-center" id="btn-confirm">@lang('Pay Now')</button>

                                        <script
                                            src="//js.paystack.co/v1/inline.js"
                                            data-key="{{ $data->key }}"
                                            data-email="{{ $data->email }}"
                                            data-amount="{{$data->amount}}"
                                            data-currency="{{$data->currency}}"
                                            data-ref="{{ $data->ref }}"
                                            data-custom-button="btn-confirm"
                                        >
                                        </script>
                                    </form>

                                </div>
                            </div>


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
