<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidReply extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

     //comment to post
    public function commentToPost()
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
        $response->assertStatus(200);
    }

    // reply to comment or another reply
    public function replyToComment()
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
        $response->assertStatus(200);
    }

    //reply to message
    public function replyToMessage()
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
        $response->assertStatus(200);
    }
}
