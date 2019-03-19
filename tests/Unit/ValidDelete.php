<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidDelete extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     //post or comment owner
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
            '/api/DelComment',
            [
            'token' => $token,
            'name' => '12345678'
            ]
        );
        $response->assertStatus(200);
    }

    //admin in the website
    public function admin()
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
        $response->assertStatus(200);
    }

    //moderator in the apexcom where the post or comment to be deleted
    public function moderator()
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
        $response->assertStatus(200);
    }
}
