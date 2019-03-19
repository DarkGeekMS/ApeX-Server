<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidHide extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
     
    public function hidePost()
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
        //to hide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );
        $response->assertStatus(200);
    }

    public function unhidePost()
    {

        $SignUpResponse = $this->json(
            'POST',
            '/api/sign_up',
            [
            'fullname' => 'monda talaat',
            'email' => "mondatlaat21@gmail.com",
            'password' => '1561998',
            'username' => 'MondaTalaat'
            ]
        );

        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'MondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json()["token"];
        //to unhide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );
        $response->assertStatus(200);
    }
}
