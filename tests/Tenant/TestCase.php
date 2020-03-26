<?php

namespace Tests\Tenant;

use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $token;

    public function log_me_in()
    {
        if ($this->token) {
            return $this->token;
        }

        $data = [
            'email'    => 'tenant1@hris-saas.com',
            'password' => 'password',
        ];

        $response = $this->json('POST', 'api/login', $data);

        $data = $response->getData();

        $this->token = $data->token;

        return $this->token;
    }

    public function authApi($method, $endpoint, $data = [], $headers = [])
    {
        $token = $this->log_me_in();

        $authorizationHeader = [
            'Authorization' => 'Bearer ' . $token,
        ];

        $headers = array_merge($headers, $authorizationHeader);

        return $this->json($method, $endpoint, $data, $headers);
    }
}
