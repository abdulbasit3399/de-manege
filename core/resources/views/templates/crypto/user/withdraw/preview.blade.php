@extends('templates.crypto.layouts.user')

@section('content')
<div class="page-body">
    <div class="container-fluid">
        <div class="page-title">
          <div class="row">
            <div class="col-6">
              <h3>{{__($page_title)}}</h3>
            </div>
            {{--  <div class="col-6">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html" data-bs-original-title="" title="">                                       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg></a></li>
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
                  {{--  <div class="card-header">
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                      <h5 class="text-center text-white my-1">
                        @lang('Current Balance') : <strong>{{ formatter_money(@$withdraw->wallet->balance)}}  {{ $general->cur_text }}</strong>
                      </h5>
                    </div>
                  </div>  --}}
                  <div class="card-content collapse show">
                    <div class="card-body">
                      <div class="card-text">
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
                                <input type="text" value="{{formatter_money($withdraw->wallet->balance - ($withdraw->amount))}}"  class="form-control " placeholder="@lang('Enter Amount')" required readonly>
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
                                <input type="text" name="{{$k}}" value="{{old($k)}}"  class="form-control  " placeholder="" >
                              </div>
                              @endforeach

                              <div class="form-group mt-4 text-center">
                                <button type="submit" class="btn btn-primary btn-block btn-lg col-12">@lang('Confirm')</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ What is-->
                <!-- Simple Card-->
              </div>
        </div>
    </div>
</div>

@endsection
