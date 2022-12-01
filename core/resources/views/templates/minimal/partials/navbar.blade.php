<nav class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light">
  <div class="navbar-wrapper">
    <div class="navbar-container content">
      <div class="collapse navbar-collapse show" id="navbar-mobile">
        <ul class="nav navbar-nav mr-auto float-left">
          <li class="nav-item mobile-menu d-md-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu font-large-1"></i></a></li>
          <li class="nav-item d-none d-md-block">
            <a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ft-menu"></i>
            </a>
          </li>
          <li class="d-none d-md-block">
            {{--  <a class="nav-link" id="apps-navbar-links" href="{{route('home')}}">
              @lang('Home')
            </a>  --}}
          </li>
          {{--  <li class="d-none d-md-block">
            <a class="nav-link" id="apps-navbar-links" href="{{route('home.plan')}}">
              @lang('Plan')
            </a>
          </li>
          @foreach($pages as $k => $data)
          <li class="d-none d-md-block">
            <a class="nav-link" id="apps-navbar-links" href="{{route('home.pages',[$data->slug])}}">
              {{__($data->name)}}
            </a>
          </li>
          @endforeach
          <li class="d-none d-md-block">
            <a class="nav-link" id="apps-navbar-links" href="{{route('home.blog')}}">
              @lang('Blog')
            </a>
          </li>
          <li class="d-none d-md-block">
            <a class="nav-link" id="apps-navbar-links" href="{{route('home.contact')}}">
              @lang('Contact')
            </a>
          </li>  --}}

        </ul>
      <ul class="nav navbar-nav float-right">
        {{--  <li class="dropdown dropdown-language nav-item">
          <a class="dropdown-toggle nav-link" id="dropdown-flag" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag-icon flag-icon-us"></i><span class="selected-language"></span></a>

        </li>  --}}
        @auth
        <li class="dropdown dropdown-user nav-item">
          <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
            <span class="avatar avatar-online">
              <img style="width: 54px !important;height: 54px !important; max-width: 54px;" src="{{get_image(config('constants.user.profile.path') .'/'. Auth::user()->image)}}" alt="avatar">
            </span>
          </a>
          <div class="dropdown-menu dropdown-menu-right">
            <div class="arrow_box_right">
              <a class="dropdown-item" href="#">
                <span class="">
                  <span class="user-name text-bold-700 ml-1">{{Auth::user()->username}}</span>
                </span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('user.edit-profile')}}">
                <i class="ft-user"></i>@lang('Profiel')
              </a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="{{route('user.logout')}}">
                <i class="ft-power"></i> @lang('Uitloggen')
              </a>
            </div>
          </div>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</div>
</nav>
