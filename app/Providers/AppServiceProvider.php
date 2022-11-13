<?php

namespace App\Providers;

use App\Models\User;
use Hashids\Hashids;
use Illuminate\Support\Facades\Route;
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
        $this->app->singleton('hashid', fn() => new Hashids('This is my salt!', 6));
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('user_hashid', function ($value) {
            return User::findOrFailByHashid($value);
        });
    }
}
