<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class search extends TestCase
{
    /**
     * Test Search request with valid query.
     *
     * @test
     * 
     * @return void
     */
    public function validQuery()
    {
        $response = $this->json(
            'GET', 'api/search', [
            'query' => 'lorem'
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * Test Search request with invalid query.
     *
     * @test
     * 
     * @return void
     */
    public function invalidQuery()
    {
        $response = $this->json(
            'GET', 'api/search', [
            'query' => 'l'
            ]
        );
        $response->assertStatus(400);
    }

    /**
     * Test Search request with no query.
     *
     * @test
     * 
     * @return void
     */
    public function noQuery()
    {
        $response = $this->json(
            'GET', 'api/search'
        );
        $response->assertStatus(400);
    }
}
