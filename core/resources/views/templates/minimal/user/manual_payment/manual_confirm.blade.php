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
                          <input type="file" class="form-control form-control-lg" name="verify_image">
                        </div>
                      </div>--}}

                      @foreach(json_decode($method->gateway_parameter) as $input)
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="a-trans" class="font-weight-bold">{{__($input)}}</label>
                          <input type="text" class="form-control form-control-lg" name="ud[{{str_slug($input) }}]" placeholder="{{ $input }}">
                        </div>
                      </div>
                      @endforeach

                      <div class="col-md-12">
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary btn-block mt-2 text-center">@lang('Pay Now')</button>
                        </div>
                      </div>

                    </div>

                  </form>
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