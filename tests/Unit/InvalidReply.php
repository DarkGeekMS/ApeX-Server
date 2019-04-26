<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidReply extends TestCase
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
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => '1561998'
            ]
        );
        $t = $loginResponse->json('token');
        $loginResponse->assertStatus(400);
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $t,
            'parent' => 't1_5'
            ]
        );
        $response->assertStatus(400);
    }

  /**
    *
    * @test
    *
    * @return void
    */
    public function noPost()
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
         $loginResponse->assertStatus(200);
         $response = $this->json(
             'POST',
             '/api/comment',
             [
             'token' => $token,
             'parent' => 't3_001',
             'content' => ' reply to message '
             ]
         );
         $response->assertStatus(404);
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

    public function noComment()
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
         $loginResponse->assertStatus(200);
         $response = $this->json(
             'POST',
             '/api/comment',
             [
             'token' => $token,
             'parent' => 't1_01',
             'content' => ' reply to message '
             ]
         );
         $response->assertStatus(404);
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

    public function noMessage()
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
         $loginResponse->assertStatus(200);
         $response = $this->json(
             'POST',
             '/api/comment',
             [
             'token' => $token,
             'parent' => 't4_01',
             'content' => ' reply to message '
             ]
         );
         $response->assertStatus(404);
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

    public function noContent()
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
         $loginResponse->assertStatus(200);
         $response = $this->json(
             'POST',
             '/api/comment',
             [
             'token' => $token,
             'parent' => 't1_10'
             ]
         );
         $response->assertStatus(400);
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
    public function lockedPost1()
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
         $loginResponse->assertStatus(200);
         $response = $this->json(
             'POST',
             '/api/comment',
             [
             'token' => $token,
             'parent' => 't3_8',
             'content' => ' reply to locked post '
             ]
         );
         $response->assertStatus(400);
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
    public function lockedPost2()
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
         $loginResponse->assertStatus(200);
         $response = $this->json(
             'POST',
             '/api/comment',
             [
             'token' => $token,
             'parent' => 't3_8',
             'content' => ' reply to locked post'
             ]
         );
         $response->assertStatus(400);
         $logoutResponse = $this->json(
             'POST',
             '/api/sign_out',
             [
             'token' => $token
             ]
         );
    }
}
