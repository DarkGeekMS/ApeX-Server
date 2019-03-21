<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidVote extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     //no post
    public function invalidPost()
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
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_01',
            'dir' => 1
            ]
        );
        $response->assertStatus(404);
    }

    //no comment
    public function invalidComment()
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
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_01',
            'dir' => 1
            ]
        );
        $response->assertStatus(404);
    }

    //no user
    public function invalidUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_1'
            ]
        );
        $response->assertStatus(404);
    }
}
