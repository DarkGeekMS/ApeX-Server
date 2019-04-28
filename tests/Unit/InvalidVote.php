<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class InvalidVote extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
     //no post
    public function invalidPost()
    {
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
            '/api/Vote',
            [
            'token' => $token,
            'name' => 't3_01',
            'dir' => 1
            ]
        );
        $response->assertStatus(404);
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

    /**
     *
     * @test
     *
     * @return void
     */
    //no comment
    public function noComment()
    {
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
            '/api/Vote',
            [
            'token' => $token,
            'name' => 't1_01',
            'dir' => 1
            ]
        );
        $response->assertStatus(404);
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

    /**
     *
     * @test
     *
     * @return void
     */
    //no user
    public function invalidUser()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'non'
            ]
        );

        $signIn->assertStatus(400);
        $token = $signIn->json('token');
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => $post['id'],
            'dir' => 1
            ]
        );
        $response->assertStatus(400);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );

        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
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
    //no user
    public function invalidDir()
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
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => $post['id'],
            'dir' => 2
            ]
        );
        $response->assertStatus(400);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
