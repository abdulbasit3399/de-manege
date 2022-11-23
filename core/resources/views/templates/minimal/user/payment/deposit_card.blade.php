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

            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                    @endif
                    @foreach($gatewayCurrency as $data)

                    <div class="col-lg-3 col-md-3 mb-4">
                      <div class="card card-deposit">
                        <h5 class="card-header card-header-bg text-center text-white bg-primary">{{__($data->name)}}</h5>
                        <div class="card-body card-body-deposit">
                          <img src="{{$data->methodImage()}}" class="card-img-top" alt="{{$data->name}}" style="width: 100%">
                        </div>
                        <div class="card-footer card-footer-bg">
                          <button type="button"  data-id="{{$data->id}}" data-resource="{{$data}}"
                            data-min_amount="{{formatter_money($data->min_amount, $data->method->crypto())}}"
                            data-max_amount="{{formatter_money($data->max_amount, $data->method->crypto())}}"
                            data-base_symbol="{{$data->baseSymbol()}}"
                            data-fix_charge="{{formatter_money($data->fixed_charge, $data->method->crypto())}}"
                            data-percent_charge="{{formatter_money($data->percent_charge, $data->method->crypto())}}"
                            class=" btn btn-primary btn-custom2  deposit" data-toggle="modal" data-target="#exampleModal">
                          @lang('Deposit Now')</button>
                        </div>
                      </div>
                    </div>
                    @endforeach
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title method-name text-dark" id="exampleModalLabel">asdasdas</strong>
        <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <form action="{{route('user.deposit.insert')}}" method="post">
        @csrf
        <div class="modal-body">
          <p class="text-danger depositLimit"></p>
          <p class="text-danger depositCharge"></p>
          <div class="form-group">
            <input type="hidden" name="currency" class="edit-currency" value="">
            <input type="hidden" name="method_code" class="edit-method-code" value="">
          </div>
          <div class="form-group">
            <label>@lang('Enter Amount'):</label>
            <div class="input-group">
              <input id="amount" type="text" class="form-control form-control-lg" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""  value="{{old('amount')}}">
              <div class="input-group-prepend">
                <span class="input-group-text currency-addon addon-bg">{{$general->cur_text}}</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Account Number'):</label>
            <div class="input-group">
              <input id="account_number" name="account_number"  type="number" class="form-control" placeholder="Account Number" required=""  value="">
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Routing'):</label>
            <div class="input-group">
              <input id="routing" type="text" class="form-control" name="routing" placeholder="Routing" required=""  value="">
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Bank name'):</label>
            <div class="input-group">
              <input id="bank_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name" required=""  value="">
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Bank address'):</label>
            <div class="input-group">
              <input id="bank_address" type="text" class="form-control" name="bank_address" placeholder="Bank Address" required=""  value="">
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Customer Full Name'):</label>
            <div class="input-group">
              <input id="customer_full_name" type="text" class="form-control" name="customer_full_name" placeholder="Customer Full Name" required=""  value="">
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Customer Address'):</label>
            <div class="input-group">
              <input id="customer_address" type="text" class="form-control" name="customer_address" placeholder="Customer Address" required=""  value="">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>

  $(document).ready(function(){

    $('.deposit').on('click', function () {
      var id = $(this).data('id');
      var result = $(this).data('resource');
      var minAmount = $(this).data('min_amount');
      var maxAmount = $(this).data('max_amount');
      var baseSymbol = "{{$general->cur_text}}";
      var fixCharge = $(this).data('fix_charge');
      var percentCharge = $(this).data('percent_charge');

      var depositLimit = `@lang('Deposit Limit:') ${minAmount} - ${maxAmount}  ${baseSymbol}`;
      $('.depositLimit').text(depositLimit);
      var depositCharge = `@lang('Charge:') ${fixCharge} ${baseSymbol} + ${percentCharge} %`
      $('.depositCharge').text(depositCharge);
      $('.method-name').text(`@lang('Payment By ') ${result.name}`);
      $('.currency-addon').text(baseSymbol);


      $('.edit-currency').val(result.currency);
      $('.edit-method-code').val(result.method_code);

    });
  });
</script>
@endsection
