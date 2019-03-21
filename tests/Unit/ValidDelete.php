<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidDelete extends TestCase
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
         $loginResponse = $this->json(
             'POST',
             '/api/Sign_in',
             [
             'username' => 'mX',
             'password' => 'killa$&12'
             ]
         );
         $token = $loginResponse->json()["token"];
         $response = $this->json(
             'POST',
             '/api/delete',
             [
             'token' => $token,
             'name' => 't1_1'
             ]
         );
         $response->assertStatus(200);
         $this->assertDatabaseMissing('comments', ['id' => 't1_1']);
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
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'mX',
            'password' => 'killa$&12'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't3_1'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => 't3_1']);
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
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Anyone',
            'password' => 'anyone'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't1_2'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => 't1_2']);
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
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't3_2'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => 't3_2']);
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
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't1_3'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => 't1_3']);
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

        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't1_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('comments', ['id' => 't1_4']);
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

        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't3_3'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('posts', ['id' => 't3_3']);
    }
}
