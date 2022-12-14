@extends('admin.layouts.master')

@section('content')
<div class="signin-section pt-5" style="background-image: url('./assets/images/login.png');">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
        <div class="col-xl-4 col-md-6 col-sm-8">
            <div class="login-area">
                <div class="login-header-wrapper text-center">
                    <img class="logo" src="{{ get_image(config('constants.logoIcon.path') .'/logo.png') }}" alt="image">
                    <p class="text-center admin-brand-text">Recover Account</p>
                </div>
                <form action="{{ route('admin.password.verify-code') }}" method="POST" class="login-form">
                    @csrf
                    <div class="login-inner-block">

                    <div class="frm-grps">
                        <h5 class="col-md-12 mb-3 text-center">Verification Code</h5>
                        <input type="text" name="code">
                    </div>
                   
                    <div class="btn-area text-center">
                        <button type="submit" class="submit-btn">Verify Code</button>                     
                    </div>
                    <div class="d-flex mt-5 justify-content-center">
                            <a href="{{ route('admin.password.reset') }}" class="forget-pass">Try to send again</a>
                        </div>
                </form>
            </div>
        </div>
        
        </div>
    </div>
</div>
@endsection


@push('style-lib')
<link rel="stylesheet" href="{{ asset('assets/admin/css/signin.css') }}"/>
@endpush
