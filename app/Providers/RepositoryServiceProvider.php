<?php

namespace CodeLaravelVue\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\CodeLaravelVue\Repositories\MyModelRepository::class, \CodeLaravelVue\Repositories\MyModelRepositoryEloquent::class);
        $this->app->bind(\CodeLaravelVue\Repositories\BankRepository::class, \CodeLaravelVue\Repositories\BankRepositoryEloquent::class);
        $this->app->bind(\CodeLaravelVue\Repositories\BankAccountRepository::class, \CodeLaravelVue\Repositories\BankAccountRepositoryEloquent::class);
        $this->app->bind(\CodeLaravelVue\Repositories\ClientRepository::class, \CodeLaravelVue\Repositories\ClientRepositoryEloquent::class);
        //:end-bindings:
    }
}
