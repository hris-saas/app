<?php

namespace App\Providers;

use App\Console\Migration\MigrateCommand;
use Illuminate\Database\MigrationServiceProvider;

class TenantMigrationServiceProvider extends MigrationServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        parent::register();

        $this->registerMigrateCommand();
    }

    /**
     * Register the command.
     *
     * @return void
     */
    protected function registerMigrateCommand()
    {
        $this->app->singleton('command.migrate', function ($app) {
            return new MigrateCommand($app['migrator']);
        });
    }
}
