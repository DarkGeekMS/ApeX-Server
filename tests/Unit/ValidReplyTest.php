<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use App\Models\Message;
use App\Models\Post;
use App\Models\User;

class ValidReplyTest extends TestCase
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
        $lastcom =Comment::selectRaw('CONVERT(SUBSTR(id,4), INT) AS intID')->get()->max('intID');
        $id = 't1_'.(string)($lastcom +1);

        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

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

        $this->assertDatabaseHas('posts', ['id' => $post['id']]);

        $response = $this->json(
            'POST',
            '/api/AddReply',
            [
            'token' => $token,
            'parent' => $post['id'],
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
        $this->assertDatabaseMissing('comments', ['id' => $id]);

        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);

        User::where('id', $post['posted_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $post['posted_by']]);

        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
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
        $comment = factory(Comment::class)->create();

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
                'parent' => $comment['id'],
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
            $this->assertDatabaseMissing('comments', ['id' => $id]);

            Comment::where('id', $comment['id'])->delete();
            $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);

            User::where('id', $comment['commented_by'])->forceDelete();
            $this->assertDatabaseMissing('users', ['id' => $comment['commented_by']]);
            
            User::where('id', $user['id'])->forceDelete();
            //check that the user deleted from database
            $this->assertDatabaseMissing('users', ['id' => $user['id']]);
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
        $msg = factory(Message::class)->create();

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
            'parent' => $msg['id'],
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

        Message::where('id', $msg['id'])->delete();
        $this->assertDatabaseMissing('messages', ['id' => $msg['id']]);
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
