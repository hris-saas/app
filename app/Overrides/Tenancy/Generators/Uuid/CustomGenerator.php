<?php

namespace App\Overrides\Tenancy\Generators\Uuid;

use Ramsey\Uuid\Uuid;
use Hyn\Tenancy\Contracts\Website;
use Hyn\Tenancy\Contracts\Website\UuidGenerator;

class CustomGenerator implements UuidGenerator
{
    /**
     * @param Website $website
     *
     * @return string
     */
    public function generate(Website $website): string
    {
        $uuid = substr(Uuid::uuid4()->toString(), 0, 16);

        return str_replace('-', null, $uuid);
    }
}
