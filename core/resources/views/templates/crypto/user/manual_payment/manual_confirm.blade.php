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
            <li class="breadcrumb-item"><a href="index.html">                                       <i data-feather="huis"></i></a></li>
            <li class="breadcrumb-item">Bootstrap Tables</li>
            <li class="breadcrumb-item active">Bootstrap Basic Tables</li>
            </ol>
        </div>  --}}
        </div>
    </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <!-- What is-->
                <div id="what-is" class="card">
                    <div class="card-body">
                        <form action="{{ route('user.deposit.manual.update') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="row">
                            @php
                            $extra = $data->gateway->extra;
                            @endphp

                            <div class="col-md-12">
                              <p class="text-center mt-2">@lang('You have requested ') <b class="text-success">{{ formatter_money($data['amount'])  }} {{$data['method_currency']}}</b> @lang(', Please pay ') <b class="text-success">{{$data['final_amo'] .' '.$data['method_currency'] }}</b> @lang(' for successful payment')</p>
                              <h4 class="text-center mb-4">@lang('Please follow the instruction bellow')</h4>

                              <p class="text-center my-4">@php echo  $data->gateway->description @endphp</p>
                              <p class="text-center mt-3 font-weight-bold">@lang('Delay:') @php echo  $extra->delay @endphp</p>

                            </div>

                            {{-- <div class="col-md-12">
                              <div class="form-group mt-4">
                                <label for="a-trans" class="font-weight-bold"> {{__($extra->verify_image)}}</label>
                                <input type="file" class="form-control  " name="verify_image">
                              </div>
                            </div>--}}

                            @foreach(json_decode($method->gateway_parameter) as $input)
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="a-trans" class="font-weight-bold mt-3">{{__($input)}}</label>
                                <input type="text" class="form-control  " name="ud[{{str_slug($input) }}]" placeholder="{{ $input }}">
                              </div>
                            </div>
                            @endforeach

                            <div class="col-md-12 text-center pt-3">
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block mt-2 col-12">@lang('Pay Now')</button>
                              </div>
                            </div>

                          </div>

                        </form>
                      </div>
                </div>
                <!--/ What is-->

                <!-- Kick start -->



                <!-- Simple Card-->
              </div>
        </div>
    </div>
</div>


@endsection
