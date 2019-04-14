<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SaveValid extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
    public function saveComment()
    {
        $SignupResponse = $this->json(
            'POST',
            '/api/sign_up',
            [
            'email' => 'sebak@gmail.com',
            'password' => '123456',
            'username' => 'sebak',
            ]
        );
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'sebak',
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json()["token"];
        //to save a comment
        $saveResponse = $this->json(
            'POST',
            '/api/save',
            [
            'token' => $token,
            'ID' => 't1_10' //id of an existing comment
            ]
        );
        $saveResponse->assertStatus(200)->assertDontSee("token_error");
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
    public function unsaveComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'sebak',
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json()["token"];
        //to unsave a saved comment
        $saveResponse = $this->json(
            'POST',
            '/api/save',
            [
            'token' => $token,
            'ID' => 't1_10' //id of an existing comment
            ]
        );
        $saveResponse->assertStatus(200)->assertDontSee("token_error");
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
    public function savePost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'sebak',
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json()["token"];
        //to save a post
        $saveResponse = $this->json(
            'POST',
            '/api/save',
            [
            'token' => $token,
            'ID' => 't3_10' //id of an existing post
            ]
        );
        $saveResponse->assertStatus(200)->assertDontSee("token_error");
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
    public function unsavePost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'sebak',
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json()["token"];
        //to unsave a saved post
        $saveResponse = $this->json(
            'POST',
            '/api/save',
            [
            'token' => $token,
            'ID' => 't3_10' //id of an existing post
            ]
        );
        $saveResponse->assertStatus(200)->assertDontSee("token_error");
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }
}
