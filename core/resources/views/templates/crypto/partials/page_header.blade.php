@auth
<div class="page-header">
@else
<div class="page-header" style="background: #3119cc;">
@endauth
    <div class="header-wrapper row m-0">
      <form class="form-inline search-full col" action="#" method="get">
        <div class="form-group w-100">
          <div class="Typeahead Typeahead--twitterUsers">
            <div class="u-posRelative">
              <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
              <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
            </div>
            <div class="Typeahead-menu"></div>
          </div>
        </div>
      </form>
      <div class="header-logo-wrapper col-auto p-0">
        <div class="logo-wrapper">
          <a href="{{route('huis')}}">
            <img class="img-fluid" src="{{get_image(config('constants.logoIcon.path') .'/logo.png')}}" alt="" style="width: 260px !important;margin: 5px 56px;max-width: unset;">
          </a>
        </div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
      </div>
      <div class="left-header col horizontal-wrapper ps-0">
      </div>
      <div class="nav-right col-8 pull-right right-header p-0">
        <ul class="nav-menus">
          @auth
          <li>
            <div class="mode">
            <a href="{{ route('user.body-class') }}" class="text-dark">
                @if(!auth()->user()->bodyclass || auth()->user()->bodyclass == 'light-only')
                    <i class="fa fa-moon-o"></i>
                @else
                    <i class="fa fa-lightbulb-o"></i>
                @endif
            </a>
            </div>
          </li>
          <li class="maximize"><a class="text-dark" href="#!" onclick="javascript:toggleFullScreen()"><i data-feather="maximize"></i></a></li>

          <li class="profile-nav onhover-dropdown p-0 me-0">
            @auth
            <div class="media profile-media"><img class="b-r-10" src="{{ get_image(config('constants.user.profile.path') .'/'. auth()->user()->image) }}" alt="" width="40px" height="40px">
               <div class="media-body"><span>{{Auth::user()->username}}</span>
                <p class="mb-0 font-roboto">User <i class="middle fa fa-angle-down"></i></p>
              </div>
            </div>
            @endauth
            <ul class="profile-dropdown onhover-show-div">
              <li><a href="{{route('user.edit-profile')}}"><i data-feather="user"></i><span>@lang('Profile')</span></a></li>
              <li><a href="{{route('user.logout')}}"><i data-feather="log-in"></i><span>@lang('Logout')</span></a></li>
            </ul>
          </li>
          @endauth
        </ul>
      </div>
      <script class="result-template" type="text/x-handlebars-template">
        <div class="ProfileCard u-cf">
        <div class="ProfileCard-avatar">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
        <div class="ProfileCard-details">
        <div class="ProfileCard-realName"></div>
        </div>
        </div>
      </script>
      <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
    </div>
  </div>
