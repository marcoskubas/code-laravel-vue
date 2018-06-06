<?php

namespace CodeLaravelVue\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use CodeLaravelVue\Events\BankCreatedEvent;
use CodeLaravelVue\Listeners\BankLogoUpload;
use CodeLaravelVue\Listeners\BankActionListener;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        BankCreatedEvent::class => [
            BankLogoUpload::class,
            BankActionListener::class,
        ],
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
