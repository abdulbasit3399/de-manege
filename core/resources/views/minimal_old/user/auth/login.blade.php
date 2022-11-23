@extends($activeTemplate .'layouts.master')

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

    @include($activeTemplate.'partials.frontend-breadcrumb')

    <div class="account--section sign-in-section active relative">
        <div class="container-fluid">
            <div class="account--area">
                <div class="account--thumb">
                    <img src="{{asset($activeTemplateTrue.'images/account/sign-in.png')}}" alt="account">
                </div>
                <div class="account--content">
                    <h4 class="title">@lang('Sign in your account')</h4>
                    <form action="{{ route('user.login') }}" method="POST" class="account-form"  onsubmit="return submitUserForm();">
                        @csrf
                        <div class="form-group">
                            <label class="fixlabel" for="email1">
                                <i class="fas fa-user-circle"></i>
                            </label>
                            <input type="text" id="exampleInputUsername" name="username" value="{{old('username')}}"
                                   class="form-control" placeholder="@lang('Username')">
                        </div>

                        <div class="form-group">
                            <label class="fixlabel" for="pass1">
                                <i class="fas fa-unlock"></i>
                            </label>
                            <input type="password" name="password" value="{{old('password')}}" class="form-control"
                                   placeholder="@lang('Password')">

                        </div>



                        <div class="form-group">

                            @php echo recaptcha() @endphp
                        </div>

                        @include($activeTemplate.'partials.custom-captcha')



                        <div class="form-group check-group">
                            <input id="check02" type="checkbox">
                            <label for="check02">
                                @lang('Remember Me')
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="submit" id="recaptcha" class="submit-form-btn" value="@lang('SIGN IN')">
                        </div>

                        <div class="form-group">
                            @lang("Don`t have on account yet?")
                            <a href="{{route('user.register')}}" class="">@lang('Create an Account Now!')</a>
                        </div>

                        <div class="form-group">
                            @lang("Forget Your Password? ")
                            <a href="{{route('user.password.request')}}">@lang('Reset Password Now!')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ========Header-Section Ends Here ========-->



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

