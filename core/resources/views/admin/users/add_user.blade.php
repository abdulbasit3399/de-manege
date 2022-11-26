@extends('admin.layouts.app')

@section('panel')

<div class="container-fluid mx-auto">
    <div class="card">
    <div class="row justify-content-center">
        <div class="col-6 ">

            <h3 class="m-4">@lang('Create User')</h3>
        <form action="{{ route('admin.register') }}" method="POST" class="account-form"  >
            @csrf

            <div class="m-4">

                    <div class="form-group mt-3 mb-0">
                    <label class="ml-3 form-control-placeholder" for="first_name">@lang('First Name')</label>
                    <input type="text" name="firstname" id="first_name" class="form-control" value="{{old('firstname')}}"  required>
                    </div>

                    <div class="form-group mt-3 mb-0">
                    <label class="ml-3 form-control-placeholder" for="last_name">@lang('Last Name')</label>
                    <input type="text" name="lastname" id="last_name" class="form-control"  required>
                    </div>

                    <div class="form-group mt-3 mb-0">
                    <label class="ml-3 form-control-placeholder" for="username">@lang('Username')</label>
                    <input type="text" name="username" id="username" class="form-control" required>

                    </div>

                    <div class="form-group mt-3 mb-0">
                    <label class="ml-3 form-control-placeholder" for="password">@lang('Pin')</label>
                    <input type="password" name="password" id="password" class="form-control"  required>
                    <small>Note: Enter 4 Digit Pin.</small>
                </div>


                <div class="row px-3 mt-3">


                <div class="form-group mt-1 mb-1">
                    <input type="submit" class="form-control" value="@lang('Create')">
                </div>
                {{--  <div class="form-group">
                    @lang("Already have an account yet?")
                    <a href="{{route('user.login')}}" class=" d-block">@lang('Sign In')</a>
                </div>  --}}
                </div>


            </div>
        </form>

        </div>
    </div>
    </div>
</div>
@endsection
