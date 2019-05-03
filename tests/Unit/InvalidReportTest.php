<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Moderator;

class InvalidReportTest extends TestCase
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
        User::where('id', $user['id'])->update(['type' => 1]);
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
            '/api/Report',
            [
            'token' => $token,
            'name' => $post['id'],
            'content' => 'report a problem'
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
        User::where('id', $user['id'])->update(['type' => 1]);

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
            '/api/Report',
            [
            'token' => $token,
            'name' => 't3_01',
            'content' => 'report a problem'
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
        User::where('id', $user['id'])->update(['type' => 1]);

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
            '/api/Report',
            [
            'token' => $token,
            'name' => 't1_01',
            'content' => 'report a problem'
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
    //no content
    public function noContent()
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
            '/api/Report',
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
    // admin in the website
    public function adminUser()
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
            '/api/Report',
            [
            'token' => $token,
            'name' => $post['id'],
            'content' => 'report a problem'
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
    //moderator in the apexcom holds the post or comment to be reported
    public function modUser()
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
            'POST',
            '/api/Report',
            [
            'token' => $token,
            'name' => $post['id'],
            'content' => 'report a problem'
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

        Moderator::where('apexID', $post['apex_id'])->where('userID', $user['id'])->delete();
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
    //the owner of the post to be reported
    public function ownerP()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
        $post = factory(Post::class)->create();
        $dummy = User::find($post['posted_by']);
        Post::where('id', $post['id'])->update(['posted_by' => $user['id']]);
        User::where('id', $dummy['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $dummy['id']]);

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
            '/api/Report',
            [
            'token' => $token,
            'name' => $post['id'],
            'content' => 'report a problem'
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
    //the owner of the comment to be reported
    public function ownerC()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
        $comment = factory(Comment::class)->create();

        $dummy = User::find($comment['commented_by']);
        Comment::where('id', $comment['id'])->update(['commented_by' => $user['id']]);

        User::where('id', $dummy['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $dummy['id']]);

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
            '/api/Report',
            [
            'token' => $token,
            'name' => $comment['id'],
            'content' => 'report a problem'
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
        Comment::where('id', $comment['id'])->delete();
        $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);
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
    //the owner of the post has the comment to be reported
    public function ownerPC()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
        $post = factory(Post::class)->create();
        $dummy = User::find($post['posted_by']);
        Post::where('id', $post['id'])->update(['posted_by' => $user['id']]);
        User::where('id', $dummy['id'])->forceDelete();
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
            'POST',
            '/api/Report',
            [
            'token' => $token,
            'name' => $comment['id'],
            'content' => 'report a problem'
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

        Comment::where('id', $comment['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $comment['id']]);

        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);

        User::where('id', $comment['commented_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $comment['commented_by']]);
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
    //moderator in the apexCom where the post has this comment
    public function modC()
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
            'POST',
            '/api/Report',
            [
            'token' => $token,
            'name' => $comment['id'],
            'content' => 'report a problem'
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

        Moderator::where('apexID', $post['apex_id'])->where('userID', $user['id'])->delete();
        Comment::where('id', $comment['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $comment['id']]);

        Post::where('id', $post['id'])->delete();
        $this->assertDatabaseMissing('posts', ['id' => $post['id']]);

        User::where('id', $post['posted_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $post['posted_by']]);

        User::where('id', $comment['commented_by'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $comment['commented_by']]);
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
