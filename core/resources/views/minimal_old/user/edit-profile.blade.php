@extends($activeTemplate .'layouts.user')


@push('style-lib')
    <link href="{{ asset('assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@endpush

@push('style')
    <link rel="stylesheet" href="{{asset('assets/admin/build/css/intlTelInput.css')}}">
    <style>
        .intl-tel-input {
            position: relative;
            display: inline-block;
            width: 100%;!important;
        }
    </style>
@endpush
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

                                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                            <span class="navbar-toggler-icon"></span>

                                            <i class="fas fa-bars" style="color:#fff; font-size:28px;"></i>
                                        </button>
                                    </a>
                                </li>
                            </ul>
                        </div>


                        <div class="tab-area fullscreen-width">
                            <div class="tab-item active">


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


                                            <div class="form-group row pt-5">
                                                <div class="col-sm-12 text-center">
                                                    <button type="submit" class="custom-button bg-3">@lang('Update Profile')</button>
                                                </div>
                                            </div>
                                        </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ========User-Panel-Section Ends Here ========-->
@endsection


@push('script-lib')
    <script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
@endpush
@push('script')
    <script src="{{ asset('assets/admin/build/js/intlTelInput.js') }}"></script>

@endpush
