<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidReport extends TestCase
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
            'username' => 'MondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_5',
            'content' => 'report a problem'
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
    //no post
    public function noPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_01',
            'content' => 'report a problem'
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
    //no comment
    public function noComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't1_01',
            'content' => 'report a problem'
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
    //no content
    public function noContent()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_1'
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
    // admin in the website
    public function adminUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_4',
            'content' => 'report a problem'
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
    //moderator in the apexcom holds the post or comment to be reported
    public function modUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_4',
            'content' => 'report a problem'
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
    //the owner of the post to be reported
    public function ownerP()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'kareem',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_7',
            'content' => 'report a problem'
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
    //the owner of the comment to be reported
    public function ownerC()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'kareem',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't1_10',
            'content' => 'report a problem'
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
    //the owner of the post has the comment to be reported
    public function ownerPC()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'kareem',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't1_8',
            'content' => 'report a problem'
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
    //moderator in the apexCom where the post has this comment
    public function modC()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't1_14',
            'content' => 'report a problem'
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

// done already before
    /**
     *
     * @test
     *
     * @return void
     */
       //moderator in apexcom not include the reported post
    public function reportPost()
    {
          $loginResponse = $this->json(
              'POST',
              '/api/sign_in',
              [
              'username' => 'Monda Talaat',
              'password' => 'monda21'
              ]
          );
          $token = $loginResponse->json('token');
          $response = $this->json(
              'POST',
              '/api/report',
              [
              'token' => $token,
              'name' => 't3_14',
              'content' => 'report user'
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
      //ordinary user report a comment
    public function reportComment()
    {
          $loginResponse = $this->json(
              'POST',
              '/api/sign_in',
              [
              'username' => 'Monda Talaat',
              'password' => 'monda21'
              ]
          );
          $token = $loginResponse->json('token');
          $response = $this->json(
              'POST',
              '/api/report',
              [
              'token' => $token,
              'name' => 't1_14',
              'content' => 'report user'
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
