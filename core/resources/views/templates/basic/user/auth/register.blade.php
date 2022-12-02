@extends($activeTemplate .'layouts.form')
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
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <form class="contact-form" action="{{ route('user.register') }}" method="post" onsubmit="return submitUserForm();">
                    @csrf
                    <h2 class="text-center text-white pb-4 text-uppercase"> {{__($page_title)}}</h2>


                    @isset($reference)
                        <div class="form-group row">
                            <label for="referenceBy" class="col-sm-3 col-form-label">@lang('Reference BY:')</label>
                            <div class="col-sm-9">
                                <input type="text" name="referBy"  class="form-control" id="referenceBy" value="{{$reference}}" placeholder="@lang('Reference BY')" readonly/>
                            </div>
                        </div>
                    @endisset

                    <div class="form-group row">
                        <label for="InputFirstname" class="col-sm-3 col-form-label">@lang('First Name:')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="InputFirstname" name="firstname" placeholder="@lang('First Name')" value="{{old('firstname')}}" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label">@lang('Last Name:')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="@lang('Last Name')" value="{{old('lastname')}}" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">@lang('Your Username:')</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="username" name="username" placeholder="@lang('Username')"  value="{{old('username')}}" required="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">@lang('E-mail Address:')</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="@lang('E-mail Address')"  value="{{old('email')}}" required="">
                        </div>
                    </div>



                    <div class="form-group row">

                        <input type="hidden" id="track" name="country_code" >
                        <label for="phone" class="col-sm-3 col-form-label">@lang('Mobile Number')</label>
                        <div class="col-sm-9">
                            <input type="tel"  class="form-control pranto-control" id="phone"  name="mobile"  value="{{old('mobile')}}" placeholder="@lang('Your Contact Number')" required>
                        </div>
                    </div>


                    <div class="form-group row d-none">
                        <label for="country" class="col-sm-3 col-form-label">@lang('Select Country')</label>
                        <div class="col-sm-9">
                            <input type="text" name="country" id="country" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">@lang('Define Password:')</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputEmail3" name="password" placeholder="Password" required="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">@lang('Retype Password:')</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="inputEmail3" name="password_confirmation" placeholder="Retype Password" required="">
                        </div>
                    </div>


                    <div class="form-group row justify-content-center">
                        <div class="col-sm-6">
                            @php echo recaptcha() @endphp
                        </div>
                    </div>

                    @if(\App\Plugin::where('act', 'custom-captcha')->where('status', 1)->first())
                        <div class="row justify-content-end">
                            <div class="form-group col-md-9">
                                @php echo  getCustomCaptcha() @endphp
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-6">
                                <input type="text" name="captcha" class="form-control " placeholder=" Enter Code">
                            </div>
                        </div>
                    @endif


                    @if($company_policy->count() !=0)
                        <div class="form-group row">
                            <div class="col-sm-3 text-white">@lang('I agree with')</div>
                            <div class="col-sm-9">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" required id="gridCheck1">
                                    <label class="form-check-label" for="gridCheck1">
                                        @foreach($company_policy as $policy)
                                            <a target="_blank" href="{{route('huis.policy',[$policy, str_slug($policy->data_values->title)])}}"> {{__($policy->data_values->title)}}</a>
                                            @if(!$loop->last)
                                                ,
                                            @endif

                                        @endforeach
                                    </label>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row pt-5">
                        <div class="col-sm-12 text-center">
                            <button type="submit" class="btn btn-default website-color">@lang('Submit Now')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@push('script')
    <script src="{{ asset('assets/admin/build/js/intlTelInput.js') }}"></script>

    <script>

        $('select[name=country]').val("{{ old('country') }}");
    </script>

    <script>
        $("#phone").on("countrychange", function(e, countryData) {
            // do something with countryData

            var data =  $(this).val('+' + countryData.dialCode)
            $('#track').val(data);
            var country = countryData.name;
            var country = country.split('(')[0];
            $('#country').val(country);
        });
        $("#phone").intlTelInput({
            geoIpLookup: function(callback) {
                $.get("https://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                    var countryCode = (resp && resp.country) ? resp.country : "";
                    callback(countryCode);
                });
            },

            // hiddenInput: "full_number",
            initialCountry: "auto",
            utilsScript: "{{asset('assets/admin/build/js/utils.js')}}"
        });
    </script>

    <script>
        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Captcha field is required.</span>';
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush

