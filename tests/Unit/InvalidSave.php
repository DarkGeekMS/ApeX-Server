<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;

class InvalidSave extends TestCase
{
 /**
   *
   * @test
   *
   * @return void
   */
    public function noPostOrComnent()
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

        $saveResponse = $this->json(
            'POST',
            '/api/Save',
            [
            'token' => $token,
            'ID' => '99'              //fake id
            ]
        );
        $saveResponse->assertStatus(404);
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
    public function noUser()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $user['username'],
              'password' => 'non'               //wrong password
            ]
        );

        $signIn->assertStatus(400);
        $token = $signIn->json('token');

        $saveResponse = $this->json(
            'POST',
            '/api/Save',
            [
              'token' => $token,
              'ID' => $post['id']
            ]
        );
        $saveResponse->assertStatus(400);
        // delete user and post from the database
        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
        
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
