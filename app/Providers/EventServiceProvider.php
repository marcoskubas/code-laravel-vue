<?php

namespace CodeLaravelVue\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use CodeLaravelVue\Events\BankStoredEvent;
use CodeLaravelVue\Listeners\BankAccountSetDefault;
use Prettus\Repository\Events\RepositoryEntityCreated;
use Prettus\Repository\Events\RepositoryEntityUpdated;
use CodeLaravelVue\Listeners\BankLogoUploadListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BankStoredEvent::class => [
            BankLogoUploadListener::class,
        ],
        RepositoryEntityCreated::class => [
          BankAccountSetDefault::class,
        ],
        RepositoryEntityUpdated::class => [
          BankAccountSetDefault::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
