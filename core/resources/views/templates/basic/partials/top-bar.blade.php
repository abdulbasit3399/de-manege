<div class="header-top">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="call-area">
                    <span class="phone"><i class="fas fa-phone"></i><a
                            href="javascript:void(0)">{{@$contact->data_values->contact_number}}</a></span>
                    <span class="support"><i class="fas fa-envelope"></i><a
                            href="javascript:void(0)">{{@$contact->data_values->email_address}}</a></span>
                </div>
            </div>
            <div class="col-lg-4 pr-0">
                <div class="language-select-area">
                    <select class="language-select langSel" >
                        @foreach($language as $item)
                            <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif><i class="flag-icon flag-icon-es"></i>{{ __($item->name) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-2 pl-0">
                <ul class="social-links">
                    @foreach($socials as $data)
                        <li><a href="{{@$data->data_values->url}}" target="_blank"
                               title="{{@$data->data_values->title}}">@php echo   @$data->data_values->icon  @endphp</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>


<div
    class="header-bottom @if(Request::routeIs('user.login') || Request::routeIs('user.register') || Request::routeIs('user.password.request') || Request::routeIs('user.authorization') || Request::routeIs('user.password.email')) header-bottom--style @endif ">
    <div class=" container-fluid ">
        <nav class="navbar navbar-expand-lg p-0   mx-5 ">
            <a class="site-logo site-title" href="{{url('/')}}">
                <img src="{{get_image(config('constants.logoIcon.path') .'/logo.png')}}" class="logo-max" alt="@php echo site_name() @endphp">
                <span class="site-name">@php echo  site_name() @endphp</span>
            </a>
            <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <div class="language-select-area d-lg-none">
                <select class="language-select langSel">
                    @foreach($language as $item)
                        <option value="{{$item->code}}" @if(session('lang') == $item->code) selected  @endif><i class="flag-icon flag-icon-es"></i>{{ __($item->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav main-menu ml-auto mr-2 mr-xl-5">
                    @if(!request()->routeIs('user*'))
                        <li><a href="{{route('huis')}}">@lang('huis')</a></li>
                        <li><a href="{{route('huis.plan')}}">@lang('Plan')</a></li>
                        @foreach($pages as $k => $data)
                            <li><a href="{{route('huis.pages',[$data->slug])}}">{{__($data->name)}}</a></li>
                        @endforeach

                        <li><a href="{{route('huis.blog')}}">@lang('Blog')</a></li>
                        <li><a href="{{route('huis.contact')}}">@lang('Contact')</a></li>
                     

                        @auth
                        <li><a href="{{route('user.huis')}}">@lang('Dashboard')</a></li>
                        @endauth
                    @else
                        <li><a href="{{route('huis')}}">@lang('huis')</a></li>
                        @auth
                        <li><a href="{{route('user.huis')}}">@lang('Dashboard')</a></li>


                        <li>
                            <a class="btn btn-dropdown dropdown-toggle" href="#" role="button" id="investment" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('Investment')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="investment">
                                <a class="dropdown-item" href="{{route('huis.plan')}}">@lang('Investment Plans')</a>
                                <a class="dropdown-item" href="{{route('user.interest.log')}}">@lang('Return Interest Log')</a>
                            </div>
                        </li>


                        <li>
                            <a class="btn btn-dropdown dropdown-toggle" href="#" role="button" id="deposit" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('Deposit')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="deposit">
                                <a class="dropdown-item" href="{{route('user.deposit')}}">@lang('Deposit Now')</a>
                                <a class="dropdown-item" href="{{route('user.deposit.history')}}">@lang('Deposit History')</a>
                            </div>
                        </li>

                        <li>
                            <a class="btn btn-dropdown dropdown-toggle" href="#" role="button" id="withdraw" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('Withdraw')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="withdraw">
                                <a class="dropdown-item" href="{{route('user.withdraw')}}">@lang('Withdraw Now')</a>
                                <a class="dropdown-item" href="{{route('user.withdraw.history')}}">@lang('Withdraw History')</a>
                            </div>
                        </li>

                        <li>
                            <a class="btn btn-dropdown dropdown-toggle" href="#" role="button" id="transaction" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @lang('Transaction')
                            </a>
                            <div class="dropdown-menu" aria-labelledby="transaction">
                                <a class="dropdown-item" href="{{route('user.transactions')}}">@lang('Transaction History')</a>
                                <a class="dropdown-item" href="{{route('user.referral')}}">@lang('Referral Statistic')</a>
                            </div>
                        </li>


                        <li>
                            <a class="btn btn-dropdown dropdown-toggle" href="#" role="button" id="profile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              @auth  {{Auth::user()->username}} @endauth
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profile">
                                <a class="dropdown-item" href="{{route('user.edit-profile')}}">@lang('Profile')</a>
                                <a class="dropdown-item" href="{{route('user.change-password')}}">@lang('Change Password')</a>
                                <a class="dropdown-item" href="{{route('ticket')}}">@lang('Support Ticket')</a>
                                <a class="dropdown-item" href="{{route('user.twofactor')}}">@lang('2FA Security')</a>
                            </div>
                        </li>
                            @endauth


                    @endif

                </ul>
                <div class="header-action d-flex flex-wrap align-items-center">
                    @guest
                        <a href="{{route('user.login')}}" class="btn btn-default website-color  mr-1">@lang('Login')</a>
                        <a href="{{route('user.register')}}" class="btn btn-default website-color  mr-1">@lang('Register')</a>
                    @else
                        <a href="{{route('user.logout')}}" class="btn btn-default website-color  mr-1">@lang('Logout')</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>


