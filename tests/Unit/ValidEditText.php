<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Comment;
use App\Models\Post;

class ValidEditText extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
    public function editPost()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        Post::where('id', $post['id'])->update(['posted_by' => $user['id']]);
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );
        $loginResponse->assertStatus(200);

        $token = $loginResponse->json("token");
        $content='winter is here';
        $editResponse = $this->json(
            'PATCH',
            '/api/EditText',
            [
            'token' => $token,
            'name' => $post['id'],
            'content'=>$content
            ]
        );
        $editResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'content' => $content]);

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
        
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }

  /**
   *
   * @test
   *
   * @return void
   */
    public function editComment()
    {
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create();
        Comment::where('id', $comment['id'])->update(['commented_by' => $user['id']]);
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );
        $loginResponse->assertStatus(200);

        $token = $loginResponse->json("token");
        $content='winter is here';
        $editResponse = $this->json(
            'PATCH',
            '/api/EditText',
            [
            'token' => $token,
            'name' => $comment['id'],
            'content'=>$content
            ]
        );
        $editResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertDatabaseHas('comments', ['id' => $comment['id'] , 'content' => $content]);

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
        
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
    
}
