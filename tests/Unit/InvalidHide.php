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
    public function noUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'tc'
            ]
        );
        $token = $loginResponse->json()["token"];

        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_5'
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
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];

        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_01'
            ]
        );

        $response->assertStatus(404);
    }
}
