<?php

namespace App\Providers;

use HRis\Core\Eloquent\Tenant;
use Laravel\Passport\Passport;
use HRis\Auth\Eloquent\Passport\Token;
use HRis\Auth\Eloquent\Passport\Client;
use Illuminate\Support\ServiceProvider;
use HRis\Auth\Eloquent\Passport\AuthCode;
use HRis\Auth\Eloquent\Passport\PersonalAccessClient;
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
        Passport::ignoreMigrations();

        Passport::useTokenModel(Token::class);
        Passport::useClientModel(Client::class);
        Passport::useAuthCodeModel(AuthCode::class);
        Passport::usePersonalAccessClientModel(PersonalAccessClient::class);

        $this->app->resolving(ResolvesTenants::class, function (ResolvesTenants $resolver) {
            $resolver->addModel(Tenant::class);

            return $resolver;
        });
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
