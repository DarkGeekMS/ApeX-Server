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
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $user = $this ->json(
            'POST'.
            '/api/me',
            [
              'token' => $token
            ]
        );
        $userID = $user->json()["id"];
        //to hide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('hiddens', ['postID' => 't3_4' , 'userID' => $userID]);
    }


    public function unhidePost()
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
        $user = $this ->json(
            'POST'.
            '/api/me',
            [
              'token' => $token
            ]
        );
        $userID = $user->json()["id"];
        //to unhide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('hiddens', ['postID' => 't3_4' , 'userID' => $userID]);
    }
}
