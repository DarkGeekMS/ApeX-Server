<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidLock extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    //not owner,admin or moderator in the apeXcom where the post in
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
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );
        $response->assertStatus(400);
    }

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
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_1'
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
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );
        $response->assertStatus(404);
    }
}
