<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

class ValidVoteTest extends TestCase
{

     /**
      *
      * @test
      *
      * @return void
      */

    public function PostVote()
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
            'dir' => 1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', ['postID' => $post['id'] , 'userID' => $user['id'] , 'dir' => 1]);

        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => $post['id'],
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', ['postID' => $post['id'] , 'userID' => $user['id'] , 'dir' => -1]);

        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => $post['id'],
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('votes', ['postID' => $post['id'] , 'userID' => $user['id']]);
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
    //new vote on a comment
    public function CommentVote()
    {
        $user = factory(User::class)->create();
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
            '/api/Vote',
            [
            'token' => $token,
            'name' => $comment['id'],
            'dir' => 1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comment_votes', ['comID' =>  $comment['id'] , 'userID' => $user['id'] , 'dir' => 1]);
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => $comment['id'],
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comment_votes', ['comID' =>  $comment['id'] , 'userID' => $user['id'] , 'dir' => -1]);
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => $comment['id'],
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comment_votes', ['comID' =>  $comment['id'] , 'userID' => $user['id'] ]);
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
}
