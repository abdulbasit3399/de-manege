<!DOCTYPE html>
<html lang="en">
  @include('templates.crypto.partials.head')
  <body class="{{ auth()->user()->bodyclass ?? 'light-only' }}">
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper horizontal-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      @include('templates.crypto.partials.page_header')
      <!-- Page Header Ends                              -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        @include('templates.crypto.partials.sidebar')
        <!-- Page Sidebar Ends-->
        @section('content')
          @show
        <!-- footer start-->
        @include('templates.crypto.partials.footer')
      </div>
    </div>
    <!-- latest jquery-->
      @include('templates.crypto.partials.scripts')
      @include('admin.partials.notify')
      @stack('renderModal')
    <!-- login js-->
    <!-- Plugin used-->
  </body>
</html>
