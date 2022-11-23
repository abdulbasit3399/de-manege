<div class="sidebar-wrapper">
  <div>
    <div class="logo-wrapper">
    	<a href="{{route('user.new_home')}}">
            <img class="img-fluid for-light" src="{{asset('assets/crypto/images/logo/logo-black.png')}}" style="max-width: 85%;" alt="">
	    	<img class="img-fluid for-dark" src="{{asset('assets/crypto/images/logo/logo-white.png')}}" style="max-width: 85%;" alt="">

	    	{{--  <img class="img-fluid for-light" src="{{get_image(config('constants.logoIcon.path') .'/logo.png')}}" style="max-width: 85%;" alt="">
	    	<img class="img-fluid for-dark" src="{{get_image(config('constants.logoIcon.path') .'/logo.png')}}" style="max-width: 85%;" alt="">  --}}
    	</a>
      <div class="back-btn"><i class="fa fa-angle-left"></i></div>
      <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
      <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
      <div id="sidebar-menu">
        <ul class="sidebar-links" id="simple-bar">
          <li class="back-btn"><a href="index.html"><img class="img-fluid" src="../assets/images/logo/logo-icon.png" alt=""></a>
            <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.home')) active @endif" href="{{route('user.home')}}"><i data-feather="home"> </i><span>Dashboard</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('home.invest')) active @endif" href="{{route('home.invest')}}"><i data-feather="dollar-sign"></i><span>@lang('My Investment')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('home.plan')) active @endif" href="{{route('home.plan')}}"><i data-feather="package"></i><span>@lang('Investment Plan')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.interest.log')) active @endif" href="{{route('user.interest.log')}}"><i data-feather="trending-up"></i><span>@lang('Return Interest Log')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.deposit') || Request::routeIs('user.manualDeposit.preview') ||  Request::routeIs('user.manualDeposit.confirm') || Request::routeIs('user.deposit.preview')  ) active @endif" href="{{route('user.deposit')}}"><i data-feather="download"></i><span>@lang('Deposit Now')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.deposit.history')) active @endif" href="{{route('user.deposit.history')}}"><i data-feather="download"></i><span>@lang('Deposit History')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.withdraw')) active @endif" href="{{route('user.withdraw')}}"><i data-feather="sunrise"></i><span>@lang('Withdraw Now')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.withdraw.history')) active @endif" href="{{route('user.withdraw.history')}}"><i data-feather="filter"></i><span>@lang('Withdraw History')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.transactions')) active @endif" href="{{route('user.transactions')}}"><i data-feather="credit-card"></i><span>@lang('Transaction History')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.referral')) active @endif" href="{{route('user.referral')}}"><i data-feather="refresh-ccw"></i><span>@lang('Referral Statistic')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('ticket')) active @endif" href="{{route('ticket')}}"><i data-feather="align-justify"></i><span>@lang('Support Ticket')</span></a>
          </li>
          <li class="sidebar-list">
            <a class="sidebar-link sidebar-title link-nav @if(Request::routeIs('user.twofactor')) active @endif" href="{{route('user.twofactor')}}"><i data-feather="unlock"></i><span>@lang('2FA Security')</span></a>
          </li>
        </ul>
      </div>
      <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
  </div>
</div>
