<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class InvalidLockTest extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

    //not moderator in the apeXcom where the post in
    public function notModerator()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
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
            '/api/LockPost',
            [
            'token' => $token,
            'name' => $post['id']
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
    //no post
    public function noPost()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 3]);

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
            '/api/LockPost',
            [
            'token' => $token,
            'name' => 't3_01'
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
    public function noUser()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 3]);
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
            '/api/LockPost',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(400);

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
