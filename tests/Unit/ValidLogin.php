<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidLogin extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json(
            'POST', '/api/Sign_in', [
            'username' => 'Mohamed1',
            'password' => '1234567'
            ]
        );
        $response->assertStatus(200);
    }
}
