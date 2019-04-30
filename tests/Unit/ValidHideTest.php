<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;

class ValidHideTest extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

    public function hidePost()
    {
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

        //to hide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('hiddens', ['postID' => $post['id'] , 'userID' => $user['id']]);
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('hiddens', ['postID' => $post['id'] , 'userID' => $user['id']]);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);

        User::where('id', $post['posted_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $post['posted_by']]);
        
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
