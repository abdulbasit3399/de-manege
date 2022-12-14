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



    <div class="privacy-area pb-130">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                        <table class="history_table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">@lang('Transaction ID')</th>
                                <th scope="col">@lang('Gateway')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Charge')</th>
                                <th scope="col">@lang('After Charge')</th>
                                <th scope="col">@lang('Rate')</th>
                                <th scope="col">@lang('Receivable')</th>
                                <th scope="col">@lang('Status')</th>
                                <th scope="col">@lang('Time')</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($withdraws as $k=>$data)
                                <tr>
                                    <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                                    <td data-label="@lang('Gateway')">{{ $data->method->name   }}</td>
                                    <td data-label="@lang('Amount')">
                                        <strong>{{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                                    </td>
                                    <td data-label="@lang('Charge')" class="text-danger">
                                        {{formatter_money($data->charge)}} {{$general->cur_text}}
                                    </td>
                                    <td data-label="@lang('After Charge')">
                                        {{formatter_money($data->after_charge)}} {{$general->cur_text}}
                                    </td>
                                    <td data-label="@lang('Rate')">
                                        {{$data->rate +0}}
                                    </td>
                                    <td data-label="@lang('Receivable')" class="text-success">
                                        <strong>{{formatter_money($data->final_amount)}} {{$data->currency}}</strong>
                                    </td>
                                    <td data-label="@lang('Status')">
                                        <div>
                                            @if($data->status == 2)
                                                <span class="badge badge-warning">@lang('Pending')</span>
                                            @elseif($data->status == 1)
                                                <span class="badge badge-success">@lang('Completed')</span>
                                                <button class="btn-info btn-rounded py-2 px-3 badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="fa fa-info"></i></button>
                                            @elseif($data->status == 3)
                                                <span class="badge badge-danger">@lang('Rejected')</span>
                                                <button class="btn-info btn-rounded py-2 px-3 badge approveBtn" data-admin_feedback="{{$data->admin_feedback}}"><i class="fa fa-info"></i></button>
                                            @endif
                                        </div>

                                    </td>
                                    <td data-label="@lang('Time')">
                                        <div>
                                            <i class="fa fa-calendar"></i> {{date('d M, Y ', strtotime($data->created_at))}}
                                            <span class="pl-1"></span> {{date('h:i A', strtotime($data->created_at))}}
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-muted text-center" colspan="100%">{{ __($empty_message) }}</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    <div class="mt-3">
                        
                    {{$withdraws->links()}}
                    </div>
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

                    <div class="withdraw-detail"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('.approveBtn').on('click', function() {
            var modal = $('#approveModal');

            var feedback = $(this).data('admin_feedback');

            modal.find('.withdraw-detail').html(`<p> ${feedback} </p>`);
            modal.modal('show');
        });

    </script>
@endpush
