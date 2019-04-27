<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidSave extends TestCase
{
 /**
   *
   * @test
   *
   * @return void
   */
    public function noPostOrComnent()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json("token");
        //to unsave a saved post
        $saveResponse = $this->json(
            'POST',
            '/api/Save',
            [
            'token' => $token,
            'ID' => '99'              //fake id
            ]
        );
        $saveResponse->assertStatus(404);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
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
    public function noUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'sebak',
            'password' => '123'         //wrong password
            ]
        );
        $token = $loginResponse->json("token");
    //to unsave a saved post
        $saveResponse = $this->json(
            'POST',
            '/api/Save',
            [
              'token' => $token,
              'ID' => 't3_1'              //id of an existing post
            ]
        );
          $saveResponse->assertStatus(400);
          $logoutResponse = $this->json(
              'POST',
              '/api/SignOut',
              [
              'token' => $token
              ]
          );
    }
}
