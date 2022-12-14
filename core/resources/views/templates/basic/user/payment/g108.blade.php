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
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-4">

                                    <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt=".."
                                         style="width: 100%">
                                </div>
                                <div class="col-md-8 text-center">
                                    <h3 class="mt-4">@lang('Please Pay') {{formatter_money($deposit->final_amo)}} {{$deposit->method_currency}}</h3>
                                    <h3 class="my-3">@lang('To Get') {{formatter_money($deposit->amount)}}  {{$general->cur_text}}</h3>

                                    <button type="button"
                                            class=" mt-4 btn amr-btn text-center"
                                            id="btn-confirm">@lang('Pay Now')</button>
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


@push('script')

    <script src="//voguepay.com/js/voguepay.js"></script>
    <script>
        closedFunction = function() {
        }
        successFunction = function(transaction_id) {
            window.location.href = '{{ route('user.deposit') }}';
        }
        failedFunction=function(transaction_id) {
            window.location.href = '{{ route('user.deposit') }}' ;
        }

        function pay(item, price) {
            //Initiate voguepay inline payment
            Voguepay.init({
                v_merchant_id: "{{ $data->v_merchant_id}}",
                total: price,
                notify_url: "{{ $data->notify_url }}",
                cur: "{{$data->cur}}",
                merchant_ref: "{{ $data->merchant_ref }}",
                memo:"{{$data->memo}}",
                recurrent: true,
                frequency: 10,
                developer_code: '5af93ca2913fd',
                store_id:"{{ $data->store_id }}",
                custom: "{{ $data->custom }}",

                closed:closedFunction,
                success:successFunction,
                failed:failedFunction
            });
        }

        $(document).ready(function () {
            $(document).on('click', '#btn-confirm', function (e) {
                e.preventDefault();
                pay('Buy', {{ $data->Buy }});
            });
        });
    </script>
@endpush
