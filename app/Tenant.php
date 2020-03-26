<?php

namespace App;

use Tenancy\Tenant\Events;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Tenancy\Identification\Contracts\Tenant as Contract;
use Tenancy\Identification\Concerns\AllowsTenantIdentification;
use Tenancy\Identification\Drivers\Http\Contracts\IdentifiesByHttp;

class Tenant extends Model implements Contract, IdentifiesByHttp
{
    use AllowsTenantIdentification;

    protected $dispatchesEvents = [
        'created' => Events\Created::class,
        'updated' => Events\Updated::class,
        'deleted' => Events\Deleted::class,
    ];

    public function tenantIdentificationByHttp(Request $request): ?Tenant
    {
        return $this->query()
            ->where('fqdn', $request->getHttpHost())
            ->first();
    }
}
