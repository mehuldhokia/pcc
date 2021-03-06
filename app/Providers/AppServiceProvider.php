<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
// use App\Models\Category;
use App\Models\Shop;

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
        view()->composer('*', function($view) {
            if(Auth::guard('web')->check()) {
                $userRole = Auth::user()->roles->pluck('name','name')->first();
                $view->with('userRole', $userRole);

                // $shopInfo = Shop::where('user_id', Auth::user()->id)->first();
                // $view->with('shopInfo', $shopInfo);
            }
        });
    }
}
