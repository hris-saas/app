<?php

namespace App\Providers;

use App\Listeners\RegisterMigrations;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\ConfigureTenantDatabase;
use App\Listeners\ResolveTenantConnection;
use Illuminate\Contracts\Events\Dispatcher;
use App\Listeners\ConfigureTenantConnection;
use Tenancy\Affects\Connections\Events\Resolving;
use Tenancy\Hooks\Database\Events\Drivers as Database;
use Tenancy\Hooks\Migration\Events\ConfigureMigrations;
use Tenancy\Affects\Connections\Events\Drivers as Connection;
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

        Database\Configuring::class => [
            ConfigureTenantDatabase::class,
        ],
        Resolving::class => [
            ResolveTenantConnection::class,
        ],
        Connection\Configuring::class => [
            ConfigureTenantConnection::class,
        ],
        ConfigureMigrations::class => [
            RegisterMigrations::class,
        ],
    ];

    /**
     * @var array
     */
    protected $subscribe = [
        // Runs migrations for new tenants.
        // \App\Listeners\MigratesTenants::class,
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
