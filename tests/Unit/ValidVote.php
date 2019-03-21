<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidVote extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    //new vote in a post
    public function newPost()
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
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_6',
            'dir' => 1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', ['postID' => 't3_5' , 'userID' => $userID , 'dir' => 1]);
    }

    //reverse the vote direction for a post
    public function oppositeDirPost()
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
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_6',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', ['postID' => 't3_5' , 'userID' => $userID , 'dir' => -1 ]);
    }

    //remove one's vote on a post
    public function sameDirPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'MondaTalaat',
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
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_6',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('votes', ['postID' => 't3_5' , 'userID' => $userID]);
    }

    //new vote on a comment
    public function newComment()
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
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_5',
            'dir' => 1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comment_votes', ['comID' => 't1_5' , 'userID' => $userID , 'dir' => 1]);
    }

    //reverse the vote direction for a comment
    public function oppositeDirComment()
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
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_5',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comment_votes', ['comID' => 't1_5' , 'userID' => $userID , 'dir' => -1]);
    }

    //remove one's vote on a comment
    public function sameDirComment()
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
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_5',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comment_votes', ['comID' => 't1_5' , 'userID' => $userID ]);
    }
}
