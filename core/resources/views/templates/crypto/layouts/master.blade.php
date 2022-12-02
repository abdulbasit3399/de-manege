<!DOCTYPE html>
<html lang="en">
    @include('templates.crypto.partials.head')

  <body class="landing-page">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper landing-page">
      <!-- Page Body Start            -->
      {{--  <div class="landing-huis">  --}}
        {{--  <ul class="decoration">
          <li class="one"><img class="img-fluid" src="../assets/images/landing/decore/1.png" alt=""></li>
          <li class="two"><img class="img-fluid" src="../assets/images/landing/decore/2.png" alt=""></li>
          <li class="three"><img class="img-fluid" src="../assets/images/landing/decore/4.png" alt=""></li>
          <li class="four"><img class="img-fluid" src="../assets/images/landing/decore/3.png" alt=""></li>
          <li class="five"><img class="img-fluid" src="../assets/images/landing/2.png" alt=""></li>
          <li class="six"><img class="img-fluid" src="../assets/images/landing/decore/cloud.png" alt=""></li>
          <li class="seven"><img class="img-fluid" src="../assets/images/landing/2.png" alt=""></li>
        </ul>  --}}
        <div class="container-fluid">
          <div class="sticky-header">
            @include('templates.crypto.partials.page_header2')

          </div>
          {{--  <div class="row">
            <div class="col-xl-5 col-lg-6">
              <div class="content">
                <div>
                  <h1 class="wow fadeIn">One stop  </h1>
                  <h1 class="wow fadeIn">For all admin template</h1>
                  <h2 class="txt-secondary wow fadeIn">Faster, Lighter & Dev. Friendly</h2>
                  <p class="mt-3 wow fadeIn">Cuba Admin Design makes your project modern, clean and reduce your project integration time. cuba comes with 10+ Apps , Dark Mode and RTL Ready</p>
                  <div class="btn-grp mt-4"><a class="btn btn-pill btn-primary btn-air-primary btn-lg me-3 wow pulse" href="index.html" target="_blank"> <img src="../assets/images/landing/icon/html/html.png" alt="">HTML</a><a class="btn btn-pill btn-secondary btn-air-secondary btn-lg me-3 wow pulse" href="https://react.pixelstrap.com/cuba/dashboard/default/Dubai" target="_blank"><img src="../assets/images/landing/icon/react/react.png" alt="">React</a><a class="btn btn-pill btn-info btn-air-info btn-lg wow pulse" href="http://angular.pixelstrap.com/cuba/" target="_blank"> <img src="../assets/images/landing/icon/angular/angular.svg" alt="">Angular</a></div>
                  <div class="btn-grp mt-4"><a class="btn btn-pill btn-secondary btn-air-secondary btn-lg wow pulse me-3" href="https://vue.pixelstrap.com/cuba/dashboard/default" target="_blank"> <img src="../assets/images/landing/icon/vue/vue.png" alt="">VueJs</a><a class="btn btn-pill btn-success btn-air-success btn-lg wow pulse me-3" href="http://laravel.pixelstrap.com/cuba/pages/landing" target="_blank"> <img src="../assets/images/landing/icon/laravel/laravel2.png" alt="">Laravel</a></div>
                </div>
              </div>
            </div>
            <div class="col-xl-7 col-lg-6">
              <div class="wow fadeIn"><img class="screen1" src="../assets/images/landing/screen1.jpg" alt=""></div>
              <div class="wow fadeIn"><img class="screen2" src="../assets/images/landing/screen2.jpg" alt=""></div>
            </div>
          </div>
        </div>  --}}
      {{--  </div>  --}}
      @section('content')
        @show

    </div>
    @include('templates.crypto.partials.scripts')


  </body>

</html>
