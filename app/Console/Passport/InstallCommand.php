<?php

namespace App\Console\Passport;

use App\Traits\MutatesPassportCommand;
use Laravel\Passport\Console\InstallCommand as BaseCommand;

class InstallCommand extends BaseCommand
{
    use MutatesPassportCommand;

    public function handle()
    {
        $this->config->set('database.default', 'tenant');

        $this->processHandle(function ($website) {
            $this->connection->set($website);

            $website->hostnames->first()->fqdn;

            $this->call('passport:keys', ['--force' => $this->option('force'), '--length' => $this->option('length')]);

            $this->call('tenancy:passport:client', ['--personal' => true, '--name' => 'Personal Access Client', '--website_id' => $website->id]);
            $this->call('tenancy:passport:client', ['--password' => true, '--name' => 'Password Grant Client', '--website_id' => $website->id]);

            $this->connection->purge();
        });
    }
}
