@extends('templates.minimal.layouts.user')

@push('style')
<script src="https://js.stripe.com/v3/"></script>
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }

    .card button {
        padding-left: 0px !important;
    }
</style>
@endpush

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
              
            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="card-wrapper"></div>
                    <div class="row align-items-center">
                      <div class="col-md-4 mb-4 mb-md-0">

                        <img src="{{$deposit->gateway_currency()->methodImage()}}" class="card-img-top" alt=".." style="width: 100%">
                      </div>
                      <div class="col-md-8">
                        <form action="{{$data->url}}" method="{{$data->method}}">
                          <h5>@lang('Please Pay') {{formatter_money($deposit->final_amo)}} {{$deposit->method_currency}}</h5>
                          <h5 class="my-3">@lang('To Get') {{formatter_money($deposit->amount)}}  {{$general->cur_text}}</h5>


                          <script
                          src="{{$data->src}}"
                          class="stripe-button"
                          @foreach($data->val as $key=> $value)
                          data-{{$key}}="{{$value}}"
                          @endforeach
                          >
                        </script>
                      </form>

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

@section('script')
<script>
  $(document).ready(function () {
    $('button[type="submit"]').addClass("mt-4");
  })
</script>
@endsection