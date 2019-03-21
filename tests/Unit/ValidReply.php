<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidReply extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

     //comment to post
     //login by a user to get a token then send request to comment method
     // check the response status = 200 means success (comment to post added)
    public function commentToPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't3_4',
            'content' => ' comment to post '
            ]
        );
        $response->assertStatus(200);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    // reply to comment or another reply
    //login by a user to get a token then send request to comment method
    // check the response status = 200 means success (reply to comment added)
    public function replyToComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't1_5',
            'content' => ' reply to comment '
            ]
        );
        $response->assertStatus(200);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //reply to message
    //login by a user to get a token then send request to comment method
    // check the response status = 200 means success (reply to message added)
    public function replyToMessage()
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
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't4_1',
            'content' => ' reply to message '
            ]
        );
        $response->assertStatus(200);
    }
}
