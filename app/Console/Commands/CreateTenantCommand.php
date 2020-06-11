<?php

namespace App\Console\Commands;

use App\Jobs\CreateTenant;
use Illuminate\Console\Command;
use HRis\Core\Generators\UuidGenerator;

class CreateTenantCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:create-tenant {tenant}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new tenant website.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $tenant = $this->argument('tenant');

        $domain = $tenant . '.' . config('app.domain');

        $data = [
            'uuid'                  => (new UuidGenerator())->generate(),
            'fqdn'                  => $domain,
            'first_name'            => ucfirst($tenant),
            'last_name'             => 'Admin',
            'email'                 => "{$tenant}@hris-saas.com",
            'password'              => bcrypt('password'),
            'password_confirmation' => bcrypt('password'),
            'name'                  => ucfirst($tenant),
        ];

        $website = (new CreateTenant($data))->handle();

        $this->info('New Tenant Created: '. $domain . PHP_EOL);
    }
}
