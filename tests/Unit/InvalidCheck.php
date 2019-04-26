<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidCheck extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json(
            'POST',
            '/api/CheckCode',
            [
            'username' => 'MohamedRamzy',
            'code' => 'bla bla bla'
            ]
        );
        $response->assertStatus(400);
    }
}
