@extends('templates.minimal.layouts.user')

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
                  <div class="table-responsive table-responsive--md">
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">@lang('Transaction ID')</th>
                          <th scope="col">@lang('Gateway')</th>
                          <th scope="col">@lang('Amount')</th>
                          <th scope="col">@lang('Account No')</th>
                          <th scope="col" style="min-width:110px;">@lang('Bank Name')</th>
                          <th scope="col" style="min-width:130px;">@lang('Bank Address')</th>
                          <th scope="col" style="min-width:130px;">@lang('Check Number')</th>
                          <th scope="col" style="min-width:150px;">@lang('Customer Name')</th>
                          <th scope="col" style="min-width:160px;">@lang('Customer Address')</th>
                          <th scope="col"> @lang('Status')</th>
                          <th scope="col" style="min-width:120px;">@lang('Time')</th>
                          <th scope="col"> @lang('MORE')</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($logs) >0)
                        @foreach($logs as $k=>$data)
                        <tr>
                          <td data-label="#@lang('Transaction ID')">{{$data->trx}}</td>
                          <td data-label="@lang('Gateway')">{{ $data->gateway->name   }}</td>
                          <td data-label="@lang('Amount')">
                            <strong>{{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                          </td>
                          <td data-label="@lang('Account Number')">{{ $data->account_number   }}</td>
                          <td data-label="@lang('Bank Name')">{{ $data->bank_name   }}</td>
                          <td data-label="@lang('Bank Address')">{{ $data->bank_address   }}</td>
                          <td data-label="@lang('Bank Address')">{{ $data->check_no   }}</td>
                          <td data-label="@lang('Customer Full Name')">{{ $data->customer_full_name   }}</td>
                          <td data-label="@lang('Customer Address')">{{ $data->customer_address   }}</td>
                          
                          <td data-label="@lang('Status')">
                            @if($data->status == 1)
                            <span class="badge badge-success">@lang('Complete')</span>
                            @elseif($data->status == 2)
                            <span class="badge badge-warning">@lang('Pending')</span>
                            @elseif($data->status == 3)
                            <span class="badge badge-danger">@lang('Cancel')</span>

                            @endif

                          </td>
                          <td  data-label="@lang('Time')">
                            <i class="fa fa-clock pl-1"></i> {{date('h:i A', strtotime($data->created_at))}}
                          </td>


                          @php
                          $details = ($data->detail != null) ? $data->detail : '';
                          $proveImg = ($data->verify_image ) ? "<img src='".get_image(config('constants.deposit.verify.path').'/'.$data->verify_image)."' class='w-100' alt='...'>" : 'no';
                          @endphp


                          <td data-label="@lang('Details')">
                            <a href="javascript:void(0)" class="btn btn-primary btn-sm approveBtn"

                            data-prove_img="@php echo $proveImg @endphp"
                            data-detail="{{$details}}"
                            data-id="{{ $data->id }}"
                            data-amount="{{ formatter_money($data->amount)}} {{ $general->cur_text }}"
                            data-charge="{{ $data->charge + 0}} {{ $general->cur_text }}"
                            data-after_charge="{{ $data->amount + $data->charge + 0}} {{ $general->cur_text }}"
                            data-rate="{{ $data->rate}} {{ $general->cur_text }}"
                            data-payable="{{ $data->final_amo}} {{ $data->method_currency }}">
                            <i class="ft-monitor"></i>
                          </a>
                        </td>


                      </tr>
                      @endforeach
                      @else
                      <tr>
                        <td colspan="6"> @lang('No results found')!</td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
                  {{$logs->links()}}
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

{{-- APPROVE MODAL --}}
<div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <h5 class="modal-title">@lang('Details')</h5>

      </div>
      <div class="modal-body">


        <ul class="list-group">
          <li class="list-group-item text-dark">@lang('Amount') : <span class="deposit-amount font-weight-bold "></span></li>
          <li class="list-group-item text-dark">@lang('Charge') : <span class="deposit-charge font-weight-bold "></span></li>
          <li class="list-group-item text-dark">@lang('After Charge') : <span class="deposit-after_charge font-weight-bold"></span></li>
          <li class="list-group-item text-dark">@lang('Conversion Rate') : <span class="deposit-rate font-weight-bold "></span></li>
          <li class="list-group-item text-dark">@lang('Payable Amount') : <span class="deposit-payable font-weight-bold"></span></li>
        </ul>


        <p class="deposit-info"></p>

        <span class="deposit-proveImg"></span>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  $('.approveBtn').on('click', function() {
    var modal = $('#approveModal');
    modal.find('input[name=id]').val($(this).data('id'));
    modal.find('.deposit-amount').text($(this).data('amount'));
    modal.find('.deposit-charge').text($(this).data('charge'));
    modal.find('.deposit-after_charge').text($(this).data('after_charge'));
    modal.find('.deposit-rate').text($(this).data('rate'));
    modal.find('.deposit-payable').text($(this).data('payable'));
    if($(this).data('prove_img') != 'no'){
      modal.find('.deposit-proveImg').html($(this).data('prove_img'));
    }else{
      modal.find('.deposit-proveImg').html('');
    }
    var details =  Object.entries($(this).data('detail'));
    var list = [];
    details.map( function(item,i) {
      list[i] = ` <li class="list-group-item">${item[0]} : ${item[1]}</li>`
    });
    if (list == ''){
      modal.find('.deposit-info').html('');
      // modal.find('. ').html('');
    }else {
      // modal.find('.deposit-info').html('<h4 class="my-2">Payment Information</h4>');
      modal.find('.deposit-info').html(list);
    }
    modal.modal('show');
  });

</script>
@endsection