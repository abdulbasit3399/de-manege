@extends($activeTemplate .'layouts.user')

@section('content')

    @include($activeTemplate.'partials.breadcrumb')
    <!-- ========User-Panel-Section Starte Here ========-->
    <section class="user-panel-section padding-bottom padding-top">
        <div class="container user-panel-container">
            <div class=" user-panel-tab">
                <div class="row">
                    @include($activeTemplate.'partials.sidebar')

                    <div class="col-lg-9" >
                        <div class="user-panel-header mb-60-80">
                            <div class="left d-sm-block d-none">
                                <h6 class="title">{{__($page_title)}}</h6>
                            </div>
                            <ul class="right">

                                <li>
                                    <a href="#0" class="log-out d-lg-none">

                                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                                data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                                aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>

                                            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-area fullscreen-width">
                            <div class="tab-item active">


                                <div class="row mb-60-80">

                                    <div class="col-lg-12 mb-4">
                                        <div class="card card-deposit">

                                            <div class="card-header card-header-bg">
                                                <h5 class="text-center text-white my-1">
                                                    @lang('Current Balance') : <strong>{{ formatter_money(@$withdraw->wallet->balance)}}  {{ $general->cur_text }}</strong>
                                                </h5>
                                            </div>

                                            <div class="card-body card-body-deposit">
                                                <div class="row">
                                                    <div class="col-md-4">

                                                        <div class="withdraw-details">
                                                            <span class="font-weight-bold">@lang('Request Amount') :</span>
                                                            <span class="font-weight-bold pull-right">{{$withdraw->amount +0 }} {{$general->cur_text }}</span>
                                                        </div>


                                                        <div class="withdraw-details text-danger">
                                                            <span class="font-weight-bold">@lang('Withdrawal Charge') :</span>
                                                            <span class="font-weight-bold pull-right">{{$withdraw->charge +0 }} {{$general->cur_text }}</span>
                                                        </div>


                                                        <div class="withdraw-details text-info">
                                                            <span class="font-weight-bold">@lang('After Charge') :</span>
                                                            <span class="font-weight-bold pull-right">{{$withdraw->after_charge +0 }} {{$general->cur_text }}</span>
                                                        </div>



                                                        <div class="withdraw-details">
                                                            <span class="font-weight-bold">@lang('Conversion Rate') : <br>1 {{$general->cur_text }} = </span>
                                                            <span class="font-weight-bold pull-right">  {{$withdraw->rate +0 }} {{$withdraw->currency }}</span>
                                                        </div>


                                                        <div class="withdraw-details text-success">
                                                            <span class="font-weight-bold">@lang('You Will Get') :</span>
                                                            <span class="font-weight-bold pull-right">{{$withdraw->final_amount +0 }} {{$withdraw->currency }}</span>
                                                        </div>


                                                        <div class="form-group mt-5">

                                                            <label class="font-weight-bold">@lang('Balance Will be') : </label>
                                                            <div class="input-group">
                                                                <input type="text" value="{{formatter_money($withdraw->wallet->balance - ($withdraw->amount))}}"  class="form-control form-control-lg" placeholder="@lang('Enter Amount')" required readonly>
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text ">{{ $general->cur_text }} </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-8">

                                                        <p class="text-center">@php echo @$withdraw->method->description @endphp</p>

                                                        <form action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
                                                            @csrf


                                                            @foreach(json_decode($withdraw->detail) as $k=> $value)
                                                                <div class="form-group">
                                                                    <label class="font-weight-bold"> {{str_replace('_',' ',$k)}} </label>
                                                                    <input type="text" name="{{$k}}" value="{{old($k)}}"  class="form-control form-control-lg" placeholder="" >
                                                                </div>
                                                            @endforeach

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-custom2 btn-block btn-lg mt-4 text-center">@lang('Confirm')</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->

@endsection


@section('load-js')
@stop
@section('script')

@stop
