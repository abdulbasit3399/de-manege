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
            <div class="row mb-60-80 justify-content-center">
                <div class="col-md-12">

                    <div class="card">


                        <div class="card-body">
                            <form action="{{ route('user.deposit.manual.update') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    @php
                                        $extra = $data->gateway->extra;
                                    @endphp

                                    <div class="col-md-12">
                                        <p class="text-center mt-2">@lang('You have requested ') <b
                                                class="text-success">{{ formatter_money($data['amount'])  }} {{$data['method_currency']}}</b> @lang(', Please pay ')
                                            <b class="text-success">{{$data['final_amo'] .' '.$data['method_currency'] }}</b> @lang(' for successful payment')
                                        </p>
                                        <h4 class="text-center mb-4">@lang('Please follow the instruction bellow')</h4>

                                        <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>
                                        <p class="text-center mt-3 font-weight-bold">@lang('Delay:') @php echo  $extra->delay @endphp</p>

                                    </div>


                                    <div class="col-md-12">
                                        <div class="form-group mt-4">
                                            <label for="a-trans"
                                                   class="font-weight-bold"> {{__($extra->verify_image)}}</label>
                                            <input type="file" class="form-control form-control-lg" name="verify_image">
                                        </div>
                                    </div>

                                    @foreach(json_decode($method->gateway_parameter) as $input)
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="a-trans" class="font-weight-bold">{{__($input)}}</label>
                                                <input type="text" class="form-control form-control-lg"
                                                       name="ud[{{str_slug($input) }}]" placeholder="{{ $input }}">
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit"
                                                    class="btn btn-success   btn-block mt-2 text-center">@lang('Pay Now')</button>
                                        </div>
                                    </div>

                                </div>

                            </form>

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

