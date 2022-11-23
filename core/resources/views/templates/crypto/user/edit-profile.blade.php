@extends('templates.crypto.layouts.user')

@section('style')
<link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('assets/admin/build/css/intlTelInput.css')}}">
{{--  <style>
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
</style>  --}}
@endsection

@section('content')
<div class="page-body">
    <div class="container-fluid">
      <div class="page-title">
        <div class="row">
          <div class="col-6">
            <h3>{{__($page_title)}}</h3>
          </div>
          <div class="col-6">

          </div>
        </div>
      </div>
    </div>
    <!-- Container-fluid starts-->
    <div class="container-fluid">
      <div class="edit-profile">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">

              <div class="card-body">
                <form action="{{route('user.update-profile')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="update_image" value="1">
                  <div class="media" style="width: 200px; height: 100px;">
                    <img class="img-100 img-fluid m-r-20 rounded-circle update_img_0" style="height:71px" src="{{ get_image(config('constants.user.profile.path') .'/'. $user->image) }}" alt="">
                    <input class="updateimg" type="file" name="image" accept="image/*" onchange="readURL(this,0)">
                    <div class="media-body mt-0">
                      <h5><span class="first_name_0"><small>{{$user->firstname}}</small> </span><span class="last_name_0"><small>{{$user->lastname}}</small></span></h5>
                      <p class="email_add_0">{{$user->mobile}}</p>

                    </div>
                  </div>
                  <div class="form-footer">
                    <small>Click on image to change</small><br/>
                    <button type="submit" class="btn btn-primary btn-block">@lang('Save')</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <form action="{{route('user.update-profile')}}" class="card" method="post" enctype="multipart/form-data">
                @csrf
              <div class="card-body">
                <div class="row">
                <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">@lang('First Name:')</label>
                    <input class="form-control" type="text" placeholder="@lang('First Name:')"
                    id="InputFirstname" name="firstname" value="{{$user->firstname}}">
                </div>
                </div>
                <div class="col-sm-6 col-md-6">
                <div class="mb-3">
                    <label class="form-label">@lang('Last Name:')</label>
                    <input class="form-control" type="text" id="lastname" name="lastname"
                    placeholder="@lang('Last Name')" value="{{$user->lastname}}">
                </div>
                </div>
                <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">@lang('E-mail Address:')</label>
                      <input class="form-control" type="email" id="email" name="email" placeholder="@lang('E-mail Address')" value="{{$user->email}}" required="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                        <input type="hidden" id="track" name="country_code">

                      <label class="form-label">@lang('Mobile Number')</label>
                      <input class="form-control" type="tel" id="phone" name="mobile" value="{{$user->mobile}}" placeholder="@lang('Your Contact Number')" required>
                    </div>
                    <input type="hidden" name="country" id="country" class="form-control d-none" value="{{$user->address->country}}">

                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">@lang('Address:')</label>
                      <input class="form-control" type="text" id="address" name="address"
                      placeholder="@lang('Address')" value="{{$user->address->address}}" required="">
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="mb-3">
                      <label class="form-label">@lang('State:')</label>
                      <input class="form-control" type="text" id="state" name="state" placeholder="@lang('state')" value="{{$user->address->state}}" required="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">@lang('Zip Code:')</label>
                      <input class="form-control" type="number" id="zip" name="zip" placeholder="@lang('Zip Code')" value="{{$user->address->zip}}" required="">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label class="form-label">@lang('City:')</label>
                      <input class="form-control" type="text" id="city" name="city"
                      placeholder="@lang('City')" value="{{$user->address->city}}" required="">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label">@lang('Country:')</label>
                      <select id="country" name="country" class="form-control btn-square">
                        <option value="">@lang('Select Country')</option>
                            @foreach($country as $c)
                            <option value="{{$c['country_code']}}"  <?= (isset($c['country_code']) && $c['country_code'] == $user->address->country)? 'selected="selected"':'' ?>> {{$c['country_name']}} </option>
                            @endforeach
                      </select>
                    </div>
                  </div>

                </div>
              </div>
              <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">@lang('Update Profile')</button>
              </div>
            </form>
          </div>
          <div class="col-xl-12">
            <form action="" class="card" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card-header">
                <h4>@lang('Change Password')</h4>
            </div>
              <div class="card-body">
                <div class="row">
                <div class="col-sm-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">@lang('Current Password')</label>
                    <input class="form-control" type="password" id="CurrentPassword" name="current_password"
                    placeholder="@lang('Current Password')" value="" required>
                </div>
                </div>

                <div class="col-sm-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">@lang('New Password')</label>
                    <input class="form-control" type="password" id="password" name="password"
                    placeholder="@lang('New Password')" value="" required>
                </div>
                </div>

                <div class="col-sm-12 col-md-12">
                <div class="mb-3">
                    <label class="form-label">@lang('Confirm Password')</label>
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"
                    placeholder="@lang('Confirm Password')" value="" required>
                </div>
                </div>
                </div>
              </div>
              <div class="card-footer text-end">
                <button class="btn btn-primary" type="submit">@lang('Change Password')</button>
              </div>
            </form>
          </div>

          <div class="col-md-12">
            <div class="card">
              <div class="px-2 py-4">
                <h4 class="card-title mb-0">Recent Transections</h4>
                <div class="card-options"><a class="card-options-collapse" href="#" data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a class="card-options-remove" href="#" data-bs-toggle="card-remove"><i class="fe fe-x"></i></a></div>
              </div>
              <div class="table-responsive add-project">
                <table class="table card-table table-vcenter text-nowrap">
                  <thead>
                    <tr>
                        <th scope="col">@lang('Transaction ID')</th>
                        <th scope="col">@lang('Amount')</th>
                        <th scope="col">@lang('Remaining Balance')</th>
                        <th scope="col">@lang('Details')</th>
                        <th scope="col">@lang('Date')</th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach($logs as $k=>$data)
                    <tr>
                      <td data-label="#@lang('Trx')">{{$data->trx}}</td>
                      <td data-label="@lang('Amount')">
                        <strong @if($data->trx_type == '+') class="text-success" @else class="text-danger" @endif> {{($data->trx_type == '+') ? '+':'-'}} {{formatter_money($data->amount)}} {{$general->cur_text}}</strong>
                      </td>
                      <td data-label="@lang('Remaining Balance')">
                        <strong class="text-info">{{formatter_money($data->post_balance)}} {{$general->cur_text}}</strong>
                      </td>
                      <td data-label="@lang('Details')">{{$data->details}}</td>
                      <td data-label="@lang('Date')">{{date('d M, Y', strtotime($data->created_at))}}</td>
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
    <!-- Container-fluid Ends-->
  </div>
{{--  new end  --}}

@endsection

@section('scripts')
{{-- <script src="{{asset('assets/crypto/js/theme-customizer/customizer.js')}}"></script> --}}
<script src="{{asset('assets/crypto/js/form-validation-custom.js')}}"></script>
<script src="{{asset('assets/crypto/js/bookmark/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/crypto/js/contacts/custom.js')}}"></script>
@endsection
