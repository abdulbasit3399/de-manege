@extends($activeTemplate.'layouts.master')
@section('content')
    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h3 class="title"><span>{{__($page_title)}}</span></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="privacy-area pb-130">
        <div class="container">
            <div class="row mb-30-none">
                <div class="col-md-12 mb-30">
                        <table class="history_table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">@lang('Transaction ID')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('Remaining Balance')</th>
                                <th scope="col">@lang('Details')</th>
                                <th scope="col">@lang('Date')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($logs) >0)
                                @foreach($logs as $k=>$data)
                                    <tr>
                                        <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                                        <td data-label="@lang('Amount')">
                                            <div>
                                                <strong @if($data->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($data->trx_type == '+') ? '+':'-'}} {{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                                            </div>
                                        </td>
                                        <td data-label="@lang('Remaining Balance')">
                                            <div>
                                                <strong class="text-info">{{formatter_money($data->post_balance)}} {{$general->cur_text}}</strong>
                                            </div>
                                        </td>
                                        <td data-label="@lang('Details')">{{$data->details}}</td>
                                        <td data-label="@lang('Date')">{{date('d M, Y', strtotime($data->created_at))}}</td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"> @lang('No results found')!</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                        <div class="mt-3">
                            
                    {{$logs->links()}}
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
@stop
