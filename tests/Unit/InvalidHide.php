<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidHide extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    //no user
    public function testExample()
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
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );

        $response->assertStatus(404);
    }

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
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );

        $response->assertStatus(404);
    }
}
