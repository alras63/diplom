<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
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
        $this->app->bind('path.public', function() {
            return base_path() . '/public';
        });
        Auth::provider('self-eloquent', function ($app, $config) {
            return New \App\Libs\SelfEloquentUserProvider($app['hash'], $config['model']);
        });
    }
}
