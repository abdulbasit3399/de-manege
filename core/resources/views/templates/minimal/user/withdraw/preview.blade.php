@extends('templates.minimal.layouts.user')

@section('content')
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
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements">
                <h5 class="text-center text-white my-1">
                  @lang('Current Balance') : <strong>{{ formatter_money(@$withdraw->wallet->balance)}}  {{ $general->cur_text }}</strong>
                </h5>
              </div>
            </div>
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
                          <button type="submit" class="btn btn-primary btn-block btn-lg mt-4 text-center">@lang('Confirm')</button>
                        </div>
                      </form>
                    </div>
                  </div>
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
@endsection