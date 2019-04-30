<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;

class InvalidEditText extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
    public function noPostOrComment()
    {
        $user = factory(User::class)->create();
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
            'name' => '1000',   //fake id
            'content'=>$content
            ]
        );
        $editResponse->assertStatus(500)->assertSee("post or comment is not found");

        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        // delete user from the database
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }

  /**
   *
   * @test
   *
   * @return void
   */
    public function unautorizedAccess()
    {
        $user = factory(User::class)->create();
        $user2 = factory(User::class)->create();
        $post = factory(Post::class)->create();
        Post::where('id', $post['id'])->update(['posted_by' => $user2['id']]);
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
        $editResponse->assertStatus(403)->assertSee("user is not the owner of the post or comment");

        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        // delete users and post from the database
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);

        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
        
        User::where('id', $user2['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user2['id']]);
    }
}
