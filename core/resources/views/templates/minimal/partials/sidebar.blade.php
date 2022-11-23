<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true" data-img="{{asset('assets/new_assets/app-assets/images/backgrounds/02.jpg')}}">
    <div class="navbar-header">
      <ul class="nav navbar-nav flex-row">
        <li class="nav-item mr-auto"><a class="navbar-brand" href="{{url('/')}}">
          <img class="brand-logo" src="{{get_image(config('constants.logoIcon.path') .'/logo.png')}}" style="width: 220px;" />
                {{-- <h3 class="brand-text">Chameleon</h3> --}}
            </a></li>
        <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
      </ul>
    </div>
    <div class="navigation-background"></div>
    @auth
    <div class="main-menu-content">
      <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

        <li class=" nav-item @if(Request::routeIs('user.home')) active @endif">
          <a href="{{route('user.home')}}">
            <i class="ft-home"></i>
            <span class="menu-title" data-i18n="">@lang('Dashboard')</span>
          </a>
        </li>
        {{--  <li class=" nav-item @if(Request::routeIs('home.purchase.index')) active @endif">
          <a href="{{route('home.purchase.index')}}">
            <i class="ft-box"></i>
            <span class="menu-title" data-i18n="">@lang('Purchases')</span>
          </a>
        </li>  --}}

        {{--  <li class=" nav-item @if(Request::routeIs('home.plan')) active @endif">
          <a href="{{route('home.plan')}}">
            <i class="ft-box"></i>
            <span class="menu-title" data-i18n="">@lang('Investment Plans')</span>
          </a>
        </li>  --}}
        {{--  <li class=" nav-item @if(Request::routeIs('user.interest.log')) active @endif">
          <a href="{{route('user.interest.log')}}">
            <i class="ft-zap"></i>
            <span class="menu-title" data-i18n="">@lang('Return Interest Log')</span>
          </a>
        </li>  --}}
        <li class=" nav-item @if(Request::routeIs('user.deposit') || Request::routeIs('user.manualDeposit.preview') ||  Request::routeIs('user.manualDeposit.confirm') || Request::routeIs('user.deposit.preview')  ) active @endif">
          <a href="{{route('user.deposit')}}">
            <i class="ft-download"></i>
            <span class="menu-title" data-i18n="">@lang('Deposit Now')</span>
          </a>
        </li>
        <li class=" nav-item @if(Request::routeIs('user.deposit.history')) active @endif">
          <a href="{{route('user.deposit.history')}}">
            <i class="ft-download"></i>
            <span class="menu-title" data-i18n="">@lang('Deposit History')</span>
          </a>
        </li>
        {{--  <li class=" nav-item @if(Request::routeIs('user.withdraw')) active @endif">
          <a href="{{route('user.withdraw')}}">
            <i class="ft-align-justify"></i>
            <span class="menu-title" data-i18n="">@lang('Withdraw Now')</span>
          </a>
        </li>
        <li class=" nav-item @if(Request::routeIs('user.withdraw.history')) active @endif">
          <a href="{{route('user.withdraw.history')}}">
            <i class="ft-align-justify"></i>
            <span class="menu-title" data-i18n="">@lang('Withdraw History')</span>
          </a>
        </li>  --}}
        {{--  <li class=" nav-item @if(Request::routeIs('user.transactions')) active @endif">
          <a href="{{route('user.transactions')}}">
            <i class="ft-file"></i>
            <span class="menu-title" data-i18n="">@lang('Transaction History')</span>
          </a>
        </li>
        <li class=" nav-item @if(Request::routeIs('user.referral')) active @endif">
          <a href="{{route('user.referral')}}">
            <i class="ft-refresh-cw"></i>
            <span class="menu-title" data-i18n="">@lang('Referral Statistic')</span>
          </a>
        </li>  --}}
        {{-- <li class=" nav-item @if(Request::routeIs('user.edit-profile')) active @endif">
          <a href="{{route('user.edit-profile')}}">
            <i class="ft-user"></i>
            <span class="menu-title" data-i18n="">@lang('Profile')</span>
          </a>
        </li> --}}
        <li class=" nav-item @if(Request::routeIs('user.change-password')) active @endif">
          <a href="{{route('user.change-password')}}">
            <i class="ft-align-justify"></i>
            <span class="menu-title" data-i18n="">@lang('Change Password')</span>
          </a>
        </li>
        {{--  <li class=" nav-item @if(Request::routeIs('ticket')) active @endif">
          <a href="{{route('ticket')}}">
            <i class="ft-align-justify"></i>
            <span class="menu-title" data-i18n="">@lang('Support Ticket')</span>
          </a>
        </li>
        <li class=" nav-item @if(Request::routeIs('user.twofactor')) active @endif">
          <a href="{{route('user.twofactor')}}">
            <i class="ft-unlock"></i>
            <span class="menu-title" data-i18n="">@lang('2FA Security')</span>
          </a>
        </li>  --}}
        <li class=" nav-item @if(Request::routeIs('document')) active d-none @endif">
          <a href="{{route('document')}}" style="display:none;">
            <i class="ft-file"></i>
            <span class="menu-title" data-i18n="">@lang('My Document')</span>
          </a>
        </li>
        {{-- <li class="nav-item">
          <a href="{{route('user.logout')}}">
            <i class="ft-log-out"></i>
            <span class="menu-title" data-i18n="">@lang('Logout')</span>
          </a>
        </li> --}}

      </ul>
    </div>
    @endauth
  </div>
