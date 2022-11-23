@extends('templates.crypto.layouts.user')

@section('scripts')
<script>
    $('#pageWrapper').removeClass('compact-wrapper');
    $('#pageWrapper').addClass('horizontal-wrapper');
    $('.sidebar-wrapper').hide();

</script>
@endsection
@push('style')

    <style>
        .editor-statusbar {
            display: none;
        }

        .text-xs-center {
            text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }

      .header-top, .page-header > *{
            display:none !important;
        }

        .page-header{
             background-image: none !important;
             padding: 0px !important;
        }


        .header{
            top:0px;
            background:#000036;
        }

        header.inActive, header.active{
                -webkit-transform: translateY(0);
                -ms-transform: translateY(0);
                transform: translateY(0);
        }

    .account-form .form-group input[type="checkbox"] {
    width: 15px;
    height: 15px;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    margin-right: 10px;
    position: relative;
    overflow: hidden;
}

.account--section{
    margin-top: 60px;
}

    </style>

@endpush
@section('content')
<div class="container-fluid mt-4 pt-4">
    <div class="row mt-3">
        <div class="col-xl-7"><img class="bg-img-cover bg-center" src="{{asset('assets/crypto/images/login/2.jpg')}}" alt="looginpage"></div>
        <div class="col-xl-5 p-0">
          <div class="login-card">
            <div>
              {{-- <div>
                <a class="logo text-start" href="#">
                <img class="img-fluid for-light" src="{{asset('assets/crypto/images/logo/logo-black.png')}}" style="width:220px" alt="looginpage">
                <img class="img-fluid for-dark" src="{{asset('assets/crypto/images/logo/logo-black.png')}}" style="width:220px" alt="looginpage"></a>
                </div> --}}
              <div class="login-main">
                <form action="{{ route('user.login') }}" method="POST" class="account-form"  onsubmit="return submitUserForm();">
                    @csrf
                    <h4>@lang('Sign in your account')</h4>
                    {{--  <p>Enter your email & password to login</p>  --}}
                    <div class="form-group">
                      <label class="col-form-label">Username</label>
                      <input class="form-control" name="username" value="{{old('username')}}" type="text" required="" placeholder="@lang('Username')">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label">Password</label>
                      <div class="form-input position-relative">
                        <input class="form-control" type="password" name="password" value="{{old('password')}}" required="" placeholder="@lang('Password')">
                        {{--  <div class="show-hide"><span class="show"></span></div>  --}}
                      </div>
                    </div>
                    {{--  <div class="form-group">

                            @php echo recaptcha() @endphp
                        </div>  --}}

                        {{--  @include($activeTemplate.'partials.custom-captcha')  --}}

                    <div class="form-group mb-0">
                      <div class="checkbox p-0">
                        <input id="checkbox1" type="checkbox">
                        <label class="text-muted" for="checkbox1">@lang('Remember Me')</label>
                      </div>
                      <div class="form-group">
                        <input type="submit" id="recaptcha" class="btn btn-primary btn-block w-100" value="@lang('SIGN IN')">
                        </div>
                      {{--  <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>  --}}
                    </div>
                    {{--  <h6 class="text-muted mt-4 or">Or Sign in with</h6>
                    <div class="social mt-4">
                      <div class="btn-showcase"><a class="btn btn-light" href="https://www.linkedin.com/login" target="_blank"><i class="txt-linkedin" data-feather="linkedin"></i> LinkedIn </a><a class="btn btn-light" href="https://twitter.com/login?lang=en" target="_blank"><i class="txt-twitter" data-feather="twitter"></i>twitter</a><a class="btn btn-light" href="https://www.facebook.com/" target="_blank"><i class="txt-fb" data-feather="facebook"></i>facebook</a></div>
                    </div>  --}}
                    <div class="form-group mt-4 mb-0 text-center">
                        @lang("Don`t have on account yet?")
                        <a href="{{route('user.register')}}" class="">@lang('Create an Account Now!')</a>
                    </div>

                    {{-- <div class="form-group mt-4 mb-0 text-center">
                        @lang("Forget Your Password? ")
                        <a href="{{route('user.password.request')}}">@lang('Reset Password Now!')</a>
                    </div> --}}
                    {{--  <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>
                    <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p>  --}}

                  </form>
              </div>
            </div>
          </div>
        </div>
      </div>
</div>

@endsection



@push('script')
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

