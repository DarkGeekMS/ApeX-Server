<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidReport extends TestCase
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
        $response->assertStatus(404);
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
            '/api/report',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }

    //no comment
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
            '/api/report',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(404);
    }
    //moderator in the apexcom holds the post or comment to be reported
    public function modUser()
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
        $response->assertStatus(404);
    }

    // admin in the website
    public function adminUser()
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
        $response->assertStatus(404);
    }

    //the owner of the post to be reported or hase the reported comment
    public function owner()
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
        $response->assertStatus(404);
    }
}
