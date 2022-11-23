<?php

namespace App\Providers;

use App\Frontend;
use App\GeneralSetting;
use App\Language;
use App\Page;
use App\Plugin;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
		\Debugbar::disable();
        $viewShare['general'] = GeneralSetting::first();
        $viewShare['socials'] = Frontend::where('data_keys','social_icon.element')->get();
        $viewShare['company_policy'] = Frontend::where('data_keys','company_policy.element')->get();
        $viewShare['contact'] =  Frontend::where('data_keys','contact_us.content')->first();

        $viewShare['plugins'] = Plugin::all();
        $viewShare['language'] = Language::all();
        $viewShare['pages'] = Page::where('tempname',activeTemplate())->where('slug','!=','home')->get();

        $viewShare['activeTemplateTrue'] = activeTemplate(true);
        $viewShare['activeTemplate'] = activeTemplate();
        view()->share($viewShare);



        view()->composer('partials.seo', function ($view) {
            $seo = \App\Frontend::where('data_keys', 'seo.data')->first();
            $view->with([
                'seo' => $seo ? $seo->data_values : $seo,
            ]);
        });




        view()->composer('admin.partials.sidenav', function ($view) {
            $view->with([
                'banned_users_count'           => \App\User::banned()->count(),
                'email_unverified_users_count' => \App\User::emailUnverified()->count(),
                'sms_unverified_users_count'   => \App\User::smsUnverified()->count(),
                'pending_withdrawals_count'    => \App\Withdrawal::pending()->count(),
                'pending_deposits_count'    => \App\Deposit::pending()->count(),
                'pending_ticket_count'         => \App\SupportTicket::whereIN('status', [0,2])->count()
            ]);
        });
    }
}
