<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Listeners\ConfigureTenantSeeds;
use Illuminate\Contracts\Events\Dispatcher;
use Tenancy\Hooks\Migration\Events\ConfigureSeeds;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ConfigureSeeds::class => [
            ConfigureTenantSeeds::class,
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

        foreach ($this->subscribe as $listener) {
            $this->app[Dispatcher::class]->subscribe($listener);
        }
    }
}
