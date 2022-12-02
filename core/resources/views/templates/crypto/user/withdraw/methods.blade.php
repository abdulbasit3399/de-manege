@extends('templates.crypto.layouts.user')

@section('content')
<script>
  function createCountDown(elementId, sec) {
      var tms = sec;
      var x = setInterval(function() {
          var distance = tms*1000;
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          document.getElementById(elementId).innerHTML =days+"d: "+ hours + "h "+ minutes + "m " + seconds + "s ";
          if (distance < 0) {
              clearInterval(x);
              document.getElementById(elementId).innerHTML = "{{__('COMPLETE')}}";
          }
          tms--;
      }, 1000);
  }

</script>
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h3>{{__($page_title)}}</h3>
            </div>
            {{--  <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-huis"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
                <li class="breadcrumb-item">Bootstrap Tables</li>
                <li class="breadcrumb-item active">Bootstrap Styling Tables</li>
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
                  <div class="card-content collapse show">
                    <div class="card-body">
                      <div class="card-text">
                        <div class="row">
                          @foreach($withdrawMethod as $data)

                          <div class="col-lg-4 col-md-4 mb-4">
                            <div class="card  text-center">
                              <h5 class="card-header card-header-bg bg-primary text-white">{{__($data->name)}}</h5>
                              <div class="card-body card-body-deposit">
                                <img src="{{get_image(config('constants.withdraw.method.path').'/'. $data->image)}}"
                                class="card-img-top" alt="{{$data->name}}" style="width: 100%">

                                <ul class="list-group text-center text-dark">


                                  <li class="list-group-item">@lang('Limit')
                                    : {{formatter_money($data->min_limit)}}
                                    - {{formatter_money($data->max_limit)}} {{$general->cur_text}}</li>

                                    <li class="list-group-item"> @lang('Charge')
                                      - {{formatter_money($data->fixed_charge)}} {{$general->cur_text}}
                                      + {{formatter_money($data->percent_charge)}}%
                                    </li>
                                    <li class="list-group-item">@lang('Processing Time')
                                      - {{$data->delay}}</li>
                                    </ul>

                                  </div>
                                  <div class="card-footer card-footer-bg ">
                                    <a href="javascript:void(0)"  data-id="{{$data->id}}"
                                     data-resource="{{$data}}"
                                     data-min_amount="{{formatter_money($data->min_limit)}}"
                                     data-max_amount="{{formatter_money($data->max_limit)}}"
                                     data-fix_charge="{{formatter_money($data->fixed_charge)}}"
                                     data-percent_charge="{{formatter_money($data->percent_charge)}}"
                                     data-base_symbol="{{$general->cur_text}}"
                                     class="btn btn-primary btn-block btn-custom2 deposit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                   @lang('Withdraw Now')</a>
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
        </div>
    </div>
</div>


<!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <strong class="modal-title method-name" id="exampleModalLabel">Modal title</strong>
      <a href="javascript:void(0)" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </a>
    </div>
    <form action="{{route('user.withdraw.money')}}" method="post">
      @csrf
      <div class="modal-body">
        <p class="text-danger depositLimit"></p>
        <p class="text-danger depositCharge"></p>

        <div class="form-group">
          <input type="hidden" name="currency" class="edit-currency form-control" value="">
          <input type="hidden" name="method_code" class="edit-method-code  form-control" value="">
        </div>


        <div class="form-group">
          <label>@lang('Enter Amount'):</label>
          <div class="input-group">
            <input id="amount" type="text" class="form-control"
            onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount"
            placeholder="0.00" required="" value="{{old('amount')}}">

            <div class="input-group-prepend">
              <span
              class="input-group-text addon-bg currency-addon">{{__($general->cur_text)}}</span>
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
@endsection

@section('scripts')
<script>

  $(document).ready(function () {
    $('.deposit').on('click', function () {
      var id = $(this).data('id');
      var result = $(this).data('resource');
      var minAmount = $(this).data('min_amount');
      var maxAmount = $(this).data('max_amount');
      var baseSymbol = $(this).data('base_symbol');
      var fixCharge = $(this).data('fix_charge');
      var percentCharge = $(this).data('percent_charge');

      var selectedCurr = $("#currency_id").find(':selected').data('select_currency');
      $('.currency-addon').text(`${baseSymbol}`);

      var depositLimit = `@lang('Withdraw Limit:') ${minAmount} - ${maxAmount}  {{$general->cur_text}}`;
      $('.depositLimit').text(depositLimit);
      var depositCharge = `@lang('Charge:') ${fixCharge} ${baseSymbol} + ${percentCharge} %`
      $('.depositCharge').text(depositCharge);
      $('.method-name').text(`@lang('Payment By ') ${result.name}`);

      $('.edit-currency').val(result.currency);
      $('.edit-method-code').val(result.id);
    });
  });
</script>
@endsection
