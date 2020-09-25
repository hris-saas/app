<?php

namespace App\Jobs;

use HRis\Auth\Eloquent\User;
use Tenancy\Facades\Tenancy;
use Illuminate\Bus\Queueable;
use HRis\Core\Eloquent\Tenant;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateTenant implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    protected $tenant;

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
    }

    /**
     * Execute the job.
     */
    public function handle(): Tenant
    {
        $this->tenant = Tenant::create($this->data);

        $user = $this->registerAdmin();

        return $this->tenant;
    }

    private function registerAdmin()
    {
        Tenancy::setTenant($this->tenant);

        $user = User::create($this->data);

        Artisan::call('passport:client', ['--personal' => true, '--name' => 'Personal Access Client', '--no-interaction' => true, '--tenant' => $this->tenant->id]);
        Artisan::call('passport:client', ['--password' => true, '--name' => 'Password Grant Client', '--no-interaction' => true, '--tenant' => $this->tenant->id]);

        return $user;
    }
}
