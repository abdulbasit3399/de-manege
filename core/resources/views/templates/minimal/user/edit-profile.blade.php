@extends('templates.minimal.layouts.user')

@section('style')
<link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/admin/build/css/intlTelInput.css')}}">
<style>
  .intl-tel-input {
    position: relative;
    display: inline-block;
    width: 100%;!important;
  }
  .fileinput-new{
    display: inline-block;
    margin-bottom: 5px;
    overflow: hidden;
    text-align: center;
    vertical-align: middle;
  }
  .btn-file > input {
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    margin: 0;
    font-size: 23px;
    cursor: pointer;
    filter: alpha(opacity=0);
    opacity: 0;
    direction: ltr;
}
</style>
@endsection

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

          <div id="what-is" class="card">
            <div class="card-header">

            </div>
            <div class="card-content collapse show">
              <div class="card-body">
                <div class="card-text">
                  <div class="row justify-content-center">
                    <div class="col-md-12">
                    <form action="" method="post" enctype="multipart/form-data">
                      @csrf

                      <?php //p($user->address->country); ?>
                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="InputFirstname" class="col-form-label">@lang('First Name:')</label>
                          <input type="text" class="form-control form-control-lg" id="InputFirstname" name="firstname"
                          placeholder="@lang('First Name')" value="{{$user->firstname}}" >
                        </div>

                        <div class="form-group col-sm-6">
                          <label for="lastname" class="col-form-label">@lang('Last Name:')</label>
                          <input type="text" class="form-control form-control-lg" id="lastname" name="lastname"
                          placeholder="@lang('Last Name')" value="{{$user->lastname}}">
                        </div>

                      </div>


                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="email" class="col-form-label">@lang('E-mail Address:')</label>
                          <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="@lang('E-mail Address')" value="{{$user->email}}" required="">
                        </div>

                        <div class="form-group col-sm-6">
                          <input type="hidden" id="track" name="country_code">
                          <label for="phone" class="col-form-label">@lang('Mobile Number')</label>
                          <input type="tel" class="form-control form-control-lg pranto-control" id="phone" name="mobile" value="{{$user->mobile}}" placeholder="@lang('Your Contact Number')" required>
                        </div>
                        <input type="hidden" name="country" id="country" class="form-control d-none" value="{{$user->address->country}}">
                      </div>





                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="address" class="col-form-label">@lang('Address:')</label>
                          <input type="text" class="form-control form-control-lg" id="address" name="address"
                          placeholder="@lang('Address')" value="{{$user->address->address}}" required="">
                        </div>
                        <div class="form-group col-sm-6">
                          <label for="state" class="col-form-label">@lang('State:')</label>
                          <input type="text" class="form-control form-control-lg" id="state" name="state" placeholder="@lang('state')" value="{{$user->address->state}}" required="">
                        </div>
                      </div>


                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="zip" class="col-form-label">@lang('Zip Code:')</label>
                          <input type="text" class="form-control form-control-lg" id="zip" name="zip" placeholder="@lang('Zip Code')" value="{{$user->address->zip}}" required="">
                        </div>

                        <div class="form-group col-sm-6">
                          <label for="city" class="col-form-label">@lang('City:')</label>
                          <input type="text" class="form-control form-control-lg" id="city" name="city"
                          placeholder="@lang('City')" value="{{$user->address->city}}" required="">
                        </div>

                      </div>

                      <div class="row">
                        <div class="form-group col-sm-6">
                          <label for="country" class="col-form-label">@lang('Country:')</label>
                          <select id="country" name="country" class="form-control form-control-lg">
                            <option value="">@lang('Select Country')</option>
                            @foreach($country as $c)

                            <option value="{{$c['country_code']}}"  <?= (isset($c['country_code']) && $c['country_code'] == $user->address->country)? 'selected="selected"':'' ?>> {{$c['country_name']}} </option>
                            @endforeach
                          </select>
                        </div>
                        <div class="form-group col-sm-6">

                        </div>
                      </div>

                      <div class="row mt-4">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                          <div class="form-group">
                            <div class="fileinput fileinput-new " data-provides="fileinput">
                              <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"
                              data-trigger="fileinput">
                              <img  src="{{ get_image(config('constants.user.profile.path') .'/'. $user->image) }}" alt="...">

                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail"
                            style="max-width: 200px; max-height: 150px"></div>

                            <div class="img-input-div">
                              <span class="btn btn-info btn-file">
                                <span class="fileinput-new "> @lang('Select image')</span>
                                <span class="fileinput-exists"> @lang('Change')</span>
                                <input type="file" name="image" accept="image/*">
                              </span>
                              <a href="#" class="btn btn-danger fileinput-exists"
                              data-dismiss="fileinput"> @lang('Remove')</a>
                            </div>

                            <code>@lang('Image size 800*800')</code>
                          </div>
                        </div>
                      </div>
                    </div>


                    <div class="form-group row">
                      <div class="col-sm-12 text-center">
                        <button type="submit" class="btn btn-success custom-button bg-3">@lang('Update Profile')</button>
                      </div>
                    </div>
                  </form>

                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Simple Card-->
        </div>
      </section>

    </div>
  </div>
</div>


@endsection

@section('script')

@endsection
