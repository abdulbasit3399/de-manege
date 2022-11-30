<nav class="main-sidebar bg-default">
    <button class="sidebar-close"><i class="fa fa-times"></i></button>
    <div class="navbar-brand-wrapper d-flex justify-content-start align-items-center">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
            <span class="logo-one"><img src="{{ get_image(config('constants.logoIcon.path') .'/logo.png') }}" style="max-height: 50px;" alt="logo-image" /></span>
            <span class="logo-two"><img src="{{ get_image(config('constants.logoIcon.path') .'/favicon.png') }}" alt="logo-image" /></span>
        </a>
    </div>
    <div id="main-sidebar">
        <ul class="nav">
            <li class="nav-item {{ sidenav_active('admin.dashboard') }}">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-tachometer text-facebook"></i></span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </li>
            {{--  <li class="nav-item {{ sidenav_active('admin.referral.index') }}">
                <a href="{{ route('admin.referral.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-tree text-facebook"></i></span>
                    <span class="menu-title">Referral Commission </span>
                </a>
            </li>
            <li class="nav-item {{ sidenav_active('admin.time*')}} {{ sidenav_active('admin.plan*')}}">
                <a data-default-url="{{ route('admin.time-setting') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-clipboard text-facebook"></i></span>
                    <span class="menu-title">Investment Management</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.time*') }}">
                        <a class="nav-link" href="{{ route('admin.time-setting') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Time Manage</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.plan*') }}">
                        <a class="nav-link" href="{{ route('admin.plan-setting') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Manage Investment Package</span>
                        </a>
                    </li>

                </ul>
            </li>  --}}

            <li class="nav-item {{ sidenav_active('admin.users*') }}">
                <a data-default-url="{{ route('admin.users.all') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-users text-facebook"></i></span>
                    <span class="menu-title">Leden beheren</span>
                    @if($email_unverified_users_count > 0 || $sms_unverified_users_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.users.all') }}">
                        <a class="nav-link" href="{{ route('admin.users.all') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Lid toevoegen</span>
                        </a>
                    </li>
                    {{--  <li class="nav-item {{ sidenav_active('admin.users.active') }}">
                        <a class="nav-link" href="{{ route('admin.users.active') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Active Users</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.banned') }}">
                        <a class="nav-link" href="{{ route('admin.users.banned') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Banned Users</span>
                            @if($banned_users_count) <span class="badge bg-blue border-radius-10">{{ $banned_users_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.emailUnverified') }}">
                        <a class="nav-link" href="{{ route('admin.users.emailUnverified') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Email Unverified</span>
                            @if($email_unverified_users_count) <span class="badge bg-blue border-radius-10">{{ $email_unverified_users_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.smsUnverified') }}">
                        <a class="nav-link" href="{{ route('admin.users.smsUnverified') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">SMS Unverified</span>
                            @if($sms_unverified_users_count) <span class="badge bg-blue border-radius-10">{{ $sms_unverified_users_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active(['admin.users.login.history','admin.users.login.search']) }}">
                        <a class="nav-link" href="{{ route('admin.users.login.history') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Login History</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.users.email.all') }}">
                        <a class="nav-link" href="{{ route('admin.users.email.all') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Send Email</span>
                        </a>
                    </li>  --}}
                </ul>
            </li>
            {{--  <li class="nav-item {{ sidenav_active('admin.withdraw*') }}">
                <a data-default-url="{{ route('admin.withdraw.method.methods') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-bank text-facebook"></i></span>
                    <span class="menu-title">Withdraw System</span>
                    @if($pending_withdrawals_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.withdraw.method*') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.method.methods') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Withdraw Methods</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.pending') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.pending') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Pending Withdrawals</span>
                            @if($pending_withdrawals_count) <span class="badge bg-blue border-radius-10">{{ $pending_withdrawals_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.approved') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.approved') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Approved Withdrawals</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.rejected') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.rejected') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Rejected Withdrawals</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.withdraw.log') }}">
                        <a class="nav-link" href="{{ route('admin.withdraw.log') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">All Withdrawals</span>
                        </a>
                    </li>
                </ul>
            </li>  --}}

            <li class="nav-item {{ sidenav_active('admin.tiles*') }}">
                <a data-default-url="{{ route('admin.tiles.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-credit-card-alt text-facebook"></i></span>
                    <span class="menu-title">Producten</span>
                    @if($pending_deposits_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.tiles*') }}">
                        <a class="nav-link" href="{{ route('admin.tiles.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Productenlijst</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.deposit*') }}">
                <a data-default-url="{{ route('admin.deposit.gateway.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-credit-card-alt text-facebook"></i></span>
                    <span class="menu-title">Opwaardeersysteem</span>
                    @if($pending_deposits_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    {{--  <li class="nav-item {{ sidenav_active('admin.deposit.gateway*') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.gateway.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Automatic Gateways</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.manual*') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.manual.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Manual Methods</span>
                        </a>
                    </li>  --}}
                    <li class="nav-item {{ sidenav_active('admin.deposit.pending') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.pending') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Opwaardering(en) in afwachting</span>
                            @if($pending_deposits_count) <span class="badge bg-blue border-radius-10">{{ $pending_deposits_count }}</span> @endif
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.approved') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.approved') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Geaccepteerde opwaarderingens</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.rejected') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.rejected') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Geweigerde opwaarderingens</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.deposit.list') }}">
                        <a class="nav-link" href="{{ route('admin.deposit.list') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Alle opwaarderingen</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{--  <li class="nav-item {{ sidenav_active('admin.ticket*') }}">
                <a data-default-url="{{ route('admin.ticket') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-ticket text-facebook"></i></span>
                    <span class="menu-title">Support Ticket</span>
                    @if($pending_ticket_count > 0)
                        <span class="badge bg-orange border-radius-10"><i class="fa px-1 fa-exclamation"></i></span>
                    @endif
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.ticket') }}">
                        <a class="nav-link" href="{{ route('admin.ticket') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">All Ticket</span>
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.ticket.pending') }}">
                        <a class="nav-link" href="{{ route('admin.ticket.pending') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Pending Ticket</span>
                            @if($pending_ticket_count) <span class="badge bg-blue border-radius-10">{{ $pending_ticket_count }}</span> @endif
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.ticket.closed') }}">
                        <a class="nav-link" href="{{ route('admin.ticket.closed') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Closed Ticket</span>
                        </a>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.ticket.answered') }}">
                        <a class="nav-link" href="{{ route('admin.ticket.answered') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Answered Ticket</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.subscriber*') }}">
                <a href="{{ route('admin.subscriber.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-rss-square text-facebook"></i></span>
                    <span class="menu-title">Subscribers</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.report*') }}">
                <a data-default-url="{{ route('admin.report.transaction') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-clipboard text-facebook"></i></span>
                    <span class="menu-title">Reports</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.report.transaction*') }}">
                        <a class="nav-link" href="{{ route('admin.report.transaction') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Transaction Log</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.report.invest*') }}">
                        <a class="nav-link" href="{{ route('admin.report.invest') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Investment Log</span>
                        </a>
                    </li>
                </ul>
            </li>   --}}
        </ul>
        {{--  <hr class="nk-hr" />
        <h6 class="nav-header text-facebook">Settings</h6>
        <ul class="nav">

            <li class="nav-item {{ (sidenav_active('admin.setting*') ) }}">
                <a data-default-url="{{ route('admin.setting.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-cog text-facebook"></i></span>
                    <span class="menu-title">General Settings</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.setting.index') }}">
                        <a class="nav-link" href="{{ route('admin.setting.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Basic</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.setting.logo-icon') }}">
                        <a class="nav-link" href="{{ route('admin.setting.logo-icon') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Logo & Icon</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.frontend*') }}">
                <a data-default-url="#0" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-diamond text-facebook"></i></span>
                    <span class="menu-title">Frontend Manager</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">

                    <li class="nav-item ">
                        <h6 class="nav-header text-facebook">Templates</h6>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.frontend.templates') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.templates') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Activate Template</span>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <hr class="nk-hr">
                        <h6 class="nav-header text-facebook">Page Builder</h6>
                    </li>

                    <li class="nav-item {{ sidenav_active('admin.frontend.manage.pages') }}">
                        <a class="nav-link" href="{{ route('admin.frontend.manage.pages') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Manage Pages</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <hr class="nk-hr">
                        <h6 class="nav-header text-facebook">Content Manager</h6>
                    </li>
                    @foreach(getPageSections() as $k => $secs)
                        @if($secs->builder)
                            <li class="nav-item {{buildernav_active(route('admin.frontend.sections',$k))}}">
                                <a href="{{ route('admin.frontend.sections',$k) }}" class="nav-link">
                                    <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                                    <span class="menu-title">{{$secs->name}} </span>
                                </a>
                            </li>
                        @endif
                    @endforeach

                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.plugin*') }}">
                <a href="{{ route('admin.plugin.index') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-cogs text-facebook"></i></span>
                    <span class="menu-title">Plugin & Extensions</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.language*') }}">
                <a class="nav-link" href="{{ route('admin.language-manage') }}">
                    <span class="menu-icon"><i class="fa fa-language text-facebook"></i></span>
                    <span class="menu-title">Language Manager</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.seo') }}">
                <a class="nav-link" href="{{ route('admin.seo') }}">
                    <span class="menu-icon"><i class="fa fa-globe text-facebook"></i></span>
                    <span class="menu-title">SEO Manager</span>
                </a>
            </li>

            <li class="nav-item {{ sidenav_active('admin.email-template*') }}">
                <a data-default-url="{{ route('admin.email-template.global') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-envelope-o text-facebook"></i></span>
                    <span class="menu-title">Email Manager</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.email-template.global') }}">
                        <a class="nav-link" href="{{ route('admin.email-template.global') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Global Template</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active(['admin.email-template.index','admin.email-template.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.email-template.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Email Templates</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active('admin.email-template.setting') }}">
                        <a class="nav-link" href="{{ route('admin.email-template.setting') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">Email Configure</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ sidenav_active('admin.sms-template*') }}">
                <a data-default-url="{{ route('admin.sms-template.global') }}" class="nav-link">
                    <span class="menu-icon"><i class="fa fa-mobile text-facebook"></i></span>
                    <span class="menu-title">SMS Manager</span>
                    <span class="menu-arrow"><i class="fa fa-chevron-right"></i></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ sidenav_active('admin.sms-template.global') }}">
                        <a class="nav-link" href="{{ route('admin.sms-template.global') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">API Setting</span>
                        </a>
                    </li>
                    <li class="nav-item {{ sidenav_active(['admin.sms-template.index','admin.sms-template.edit']) }}">
                        <a class="nav-link" href="{{ route('admin.sms-template.index') }}">
                            <span class="mr-2"><i class="fa fa-angle-right"></i></span>
                            <span class="menu-title">SMS Templates</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>  --}}

        {{-- <div class="system-details py-5 text-center font-weight-bold">
            <span class="text-muted"> {{inputTitle(systemDetails()['name'])}} </span>
            <span class="text-facebook">  V{{systemDetails()['version']}} </span>
        </div> --}}
    </div>
</nav>
