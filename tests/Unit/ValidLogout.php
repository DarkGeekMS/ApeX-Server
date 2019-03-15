<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidLogout extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $loginResponse = $this->json(
            'POST', '/api/Sign_in', [
            'username' => 'Mohamed1',
            'password' => '1234567'
            ]
        );
        $token = $loginResponse->json()["token"];
        $logoutResponse = $this->json(
            'POST', '/api/sign_out', [
            'token' => $token
            ]
        );
        $logoutResponse->assertStatus(200)->assertJson(["token" => null]);    
    }
}
