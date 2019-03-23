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
            'POST', '/api/Sign_in', [
            'username' => 'sebak',
            'password' => '123456'         
            ]
        );
        $token = $loginResponse->json("token");
        //to unsave a saved post
        $saveResponse = $this->json(
            'POST', '/api/save', [
            'token' => $token,
            'ID' => '99'              //fake id
            ]
        );
        $saveResponse->assertStatus(500);
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
        'POST', '/api/Sign_in', [
        'username' => 'sebak',
        'password' => '123'         //wrong password
        ]
    );
    $token = $loginResponse->json("token");
    //to unsave a saved post
    $saveResponse = $this->json(
        'POST', '/api/save', [
        'token' => $token,
        'ID' => 't3_1'              //id of an existing post 
        ]
    );
    $saveResponse->assertStatus(400);
  }
}
