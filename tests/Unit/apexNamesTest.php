<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class apexNamesTest extends TestCase
{
    /**
     * Test apexNames function
     *
     * @test
     *
     * @return void
     */
    public function getNames()
    {
        $response = $this->json(
            'GET',
            '/api/ApexComs'
        );
        $response->assertStatus(200);
    }
}
