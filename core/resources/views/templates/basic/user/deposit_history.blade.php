@extends($activeTemplate .'layouts.user')

@section('content')

    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="title"><span>{{__($page_title)}}</span></h2>
                </div>
            </div>
        </div>
    </div>



    <div class="container">

        <div class="row">
            <div class="col-md-12 mb-30">
                <div>
                    <table class="history_table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">@lang('Transaction ID')</th>
                            <th scope="col">@lang('Gateway')</th>
                            <th scope="col">@lang('Amount')</th>
                            <th scope="col">@lang('Status')</th>
                            <th scope="col">@lang('Time')</th>
                            <th scope="col"> @lang('MORE')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($logs) >0)
                            @foreach($logs as $k=>$data)
                                <tr>
                                    <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                                    <td data-label="@lang('Gateway')">{{ $data->gateway->name   }}</td>
                                    <td data-label="@lang('Amount')">
                                        <strong>{{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                                    </td>
                                    <td data-label="@lang('Status')">
                                        @if($data->status == 1)
                                            <span class="badge badge-success">@lang('Complete')</span>
                                        @elseif($data->status == 2)
                                            <span class="badge badge-warning">@lang('Pending')</span>
                                        @elseif($data->status == 3)
                                            <span class="badge badge-danger">@lang('Cancel')</span>

                                        @endif

                                    </td>
                                    <td data-label="@lang('Time')">
                                        <div>
                                            <i class="fa fa-calendar"></i> {{date(' d M, Y ', strtotime($data->created_at))}}
                                            <i class="fa fa-clock pl-1"></i> {{date('h:i A', strtotime($data->created_at))}}
                                        </div>
                                    </td>


                                    @php
                                        $details = ($data->detail != null) ? $data->detail : '';
                                        $proveImg = ($data->verify_image ) ? "<img src='".get_image(config('constants.deposit.verify.path').'/'.$data->verify_image)."' alt='...'>" : 'no';
                                    @endphp


                                    <td data-label="@lang('Details')">
                                        <a href="javascript:void(0)" class="btn btn-primary btn-sm approveBtn"

                                           data-prove_img="@php echo $proveImg @endphp"
                                           data-detail="{{$details}}"
                                           data-id="{{ $data->id }}"
                                           data-amount="{{ formatter_money($data->amount)}} {{ $general->cur_text }}"
                                           data-charge="{{ $data->charge + 0}} {{ $general->cur_text }}"
                                           data-after_charge="{{ $data->amount + $data->charge}} {{ $general->cur_text }}"
                                           data-rate="{{ $data->rate}} {{ $general->cur_text }}"
                                           data-payable="{{ $data->final_amo}} {{ $data->method_currency }}">
                                            <i class="fa fa-desktop"></i>
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
                <div class="mt-3">
                    {{$logs->links()}}
                </div>
            </div>
        </div>

    </div>


    <div class="sec-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sec"></div>
                </div>
            </div>
        </div>
    </div>


    {{-- APPROVE MODAL --}}
    <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('Details')</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="modal-body">


                        <ul class="list-group">
                            <li class="list-group-item dark-bg">@lang('Amount') : <span class="deposit-amount font-weight-bold text-white"></span></li>
                            <li class="list-group-item dark-bg">@lang('Charge') : <span class="deposit-charge font-weight-bold text-white"></span></li>
                            <li class="list-group-item dark-bg">@lang('After Charge') : <span class="deposit-after_charge font-weight-bold text-white"></span></li>
                            <li class="list-group-item dark-bg">@lang('Conversion Rate') : <span class="deposit-rate font-weight-bold text-white"></span></li>
                            <li class="list-group-item dark-bg">@lang('Payable Amount') : <span class="deposit-payable font-weight-bold text-white"></span></li>
                        </ul>


                        <p class="deposit-detail"></p>

                        <span class="deposit-proveImg"></span>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('Close')</button>
                    </div>
            </div>
        </div>
    </div>
@endsection





@push('script')
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
                modal.find('.deposit-detail').html('');
            }else {
                modal.find('.deposit-info').html('<h4 class="my-2">Payment Information</h4>');
                modal.find('.deposit-detail').html(list);
            }
            modal.modal('show');
        });




        </script>
@endpush

