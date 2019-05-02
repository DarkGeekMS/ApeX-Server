<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class SaveValidTest extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
    public function saveComment()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create();
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        //to save a comment
        $saveResponse = $this->json(
            'POST',
            '/api/Save',
            [
            'token' => $token,
            'ID' => $comment['id']
            ]
        );
        $saveResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertDatabaseHas('save_comments', ['comID' => $comment['id'] , 'userID' => $user['id']]);
        //to unsave saved comment
        $unsaveResponse = $this->json(
            'POST',
            '/api/Save',
            [
            'token' => $token,
            'ID' => $comment['id']
            ]
        );
        $unsaveResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertDatabaseMissing('save_comments', ['comID' => $comment['id'] , 'userID' => $user['id']]);

        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        // delete user and comment from the database
        Comment::where('id', $comment['id'])->delete();
        $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);

        User::where('id', $comment['commented_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $comment['commented_by']]);

        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }


 /**
   *
   * @test
   *
   * @return void
   */
    public function savePost()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];

        //to save a post
        $saveResponse = $this->json(
            'POST',
            '/api/Save',
            [
            'token' => $token,
            'ID' => $post['id']
            ]
        );
        $saveResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertDatabaseHas('save_posts', ['postID' => $post['id'] , 'userID' => $user['id']]);
        //to unsave saved post
        $unsaveResponse = $this->json(
            'POST',
            '/api/Save',
            [
            'token' => $token,
            'ID' => $post['id']
            ]
        );
        $unsaveResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertDatabaseMissing('save_posts', ['postID' => $post['id'] , 'userID' => $user['id']]);

        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        // delete user and post from the database
        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);

        User::where('id', $post['posted_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $post['posted_by']]);

        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
