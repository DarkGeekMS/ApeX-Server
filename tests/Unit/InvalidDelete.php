<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidDelete extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    //no post
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
            '/api/DelComment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }
    //no user
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
            '/api/DelComment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }

    //not post owner , admin or moderator in the apexcom where the post in
    public function invalidUser()
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
            '/api/DelComment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(400);
    }
}
