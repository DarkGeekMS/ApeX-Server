<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Moderator;

class ValidLock extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
    //admin lock post
    public function adminLock()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 3]);
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
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'locked' => 1]);
        $response = $this->json(
            'POST',
            '/api/LockPost',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'locked' => 0]);
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
    //post owner lock the post
    public function ownerLock()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        Post::where('id', $post['id'])->update(['posted_by' => $user['id']]);
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
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'locked' => 1]);
        $response = $this->json(
            'POST',
            '/api/LockPost',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'locked' => 0]);
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
    //moderator in the Apexcom where the post in lock the post
    public function moderatorLock()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        User::where('id', $user['id'])->update(['type' => 2]);
        Post::where('id', $post['id'])->update(['posted_by' => $user['id']]);
        Moderator::create(['apexID' => $post['apex_id'], 'userID' => $user['id']]);
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
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'locked' => 1]);
        $response = $this->json(
            'POST',
            '/api/LockPost',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => $post['id'] , 'locked' => 0]);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        Moderator::where('apexID', $post['apex_id'])->where('userID', $user['id'])->delete();
        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
