<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class apexNames extends TestCase
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
            '/api/Apex_names'
        );
        $response->assertStatus(200);
    }
}
