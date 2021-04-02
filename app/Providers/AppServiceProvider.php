<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Setting;
use App\Observers\ProductObserver;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
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
        if(!Cache::has('settings')){
            Cache::rememberForever('settings',function(){
                return DB::table('settings')->select('title','value')->get();
            });
        }

        View::composer('*', function ($view) {
            $settings = cache('settings');
            $view->with([
                'NAME'=>$settings->where('title','name')->first(),
                'EMAIL'=>$settings->where('title','email')->first(),
                'ADDRESS'=>$settings->where('title','address')->first(),
                'PHONE'=>$settings->where('title','phone')->first(),
                'LOGO'=>$settings->where('title','logo')->first(),
            ]);
        });   

        Paginator::useBootstrap();

        Product::observe(ProductObserver::class);
    }
}
