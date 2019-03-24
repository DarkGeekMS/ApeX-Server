<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class ValidSignup extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSignup()
    {
        $response = $this->json(
            'POST',
            '/api/sign_up',
            [
            'email' => "bebo@gmail.com",
            'password' => '1721998',
            'username' => 'rehab hamdy',
            ]
        );
        $response->assertStatus(200);
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'rehab hamdy',
            'password' => '1721998'
            ]
        );
        $token = $loginResponse->json('token');
        $response1 = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
        $response1->assertStatus(200);
    }
}
