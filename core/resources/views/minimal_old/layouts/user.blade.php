<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $general->sitename($page_title) }}</title>
    <link rel="icon" href="{{get_image(config('constants.logoIcon.path') .'/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" type="image/png"
          href="{{ get_image(config('constants.logoIcon.path') .'/favicon.png') }}"/>

    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/bootstrap.min.css')}}">

    @stack('style-lib')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/animate.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/owl.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/magnific-popup.css')}}">

    @include('partials.notify-css')
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/odometer.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/main.css')}}">
    <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/style.php')}}?color={{ $general->bclr}}&secondColor={{ $general->sclr}}">

    @if(Request::routeIs('user*'))
        <link rel="stylesheet" href="{{asset($activeTemplateTrue.'css/user.css')}}">
    @endif

    @stack('style')
</head>
<body>
<div class="main-section">
    @include($activeTemplate.'partials.header')
    @yield('content')

    @include($activeTemplate.'partials.footer')
</div>


@stack('renderModal')



<script src="{{asset($activeTemplateTrue.'js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/plugins.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/bootstrap.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/magnific-popup.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/owl.min.js')}}"></script>
@stack('script-lib')
<script src="{{asset($activeTemplateTrue.'js/swiper.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/wow.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/odometer.min.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/viewport.jquery.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/nice-select.js')}}"></script>
@include('partials.notify-js')
<script src="{{asset($activeTemplateTrue.'js/paroller.js')}}"></script>
<script src="{{asset($activeTemplateTrue.'js/main.js')}}"></script>
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
