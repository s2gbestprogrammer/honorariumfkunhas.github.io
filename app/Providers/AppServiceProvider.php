<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        //

        Gate::define('super-admin', function (User $user) {
            return $user->role === 'super-admin';
        });

        Gate::define('admin', function (User $user) {
            return $user->role === 'admin';
        });

        Gate::define('dosen', function (User $user) {
            return $user->role === 'dosen';
        });
    }
}
