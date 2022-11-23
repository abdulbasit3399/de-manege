@extends('templates.crypto.layouts.user')
@section('style')

@endsection
@section('content')
<div class="page-body">
    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h3>{{__($page_title)}}</h3>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="container">
          <div class="row mt-5">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
            @endforeach
            @endif

            @php
            $count = 1;
            foreach($gatewayCurrency as $data):
            @endphp
            <div class="col-sm-6 col-md-4 col-xl-3 text-center">
                <div class="card">
                  <div class="card-body">
                    <div class="media align-items-center">
                        <a href="#" class="avatar avatar-sm rounded-circle mr-3">
                            <img src="{{$data->methodImage()}}" alt="image" width="120px" height="120px">
                        </a>
                    </div>
                    <h6 class="mb-0 f-w-700">{{formatter_money($data->fixed_charge, $data->method->crypto()).' '.$general->cur_text.' + '.formatter_money($data->percent_charge, $data->method->crypto()).' %'}}</h6>

                    <p>{{formatter_money($data->min_amount, $data->method->crypto()).' - '.formatter_money($data->max_amount, $data->method->crypto()).' '.$general->cur_text }}</p>
                        @if($data->method_code == 1002)
                        {{--  <button type="button" data-id="{{$data->id}}" data-resource="{{$data}}"
                            data-min_amount="{{formatter_money($data->min_amount, $data->method->crypto())}}"
                            data-max_amount="{{formatter_money($data->max_amount, $data->method->crypto())}}"
                            data-fix_charge="{{formatter_money($data->fixed_charge, $data->method->crypto())}}"
                            data-percent_charge="{{formatter_money($data->percent_charge, $data->method->crypto())}}"
                            data-base_symbol="{{$data->baseSymbol()}}"

                        class="btn btn-primary text-center deposit"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal1">
                        @lang('Deposit Now')</button>  --}}

                        <button type="button"  data-id="{{$data->id}}" data-resource="{{$data}}"
                        data-min_amount="{{formatter_money($data->min_amount, $data->method->crypto())}}"
                        data-max_amount="{{formatter_money($data->max_amount, $data->method->crypto())}}"
                        data-base_symbol="{{$data->baseSymbol()}}"
                        data-fix_charge="{{formatter_money($data->fixed_charge, $data->method->crypto())}}"
                        data-percent_charge="{{formatter_money($data->percent_charge, $data->method->crypto())}}"
                        class=" btn btn-primary btn-custom2 deposit" data-bs-toggle="modal" data-bs-target="#mail_check">
                        @lang('Deposit Now')</button>
                        @elseif($data->method_code == 1003)
                        <button type="button"  data-id="{{$data->id}}" data-resource="{{$data}}"
                        data-min_amount="{{formatter_money($data->min_amount, $data->method->crypto())}}"
                        data-max_amount="{{formatter_money($data->max_amount, $data->method->crypto())}}"
                        data-base_symbol="{{$data->baseSymbol()}}"
                        data-fix_charge="{{formatter_money($data->fixed_charge, $data->method->crypto())}}"
                        data-percent_charge="{{formatter_money($data->percent_charge, $data->method->crypto())}}"
                        class=" btn btn-primary btn-custom2 deposit" data-bs-toggle="modal" data-bs-target="#wireTransfer">
                        @lang('Deposit Now')</button>
                        @else
                        <button type="button"  data-id="{{$data->id}}" data-resource="{{$data}}"
                        data-min_amount="{{formatter_money($data->min_amount, $data->method->crypto())}}"
                        data-max_amount="{{formatter_money($data->max_amount, $data->method->crypto())}}"
                        data-base_symbol="{{$data->baseSymbol()}}"
                        data-fix_charge="{{formatter_money($data->fixed_charge, $data->method->crypto())}}"
                        data-percent_charge="{{formatter_money($data->percent_charge, $data->method->crypto())}}"
                        class=" btn btn-primary btn-custom2 deposit" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        @lang('Deposit Now')</button>
                        @endif
                  </div>
                </div>
            </div>
            @php
            $count++;
            endforeach;
            @endphp
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
{{--  end page  --}}
{{--  <!-- Vertically centered modal-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
        </div>
        <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
        <button class="btn btn-primary" type="button">Save changes</button>
        </div>
    </div>
    </div>
</div>  --}}


<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title method-name text-dark" id="exampleModalLabel">asdasdas</strong>
        <a href="javascript:void(0)" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
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
              <input id="amount" type="text" class="form-control " onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""  value="{{old('amount')}}">
              <div class="input-group-prepend">
                <span class="input-group-text currency-addon addon-bg">{{$general->cur_text}}</span>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="mail_check" tabindex="-1" role="dialog" aria-labelledby="mail_checkLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title method-name text-dark" id="mail_checkLabel"></strong>
        <a href="javascript:void(0)" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
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
              <input id="amount" type="text" class="form-control " onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""  value="{{old('amount')}}">
              <div class="input-group-prepend">
                <span class="input-group-text currency-addon addon-bg">{{$general->cur_text}}</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Check Number'):</label>
            <div class="input-group">
              <input id="check_no" name="check_no"  type="text" class="form-control" placeholder="Check Number" required=""  value="">
            </div>
          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="wireTransfer" tabindex="-1" role="dialog" aria-labelledby="wireTransferLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title method-name text-dark" id="wireTransferLabel"></strong>
        <a href="javascript:void(0)" class="close" data-bs-dismiss="modal" aria-label="Close">
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
              <input id="amount" type="text" class="form-control " onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""  value="{{old('amount')}}">
              <div class="input-group-prepend">
                <span class="input-group-text currency-addon addon-bg">{{$general->cur_text}}</span>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Bank name'):</label>
            <div class="input-group">
              <input id="bank_name" type="text" class="form-control" name="bank_name" placeholder="Bank Name" required=""  value="">
            </div>
          </div>
          <div class="form-group">
            <label>@lang('Enter Account Number'):</label>
            <div class="input-group">
              <input id="account_number" name="account_number"  type="number" class="form-control" placeholder="Account Number" required=""  value="">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title method-name text-dark" id="exampleModalLabel">asdasdas</strong>
        <a href="javascript:void(0)" class="close" data-bs-dismiss="modal" aria-label="Close">
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
              <input id="amount" type="text" class="form-control " onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required=""  value="{{old('amount')}}">
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
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
          <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')

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
