@php
    $latestTrx = getContent('transaction.content',true);
@endphp
@if($latestTrx)
    @php
        $latestDeposit = \App\Deposit::with('user', 'gateway')->where('status', 1)->latest()->limit(5)->get();
        $latestWithdraw = \App\Withdrawal::with('user', 'method')->where('status', 1)->latest()->limit(5)->get();
    @endphp


    <div class="transaction">
        <div class="container">


            <div class="row justify-content-center ">
                <div class="col-10 text-center">
                    <div class="section-header mb-5">
                        <h2 class="title">{{__(@$latestTrx->data_values->heading)}} </h2>
                        <p class="section-para">{{__(@$latestTrx->data_values->sub_heading)}}</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="transaction-area">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="huis-tab" data-toggle="tab" href="#deposit" role="tab"
                                   aria-selected="true">@lang('Latest Deposit')</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#withdraw" role="tab"
                                   aria-selected="false">@lang('Latest Withdraw')</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="deposit" role="tabpanel" aria-labelledby="huis-tab">

                                <table class="history_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Date')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Currency')</th>
                                        <th scope="col">@lang('Deposit')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latestDeposit as $data)
                                        <tr>
                                            <td data-label="@lang('Name')">
                                                <div class="user-img d-flex">
                                                    <img src="{{get_image(config('constants.user.profile.path').'/'.$data->user->image)}}" alt="">
                                                <span class="text-white">{{$data->user->fullname}}  </span>
                                                </div>
                                            </td>
                                            <td data-label="@lang('Date')">{{date('M d, Y',strtotime($data->created_at))}}</td>
                                            <td data-label="@lang('Amount')">{{__($general->cur_sym)}} {{formatter_money($data->amount)}}</td>
                                            <td data-label="@lang('Currency')">{{__($data->gateway->name)}}</td>
                                            <td data-label="@lang('Deposit')">{{diffForHumans($data->created_at)}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                            </div>
                            <div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="profile-tab">

                                <table class="history_table">
                                    <thead>
                                    <tr>
                                        <th scope="col">@lang('Name')</th>
                                        <th scope="col">@lang('Date')</th>
                                        <th scope="col">@lang('Amount')</th>
                                        <th scope="col">@lang('Currency')</th>
                                        <th scope="col">@lang('Withdraw')</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($latestWithdraw as $data)
                                        <tr>
                                            <td data-label="@lang('Name')">
                                                <div class="user-img d-flex">
                                                    <img src="{{get_image(config('constants.user.profile.path').'/'.$data->user->image)}}" alt="">
                                                    <span class="text-white">{{$data->user->fullname}}  </span>
                                                </div>
                                            </td>
                                            <td data-label="@lang('Date')">{{date('M d, Y',strtotime($data->created_at))}}</td>
                                            <td data-label="@lang('Amount')">{{__($general->cur_sym)}} {{formatter_money($data->amount)}}</td>
                                            <td data-label="@lang('Currency')">{{__($data->method->name)}}</td>
                                            <td data-label="@lang('Withdraw')">{{diffForHumans($data->created_at)}}</td>
                                        </tr>
                                    @endforeach


                                    </tbody>
                                </table>

                            </div>
                        </div>
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


@endif
