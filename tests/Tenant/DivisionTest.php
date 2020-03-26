<?php

namespace Tests\Tenant;

use Illuminate\Support\Str;
use HRis\PIM\Eloquent\Division;
use Symfony\Component\HttpFoundation\Response;

class DivisionTest extends TestCase
{
    /** @test */
    public function can_add_a_division()
    {
        $data = [
            'name'     => Str::random(10),
        ];

        $response = $this->authApi('POST', 'api/divisions', $data);

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'sort_order',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ]);
    }

    /** @test */
    public function can_update_an_existing_division()
    {
        $division = factory(Division::class)->create();

        $data = [
            'name' => Str::random(30),
        ];

        $response = $this->authApi('PATCH', 'api/divisions/' . $division->id, $data);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'sort_order',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ]);

        $this->assertEquals($response->getData()->data->id, $division->id);
    }

    /** @test */
    public function can_retrieve_a_division()
    {
        $divisionToRetrieve = factory(Division::class)->create();

        $response = $this->authApi('GET', 'api/divisions/' . $divisionToRetrieve->id);

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'sort_order',
                    'name',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ],
            ]);

        $this->assertEquals($response->getData()->data->id, $divisionToRetrieve->id);
    }

    /** @test */
    public function can_retrieve_all_divisions()
    {
        $response = $this->authApi('GET', 'api/divisions?per_page=all');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'sort_order',
                        'name',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                    ],
                ],
            ]);
    }

    /** @test */
    public function can_retrieve_paginated_divisions()
    {
        $response = $this->authApi('GET', 'api/divisions');

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'sort_order',
                        'name',
                        'created_at',
                        'updated_at',
                        'deleted_at',
                    ],
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next',
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ],
            ]);
    }

    /** @test */
    public function can_delete_a_division()
    {
        $divisionToDelete = factory(Division::class)->create();

        $response = $this->authApi('DELETE', 'api/divisions/' . $divisionToDelete->id);

        $response->assertStatus(Response::HTTP_OK);
    }
}
