<?php

namespace App\Jobs;

use Exception;
use Ramsey\Uuid\Uuid;
use HRis\Auth\Eloquent\User;
use Illuminate\Bus\Queueable;
use HRis\Core\Eloquent\Tenant;
use Hyn\Tenancy\Models\Website;
use Illuminate\Support\Facades\DB;
use Hyn\Tenancy\Database\Connection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateTenant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param mixed $data
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;

        // $this->tenantConnection = app(Connection::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->tenant = $this->registerTenant();

        // $this->tenantConnection->set($this->tenant);

        $user = $this->registerAdmin();

        return $this->tenant;
    }

    private function registerAdmin()
    {
        $user = User::create($this->data);

        // Artisan::call('tenancy:db:seed', ['--class' => 'PermissionsTableSeeder', '--website_id' => $this->tenant->id, '--force' => true]);
        // Artisan::call('tenancy:db:seed', ['--class' => 'RolesTableSeeder', '--website_id' => $this->tenant->id, '--force' => true]);

        // Artisan::call('tenancy:passport:client', ['--personal' => true, '--name' => 'Personal Access Client', '--website_id' => $this->tenant->id]);
        // Artisan::call('tenancy:passport:client', ['--password' => true, '--name' => 'Password Grant Client', '--website_id' => $this->tenant->id]);

        return $user;
    }

    private function registerTenant()
    {
        try {
            DB::beginTransaction();

            $uuid = substr(Uuid::uuid4()->toString(), 0, 16);
            $uuid = str_replace('-', null, $uuid);

            $data = [
                'fqdn' => $this->data['domain'],
                'uuid' => $uuid,
            ];

            $tenant = Tenant::create($data);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }

        return $tenant;
    }
}
