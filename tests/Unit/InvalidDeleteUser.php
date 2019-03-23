<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidDeleteUser extends TestCase
{
 /**
   * User not found
   * @test
   *
   * @return void
   */
  public function noUser()
  {
    $SignupResponse = $this->json(
        'POST', '/api/sign_up', [
        'email' => 'sebak@gmail.com',
        'password' => '123456',
        'username' => 'sebak',
        ]
    );
    $loginResponse = $this->json(
        'POST', '/api/Sign_in', [
        'username' => 'sebak',
        'password' => '123456'        
        ]
    );
    $token = $loginResponse->json("token");
    //to unsave a saved post
    $delResponse = $this->json(
        'DELETE', '/api/del_user', [
        'token' => $token,
        'UserID' => 't3_1000'               //wrong UserID
        ]
    );
    $delResponse->assertStatus(500)->assertSee("User doesnot exist");
  }
   /**
   * User deletes another user
   * @test
   *
   * @return void
   */
  public function unauthorizedDeletion()
  {
    //user that tries to perfom the deletion
    $loginResponse = $this->json(
        'POST', '/api/Sign_in', [
        'username' => 'sebak',
        'password' => '123456'         
        ]
    );
    $token = $loginResponse->json("token");
    //user to be deleted
    $userSignupResponse = $this->json(
        'POST', '/api/sign_up', [
        'email' => 'mahmoud@gmail.com',
        'password' => '22011998',
        'username' => 'mahmoud',
        ]
    );
    $userLoginResponse = $this->json(
        'POST', '/api/Sign_in', [
        'username' => 'mahmoud',
        'password' => '22011998'
        ]
    );
    $userToken = $userLoginResponse->json()["token"];
    $meResponse = $this->json(
        'POST','/api/me',[
        'token' => $userToken
        ]
    );
    $id = $meResponse->getData()->user->id;

    $delResponse = $this->json(
        'DELETE', '/api/del_user', [
        'token' => $token,
        'UserID' => $id              
        ]
    );
    $delResponse->assertStatus(300)->assertSee("UnAuthorized Deletion");
  }
   
}
