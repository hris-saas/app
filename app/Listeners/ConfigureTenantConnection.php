<?php

namespace App\Listeners;

use Tenancy\Affects\Connections\Events\Drivers\Configuring;

class ConfigureTenantConnection
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     *
     * @return void
     */
    public function handle(Configuring $event)
    {
        $key = config('app.key');

        dd($event);

        $tenant = $event->tenant;
        $website = $tenant->website;
        $password = md5(sprintf('%d.%s.%s.%s', $website->id, $website->uuid, $website->created_at, $key));

        $event->configuration = [
            'username' => $website->uuid,
            'password' => $password,
            'database' => $website->uuid,
        ];

        $event->useConnection('system', $event->configuration);
    }
}
