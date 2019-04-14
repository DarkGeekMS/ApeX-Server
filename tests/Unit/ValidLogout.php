<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class ValidLogout extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $email = Str::random(15)."@gmail.com";
        $username = Str::random(15);
        $firstSignup = $this->json(
            'POST',
            '/api/sign_up',
            [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => $username,
            'password' => '1234567'
            ]
        );
        $token = $loginResponse->json()["token"];
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
        $logoutResponse->assertStatus(200)->assertJson(["token" => null]);
    }
}
