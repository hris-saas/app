<?php

namespace App\Jobs;

use Exception;
use HRis\Auth\Eloquent\User;
use Illuminate\Bus\Queueable;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Illuminate\Support\Facades\DB;
use Hyn\Tenancy\Database\Connection;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Hyn\Tenancy\Contracts\Repositories\WebsiteRepository;
use Hyn\Tenancy\Contracts\Repositories\HostnameRepository;

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

        $this->tenantConnection = app(Connection::class);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->website = $this->registerTenant();

        $this->tenantConnection->set($this->website);

        $user = $this->registerAdmin();

        return $this->website;
    }

    private function registerAdmin()
    {
        $user = User::on('tenant')->create($this->data);

        // Artisan::call('tenancy:db:seed', ['--class' => 'PermissionsTableSeeder', '--website_id' => $this->website->id, '--force' => true]);
        // Artisan::call('tenancy:db:seed', ['--class' => 'RolesTableSeeder', '--website_id' => $this->website->id, '--force' => true]);

        Artisan::call('tenancy:passport:client', ['--personal' => true, '--name' => 'Personal Access Client', '--website_id' => $this->website->id]);
        Artisan::call('tenancy:passport:client', ['--password' => true, '--name' => 'Password Grant Client', '--website_id' => $this->website->id]);

        return $user;
    }

    private function registerTenant()
    {
        try {
            DB::beginTransaction();

            $website = new Website;
            app(WebsiteRepository::class)->create($website);
            $website->save();

            $hostname = new Hostname;
            $hostname->fqdn = $this->data['domain'];

            $hostname->website()->associate($website);
            app(HostnameRepository::class)->attach($hostname, $website);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            throw $e;
        }

        return $website;
    }
}
