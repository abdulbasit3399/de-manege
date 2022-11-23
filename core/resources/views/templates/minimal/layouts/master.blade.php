<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $general->sitename($page_title) }}</title>
    <link rel="icon" href="{{get_image(config('constants.logoIcon.path') .'/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" type="image/png" href="{{ get_image(config('constants.logoIcon.path') .'/favicon.png') }}"/>
    @include('partials.seo')
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/bootstrap.min.css')}}">

    @stack('style-lib')
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/dashboard.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/magnific-popup.css')}}">
    @include('partials.notify-css')
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/main.css')}}">

    <link rel="stylesheet" href="{{asset('assets/templates/minimal/css/style.php')}}?color={{ $general->bclr}}&secondColor={{ $general->sclr}}">
    {{--  <style>
        .copyright-container {

            padding-right: 20px;
            padding-left: 20px;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 1%;

          }
    </style>  --}}
    @stack('style')
</head>
<body>




<div class="main-section">
    @include('templates.minimal.partials.header')

@yield('content')

    @include('templates.minimal.partials.footer')
</div>

@stack('renderModal')




<script src="{{asset('assets/templates/minimal/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/plugins.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/owl.min.js')}}"></script>
@stack('script-lib')
<script src="{{asset('assets/templates/minimal/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/wow.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/odometer.min.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/viewport.jquery.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/nice-select.js')}}"></script>
@include('partials.notify-js')
<script src="{{asset('assets/templates/minimal/js/paroller.js')}}"></script>
<script src="{{asset('assets/templates/minimal/js/main.js')}}"></script>
@stack('script')
<script>
    $(document).on("change", ".langSel", function() {
        window.location.href = "{{url('/')}}/change-lang/"+$(this).val() ;
    });
</script>


@php
    if($plugins && $plugins[0]->status == 1){
        $appKeyCode = $plugins[0]->shortcode->app_key->value;
        $twakTo = str_replace("{{app_key}}",$appKeyCode,$plugins[0]->script);
        echo $twakTo;
    }
@endphp





</body>
</html>
