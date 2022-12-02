<style>


</style>
<div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<a href="#0" class="scrollToTop">
    <i class="fas fa-angle-up"></i>
</a>
<div class="overlay"></div>
<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-top-area">
                <div class="left-side d-none d-sm-flex">
                    <ul class="social">
                        <li>
                            @foreach($socials as $data)
                                <a href="{{@$data->data_values->url}}" target="_blank"
                                   title="{{@$data->data_values->title}}">@php echo   @$data->data_values->icon  @endphp</a>
                            @endforeach
                        </li>
                    </ul>
                    <p class="mail">
                        <i class="far fa-envelope"></i>{{@$contact->data_values->email_address}}
                    </p>
                </div>
                <div class="right-side">
                    <div class="form-group">
                        <i class="fas fa-globe"></i>
                        <select class="select-bar langSel">

                            @foreach($language as $item)
                                <option value="{{$item->code}}" @if(session('lang') == $item->code) selected @endif><i
                                        class="flag-icon flag-icon-es"></i>{{ __($item->name) }}</option>
                            @endforeach
                        </select>
                    </div>
                    @guest
                    <div class="account">
                        {{-- <a href="{{route('user.login')}}" class="text-white">
                            <i class="fas fa-user"></i>@lang('Login')
                        </a> --}}
                    </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom" style="background: #3119cc">
        <div class="container">
            <div class="header-area">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{get_image(config('constants.logoIcon.path') .'/logo.png')}}" alt="image">

                    </a>

                </div>
                <ul class="menu">

                    {{-- <li><a href="{{route('huis')}}">@lang('huis')</a></li>
                    <li><a href="{{route('huis.plan')}}">@lang('Plan')</a></li>
                    @foreach($pages as $k => $data)
                    <li><a href="{{route('huis.pages',[$data->slug])}}">{{__($data->name)}}</a></li>
                    @endforeach
                    <li><a href="{{route('huis.blog')}}">@lang('Blog')</a></li>
                    <li><a href="{{route('huis.contact')}}">@lang('Contact')</a></li>
                    --}}

                    @auth
                        <li>
                            @if(Request::routeIs('user*'))
                                <a href="{{route('user.logout')}}" class="header-button btn btn-pill btn-primary">@lang('Logout')</a>
                            @else
                            <a href="{{route('user.huis')}}" class="header-button bg-3">@lang('Dashboard')</a>
                            @endif
                        </li>
                    @else
                        <li><a class="btn btn-outline-primary header-button" href="{{route('user.login')}}" >@lang('Login')</a></li>
                        
                    @endif
                </ul>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
</header>

