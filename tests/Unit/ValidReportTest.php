<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class ValidReportTest extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
     //moderator in apexcom not include the reported post
    public function reportPost()
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
            'name' => $post['id'],
            'content' => 'report user'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('report_posts', ['postID' => $post['id'] , 'userID' => $user['id']]);
        $response = $this->json(
            'POST',
            '/api/Report',
            [
            'token' => $token,
            'name' => $post['id'],
            'content' => 'report user'
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
        DB::table('report_posts')->where('postID', $post['id'])->where('userID', $user['id'])->delete();
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
    //ordinary user report a comment
    public function reportComment()
    {
        $user = factory(User::class)->create();
        User::where('id', $user['id'])->update(['type' => 1]);
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
            'POST',
            '/api/Report',
            [
            'token' => $token,
            'name' => $comment['id'],
            'content' => 'report user'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('report_comments', ['comID' => $comment['id'] , 'userID' =>  $user['id']]);
        $response = $this->json(
            'POST',
            '/api/Report',
            [
            'token' => $token,
            'name' => $comment['id'],
            'content' => 'report user'
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
        DB::table('report_comments')->where('comID', $comment['id'])->where('userID', $user['id'])->delete();
        Comment::where('id', $comment['id'])->delete();
        $this->assertDatabaseMissing('comments', ['id' => $comment['id']]);
        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
