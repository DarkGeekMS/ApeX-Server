<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeValid extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Mohamed1',
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
