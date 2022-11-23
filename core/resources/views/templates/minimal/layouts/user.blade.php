<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

@include('templates.minimal.partials.head')
@include('partials.notify-css')
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue1" data-col="2-columns">

  @include('templates.minimal.partials.navbar')

  @include('templates.minimal.partials.sidebar')
  <!-- END: Main Menu-->

  <!-- BEGIN: Content-->
  @section('content')
    @show
  <!-- END: Content-->


  <!-- BEGIN: Footer-->

  @include('templates.minimal.partials.footer')
  <!-- END: Footer-->


  <!-- BEGIN: Vendor JS-->
  @include('templates.minimal.partials.scripts')
  @include('partials.notify-js')
  <!-- BEGIN: Page JS-->
  <!-- END: Page JS-->
  @stack('renderModal')
  
</body>
<!-- END: Body-->

</html>