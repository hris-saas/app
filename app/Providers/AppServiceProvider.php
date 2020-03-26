<?php

namespace App\Providers;

use HRis\Core\Eloquent\Tenant;
use Illuminate\Support\ServiceProvider;
use Tenancy\Identification\Contracts\ResolvesTenants;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(Tenant::class);
            
            return $resolver;
        });

        $this->app->register(\Tenancy\Database\Drivers\Mysql\Provider::class);
        $this->app->register(\Tenancy\Hooks\Database\Provider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
