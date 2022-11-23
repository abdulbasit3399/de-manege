@extends($activeTemplate .'layouts.form')


@push('style')
    <style>
        .editor-statusbar{
            display: none;
        }
        .text-xs-center {
            text-align: center;
        }

        .g-recaptcha {
            display: inline-block;
        }
    </style>
@endpush
@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                @if($errors->any())
                    <ul>
                        @foreach($errors as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                    <form action="{{ route('user.login') }}" method="POST" onsubmit="return submitUserForm();">
                        @csrf
                        <h2 class="text-center text-white pb-4 text-uppercase"> {{__($page_title)}}</h2>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">@lang('Username:')</label>
                            <div class="col-sm-9">
                                <input type="text" id="exampleInputUsername" name="username" value="{{old('username')}}"
                                       class="form-control" placeholder="@lang('Enter Username')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">@lang('Password:')</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" value="{{old('password')}}" class="form-control"
                                       placeholder="@lang('Enter Password')">
                            </div>
                        </div>


                        <div class="form-group row justify-content-center">
                            <div class="col-sm-8">
                                @php echo recaptcha() @endphp
                            </div>
                        </div>


                        @if(\App\Plugin::where('act', 'custom-captcha')->where('status', 1)->first())
                            <div class="row justify-content-end">
                                <div class="form-group col-md-10">
                                    @php echo  getCustomCaptcha() @endphp
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="form-group col-8">
                                    <input type="text" name="captcha" class="form-control " placeholder=" Enter Code">
                                </div>
                            </div>
                        @endif


                        <div class="form-group row ">
                            <div class="col-md-4 offset-md-2">
                                <input type="checkbox" name="remember" data-width="100%" data-onstyle="success"
                                       data-offstyle="danger" id="user-checkbox">
                                <label for="user-checkbox" class="">@lang('Remember me')</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-default website-color"
                                        id="recaptcha">@lang('Sign in')</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9 col-12 text-center">
                                <div class="remember">
                                    <label class="form-check-label" for="gridCheck1">
                                        <a href="{{route('user.password.request')}}"> @lang('Forgot your login information.')</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </form>



            </div>
        </div>
    </div>



@endsection


@push('script')
    <script>


        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if(response.length == 0) {
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
