<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use App\Models\Message;
use App\Models\User;

class ValidReply extends TestCase
{
    use WithFaker;

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


        $lastcom =Comment::selectRaw('CONVERT(SUBSTR(id,4), INT) AS intID')->get()->max('intID');
        $id = 't1_'.(string)($lastcom +1);

        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

        $response = $this->json(
            'POST',
            '/api/AddReply',
            [
            'token' => $token,
            'parent' => 't3_10',
            'content' => ' comment to post '
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comments', ['id' => $id]);

        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        Comment::where('id', $id)->delete();
        User::where('id', $user['id'])->forceDelete();
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

        $lastcom =Comment::selectRaw('CONVERT(SUBSTR(id,4), INT) AS intID')->get()->max('intID');
        $id = 't1_'.(string)($lastcom +1);

        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

          $response = $this->json(
              'POST',
              '/api/AddReply',
              [
                'token' => $token,
                'parent' => 't1_8',
                'content' => ' reply to comment '
              ]
          );
            $response->assertStatus(200);
            $this->assertDatabaseHas('comments', ['id' => $id]);

            $logoutResponse = $this->json(
                'POST',
                '/api/SignOut',
                [
                'token' => $token
                ]
            );
            Comment::where('id', $id)->delete();
            User::where('id', $user['id'])->forceDelete();
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
        $lastcom =Message::selectRaw('CONVERT(SUBSTR(id,4), INT) AS intID')->get()->max('intID');
        $id = 't4_'.(string)($lastcom +1);

        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

        $response = $this->json(
            'POST',
            '/api/AddReply',
            [
            'token' => $token,
            'parent' => 't4_1',
            'content' => ' reply to message '
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('messages', ['id' => $id]);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
