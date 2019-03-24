<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use DB;

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
        $lastcom = DB::table('comments')->orderBy('created_at', 'desc')->first();
        $id = "t1_1";
        if ($lastcom) {
            $count = DB::table('comments') ->where('created_at', $lastcom->created_at)->count();
            $id = $lastcom->id;
            $newIdx = (int)explode("_", $id)[1];
            $id = "t1_".($newIdx+ $count);
        }
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
            'parent' => 't3_10',
            'content' => ' comment to post '
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comments', ['id' => $id]);
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

        $lastcom = DB::table('comments')->orderBy('created_at', 'desc')->first();
        $count = DB::table('comments') ->where('created_at', $lastcom->created_at)->count();
        $id = $lastcom->id;
        $newIdx = (int)explode("_", $id)[1];
        $id = "t1_".($newIdx+$count);

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
                'parent' => 't1_8',
                'content' => ' reply to comment '
              ]
          );
            $response->assertStatus(200);
            $this->assertDatabaseHas('comments', ['id' => $id]);
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
        $lastcom = DB::table('messages')->orderBy('created_at', 'desc')->first();
        $count = DB::table('comments') ->where('created_at', $lastcom->created_at)->count();
        $id = $lastcom->id;
        $newIdx = (int)explode("_", $id)[1];
        $id = "t4_".($newIdx+$count);

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
        $this->assertDatabaseHas('messages', ['id' => $id]);
    }
}
