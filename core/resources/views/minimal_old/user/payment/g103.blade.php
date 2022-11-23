@extends('templates.new_minimal.layouts.user')

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
                      <br><br>

                      <form role="form" id="payment-form" method="{{$data->method}}" action="{{$data->url}}">
                        {{csrf_field()}}
                        <input type="hidden" value="{{$data->track}}" name="track">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="name">@lang('CARD NAME')</label>
                            <div class="input-group">
                              <input type="text" class="form-control form-control-lg custom-input" name="name"
                              placeholder="@lang('Card Name')" autocomplete="off" autofocus/>
                              <div class="input-group-prepend">
                                <span class="input-group-text addon-bg"><i class="ft-user"></i></span>
                              </div>
                            </div>

                          </div>
                          <div class="col-md-6">
                            <label for="cardNumber">@lang('CARD NUMBER')</label>
                            <div class="input-group">
                              <input type="tel" class="form-control form-control-lg custom-input"
                              name="cardNumber" placeholder="Valid Card Number" autocomplete="off"
                              required autofocus/>
                              <div class="input-group-prepend">
                                <span class="input-group-text addon-bg"><i class="ft-credit-card"></i></span>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row mt-4">
                          <div class="col-md-6">
                            <label for="cardExpiry">@lang('EXPIRATION DATE')</label>
                            <input type="tel" class="form-control form-control-lg input-sz custom-input"
                            name="cardExpiry" placeholder="MM / YYYY" autocomplete="off" required/>
                          </div>
                          <div class="col-md-6 ">

                            <label for="cardCVC">@lang('CVC CODE')</label>
                            <input type="tel" class="form-control form-control-lg input-sz custom-input"
                            name="cardCVC" placeholder="CVC" autocomplete="off" required/>
                          </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-lg btn-block text-center" type="submit"> @lang('PAY NOW')
                        </button>

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

@section('script')
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