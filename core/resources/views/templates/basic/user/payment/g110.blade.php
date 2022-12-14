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




    <div class="privacy-area mb-4">
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

                                    <form action="{{$data->url}}" method="{{$data->method}}">


                                        <h3 class="text-center">@lang('Please Pay') {{formatter_money($deposit->final_amo)}} {{$deposit->method_currency}}</h3>
                                        <h3 class="my-3 text-center">@lang('To Get') {{formatter_money($deposit->amount)}} {{$general->cur_text}}</h3>


                                        <script src="{{$data->checkout_js}}"
                                                @foreach($data->val as $key=>$value)
                                                data-{{$key}}="{{$value}}"
                                            @endforeach >

                                        </script>

                                        <input type="hidden" custom="{{$data->custom}}" name="hidden">

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

@push('script')
    <script>
        $(document).ready(function () {
            $('input[type="submit"]').addClass("btn amr-btn py-2 w-100");
        })
    </script>
@endpush
