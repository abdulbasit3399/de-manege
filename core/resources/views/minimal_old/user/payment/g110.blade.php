@extends($activeTemplate .'layouts.user')

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
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row align-items-center">
                                                    <div class="col-md-4 mb-4 mb-md-0">

                                                        <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt=".." style="width: 100%">
                                                    </div>
                                                    <div class="col-md-8 text-center">
                                                        <form action="{{$data->url}}" method="{{$data->method}}">

                                                        <h5>@lang('Please Pay') {{formatter_money($deposit->final_amo)}} {{$deposit->method_currency}}</h5>
                                                        <h5 class="my-3">@lang('To Get') {{formatter_money($deposit->amount)}}  {{$general->cur_text}}</h5>


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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->


@endsection



@push('script')
    <script>
        $(document).ready(function () {
            $('input[type="submit"]').addClass("mt-4 btn-custom2 text-center btn-lg");
        })
    </script>
@endpush
