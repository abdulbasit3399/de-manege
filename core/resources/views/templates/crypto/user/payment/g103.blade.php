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
                    <div class="card-wrapper"></div>
                        <br>
                        <form role="form" id="payment-form" method="{{$data->method}}" action="{{$data->url}}">
                            {{csrf_field()}}
                            <input type="hidden" value="{{$data->track}}" name="track">
                            <div class="row">
                            <div class="col-md-6">
                                <label for="name">@lang('CARD NAME')</label>
                                <div class="input-group">
                                <input type="text" class="form-control   custom-input" name="name"
                                placeholder="@lang('Card Name')" autocomplete="off" autofocus/>
                                <div class="input-group-prepend">
                                    <span class="input-group-text addon-bg"><i data-feather="user"></i></span>
                                </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <label for="cardNumber">@lang('CARD NUMBER')</label>
                                <div class="input-group">
                                <input type="tel" class="form-control   custom-input"
                                name="cardNumber" placeholder="Valid Card Number" autocomplete="off"
                                required autofocus/>
                                <div class="input-group-prepend">
                                    <span class="input-group-text addon-bg"><i data-feather="credit-card"></i></span>
                                </div>
                                </div>
                            </div>
                            </div>

                            <div class="row mt-4">
                            <div class="col-md-6">
                                <label for="cardExpiry">@lang('EXPIRATION DATE')</label>
                                <input type="tel" class="form-control   input-sz custom-input"
                                name="cardExpiry" placeholder="MM / YYYY" autocomplete="off" required/>
                            </div>
                            <div class="col-md-6 ">

                                <label for="cardCVC">@lang('CVC CODE')</label>
                                <input type="tel" class="form-control   input-sz custom-input"
                                name="cardCVC" placeholder="CVC" autocomplete="off" required/>
                            </div>
                            </div>
                            <div class="text-center pt-3">
                            <button class="btn btn-primary btn-lg btn-block col-12" type="submit"> @lang('PAY NOW')
                            </button>
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

@section('scripts')
<script type="text/javascript" src="https://rawgit.com/jessepollak/card/master/dist/card.js"></script>

<script>
  (function ($) {
    $(document).ready(function () {
      var card = new Card({
        form: '#payment-form',
        container: '.card-wrapper',
        formSelectors: {
          numberInput: 'input[name="cardNumber"]',
          expiryInput: 'input[name="cardExpiry"]',
          cvcInput: 'input[name="cardCVC"]',
          nameInput: 'input[name="name"]'
        }
      });
    });
  })(jQuery);
</script>
@endsection
