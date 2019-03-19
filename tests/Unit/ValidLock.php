<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidLock extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //admin lock post
    public function adminLock()
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
        $response->assertStatus(200);
    }

    //post owner lock the post
    public function ownerLock()
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
        $response->assertStatus(200);
    }
    
    //moderator in the Apexcom where the post in lock the post
    public function moderatorLock()
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
        $response->assertStatus(200);
    }
}
