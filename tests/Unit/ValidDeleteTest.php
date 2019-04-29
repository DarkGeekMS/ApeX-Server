<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Moderator;

class ValidDeleteTest extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

     //post owner ( post owner can delete any comment on his post).
     //login to get a token for a post owner and call delete function to delete a comment on this post.
     //response status = 200 comment deleted successfully.
    public function postOwnerC()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
        $post = factory(Post::class)->create();
        Post::where('id', $post['id'])->update(['posted_by' => $user['id']]);
        $comment = factory(Comment::class)->create();
        Comment::where('id', $comment['id'])->update(['root' => $post['id']]);

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
             'DELETE',
             '/api/Delete',
             [
             'token' => $token,
             'name' => $comment['id']
             ]
         );
         $response->assertStatus(200);
         $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);
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
     //post owner
     //login to get a token for a post owner and call delete function to delete the post
     //response status = 200 post deleted successfully.
    public function postOwner()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
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
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
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
    //comment owner
    //login to get a token for a comment owner and call delete function to delete the comment
    //response status = 200 comment deleted successfully.
    public function commentOwner()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
        $comment = factory(Comment::class)->create();
        Comment::where('id', $comment['id'])->update(['commented_by' => $user['id']]);
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
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => $comment['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);
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
    //admin in the website delete post
    public function adminPost()
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
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
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
    //admin in the website delete post
    public function adminComment()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 3]);
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
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => $comment['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);
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
    //moderator in the apexcom where the post or comment to be deleted
    public function moderatorComment()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 2]);
        $post = factory(Post::class)->create();
        Moderator::create(['apexID' => $post['apex_id'], 'userID' => $user['id']]);
        $comment = factory(Comment::class)->create();
        Comment::where('id', $comment['id'])->update(['root' => $post['id']]);
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
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => $comment['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);
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

    /**
     *
     * @test
     *
     * @return void
     */
    //moderator in the apexcom where the post or comment to be deleted
    public function moderatorPost()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 2]);
        $post = factory(Post::class)->create();
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
            'DELETE',
            '/api/Delete',
            [
            'token' => $token,
            'name' => $post['id']
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        Moderator::where('apexID', $post['apex_id'])->where('userID', $user['id'])->delete();

        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
