<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class MeValid extends TestCase
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
            'POST', '/api/sign_up', [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );
        $loginResponse = $this->json(
            'POST', '/api/Sign_in', [
            'username' => $username,
            'password' => '1234567'
            ]
        );
        $token = $loginResponse->json()["token"];
        $meResponse = $this->json(
            'POST',
            '/api/me',
            [
            'token' => $token
            ]
        );
        $meResponse->assertStatus(200)->assertDontSee("token_error");
    }
}
