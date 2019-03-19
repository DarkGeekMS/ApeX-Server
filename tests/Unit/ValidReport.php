<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidReport extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function reportPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'MondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(200);
    }

    public function reportComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'MondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(200);
    }
}
