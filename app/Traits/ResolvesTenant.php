<?php

namespace App\Traits;

use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Repositories\WebsiteRepository;

trait ResolvesTenant
{
    protected function resolve($website = null)
    {
        if ($website) {
            $environment = resolve(Environment::class);

            $repository = resolve(WebsiteRepository::class);

            $tenant = $repository->findById($website->id);

            $environment->tenant($tenant);
        }
    }
}
