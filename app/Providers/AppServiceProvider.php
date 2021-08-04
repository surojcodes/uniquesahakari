<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Information;
use App\Link;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if(config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
        $info = Information::first();
        View::share('info', $info);
        $links = Link::orderBy('created_at','DESC')->get();
        View::share('links', $links);
    }
}
