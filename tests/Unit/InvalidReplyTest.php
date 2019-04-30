<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Message;
use App\Models\User;

class InvalidReplyTest extends TestCase
{

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

        $this->assertDatabaseHas('posts', ['id' => $post['id']]);
        $response = $this->json(
            'POST',
            '/api/AddReply',
            [
            'token' => $token,
            'parent' => $post['id']
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

  /**
    *
    * @test
    *
    * @return void
    */
    public function noPost()
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
             '/api/AddReply',
             [
             'token' => $token,
             'parent' => 't3_001',
             'content' => ' reply to message '
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
             '/api/AddReply',
             [
             'token' => $token,
             'parent' => 't1_01',
             'content' => ' reply to message '
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

    public function noMessage()
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
             '/api/AddReply',
             [
             'token' => $token,
             'parent' => 't4_01',
             'content' => ' reply to message '
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

    public function noContent()
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
             '/api/AddReply',
             [
             'token' => $token,
             'parent' => $post['id']
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
    public function lockedPost1()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();
        Post::where('id', $post['id'])->update(['locked' => 1]);

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
             'parent' => $post['id'],
             'content' => ' reply to locked post '
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
      public function DeletedUser()
      {
          $user = factory(User::class)->create();
          $user2 = factory(User::class)->create();
          $post = factory(Post::class)->create();
          $dummy = User::find($post['posted_by']);
          Post::where('id', $post['id'])->update(['posted_by' => $user2['id']]);

          User::where('id', $dummy['id'])->forceDelete();
          $this->assertDatabaseMissing('users', ['id' => $dummy['id']]);

          User::where('id', $user2['id'])->delete();

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
               'parent' => $post['id'],
               'content' => ' reply to deleted post '
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
           User::where('id', $user2['id'])->forceDelete();

           //check that the user deleted from database
           $this->assertDatabaseMissing('users', ['id' => $user2['id']]);
           // delete user added to database
           User::where('id', $user['id'])->forceDelete();

           //check that the user deleted from database
           $this->assertDatabaseMissing('users', ['id' => $user['id']]);
      }
}
