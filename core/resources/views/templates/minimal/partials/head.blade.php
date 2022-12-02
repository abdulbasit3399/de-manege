<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
  <meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
  <meta name="author" content="ThemeSelect">
  <title>{{ $general->sitename($page_title) }}</title>
  <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.png">
  <link rel="shortcut icon" type="image/png" href="{{ get_image(config('constants.logoIcon.path') .'/favicon.png') }}"/>
  <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">

  <!-- BEGIN: Vendor CSS-->
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/vendors.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/ui/prism.min.css')}}"> --}}

  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/charts/chartist.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/charts/chartist-plugin-tooltip.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/file-uploaders/dropzone.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/forms/icheck/icheck.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/forms/icheck/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/vendors/css/timeline/vertical-timeline.css')}}">
  <!-- END: Vendor CSS-->

  <!-- BEGIN: Theme CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/bootstrap-extended.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/colors.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/components.css')}}">
  <!-- END: Theme CSS-->

  <!-- BEGIN: Page CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/app-assets/css/core/colors/palette-gradient.css')}}">--}}
  <!-- END: Page CSS-->

  <!-- BEGIN: Custom CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/new_assets/assets/css/style.css')}}">
  <!-- END: Custom CSS-->

</head>
<style type="text/css">
  html body .content .content-wrapper .content-wrapper-before{
    background: #0ad648;
  }
</style>

@section('style')
@show