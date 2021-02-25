<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
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
        View::composer('inc.admin.navbar', function ($view) {
            $view->with([
                // 'notiCount' => auth()->user()->unreadNotifications()->count(),
                'notiCount' => 1,
            ]);
        });   

        Paginator::useBootstrap();
    }
}
