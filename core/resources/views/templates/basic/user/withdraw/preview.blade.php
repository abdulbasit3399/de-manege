@extends($activeTemplate .'layouts.user')
@push('style')
    <style>
        .withdraw-details {
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }
    </style>
@endpush

@section('content')

    <div class="inner-banner-area">
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="title"><span>@lang('Withdraw Preview')</span></h2>
                </div>

                <div class="col-lg-6">
                    <a href="{{route('user.withdraw.money')}}" class="float-right btn btn-success "><i class="fa fa-arrow-left"></i> @lang('Another Method')</a>
                </div>

            </div>
        </div>
    </div>




    <div class="privacy-area">
        <div class="container ">
            <div class="row mb-60-80">
                <div class="col-lg-12 mb-4">
                    <div class="card card-deposit">

                        <div class="card-header card-header-bg">
                            <h5 class="text-center my-1">@lang('Current Balance') : <strong>{{ formatter_money(@$withdraw->wallet->balance)}}  {{ $general->cur_text }}</strong></h5>
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
                                    <form action="{{route('user.withdraw.submit')}}" method="post" enctype="multipart/form-data">
                                        @csrf


                                        @foreach(json_decode($withdraw->detail) as $k=> $value)
                                            <div class="form-group">
                                                <label class="font-weight-bold"> {{str_replace('_',' ',$k)}} </label>
                                                <input type="text" name="{{$k}}" value="{{old($k)}}"  class="form-control form-control-lg" placeholder="" >
                                            </div>
                                        @endforeach

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-block btn-lg mt-4 text-center">@lang('Confirm')</button>
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

@endsection

