<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

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
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $response->assertStatus(200);
        $token = $response->json('token');
        $response1 = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        $response1->assertStatus(200);
    }
}
