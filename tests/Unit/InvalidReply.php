<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidReply extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function noPost()
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
            '/api/comment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }

    public function noComment()
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
            '/api/comment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }

    public function noUser()
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
            '/api/comment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }
}
