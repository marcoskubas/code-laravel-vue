<?php

namespace CodeLaravelVue\Providers;

use CodeLaravelVue\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use CodeLaravelVue\Jwt\Manager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('access-admin', function($user){
            return $user->role == User::ROLE_ADMIN;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('tymon.jwt.manager', function ($app) {
            $instance = new Manager(
                $app['tymon.jwt.provider.jwt'],
                $app['tymon.jwt.blacklist'],
                $app['tymon.jwt.payload.factory']
            );

            return $instance->setBlacklistEnabled((bool) config('jwt.blacklist_enabled'));
                            // ->setPersistentClaims($this->config('persistent_claims'));
        });
    }
}
