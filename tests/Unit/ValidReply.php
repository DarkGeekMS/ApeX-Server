<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use App\Models\Message;
use DB;

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

        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST',
            '/api/SignUp',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        $token = $signUp->json('token');

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

        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST',
            '/api/SignUp',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        $token = $signUp->json('token');

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

        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST',
            '/api/SignUp',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        $token = $signUp->json('token');

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
        DB::table('users')->where('email', $email)->delete();
    }
}
