<?php

namespace App\Console\Passport;

use App\Traits\MutatesPassportCommand;
use Laravel\Passport\ClientRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Passport\Console\ClientCommand as BaseCommand;

class ClientCommand extends BaseCommand
{
    use MutatesPassportCommand;

    public function handle(ClientRepository $clients)
    {
        $websiteId = $this->option('website_id');

        try {
            $website = $this->websites->query()->where('id', $websiteId)->firstOrFail();

            $this->connection->set($website);

            $this->config->set('database.default', 'tenant');

            parent::handle($clients);

            $this->connection->purge();
        } catch (ModelNotFoundException $e) {
            throw new \RuntimeException(sprintf('The tenancy website_id=%d does not exist.', $websiteId));
        }
    }
}
