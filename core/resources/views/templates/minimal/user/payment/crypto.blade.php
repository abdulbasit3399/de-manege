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
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-header card-header-bg">@lang('Payment Preview')</div>
                        <div class="card-body text-center">
                          <h4> @lang('PLEASE SEND EXACTLY') <span style="color: green"> {{ $data->amount }}</span> {{$data->currency}}</h4>
                          <h6>@lang('TO') <span style="color: green"> {{ $data->sendto }}</span></h6>
                          <img src="{{$data->img}}" alt="">
                          <h4 class="text-dark bold">@lang('SCAN TO SEND')</h4>
                        </div>
                      </div>

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