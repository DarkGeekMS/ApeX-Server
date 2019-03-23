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
    // reply to comment or another reply
    //login by a user to get a token then send request to comment method
    // check the response status = 200 means success (reply to comment added)
    public function replyToComment()
    {

        $lastcom = DB::table('comments')->orderBy('created_at', 'desc')->first();
        $id = $lastcom->id;
        $newIdx = (int)explode("_", $id)[1];
        $id = "t1_".($newIdx+1);

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
}
