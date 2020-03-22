<?php

namespace App\Providers;

use Hyn\Tenancy\Environment;
use Laravel\Passport\Passport;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Passport::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $env = app(Environment::class);

        if ($fqdn = optional($env->hostname())->fqdn) {
            config([
                'database.default'             => 'tenant',
                // 'permission.models.role'       => \App\Models\Tenant\Role::class,
                // 'permission.models.permission' => \App\Models\Tenant\Permission::class,
            ]);
        }
    }
}
