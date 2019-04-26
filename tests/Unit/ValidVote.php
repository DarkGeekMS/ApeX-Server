<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ApexCom;

class ValidVote extends TestCase
{
     /**
      *
      * @test
      *
      * @return void
      */

    //new vote in a post
    public function newPost()
    {

        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_6',
            'dir' => 1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', ['postID' => 't3_6' , 'userID' => 't2_1' , 'dir' => 1]);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //reverse the vote direction for a post
    public function oppositeDirPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_6',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('votes', ['postID' => 't3_6' , 'userID' => 't2_1' , 'dir' => -1 ]);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //remove one's vote on a post
    public function sameDirPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't3_6',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('votes', ['postID' => 't3_5' , 'userID' => 't2_1']);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //new vote on a comment
    public function newComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_5',
            'dir' => 1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comment_votes', ['comID' => 't1_5' , 'userID' => 't2_1' , 'dir' => 1]);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //reverse the vote direction for a comment
    public function oppositeDirComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_5',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('comment_votes', ['comID' => 't1_5' , 'userID' => 't2_1' , 'dir' => -1]);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //remove one's vote on a comment
    public function sameDirComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/vote',
            [
            'token' => $token,
            'name' => 't1_5',
            'dir' => -1
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comment_votes', ['comID' => 't1_5' , 'userID' => 't2_1' ]);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }
}
