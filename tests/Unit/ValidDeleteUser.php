<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidDeleteUser extends TestCase
{
 /**
   *Test a user deletes his account (Deactivate)
   * @test
   *
   * @return void
   */
    public function Deactivate()
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
        $meResponse = $this->json(
            'POST','/api/me',[
            'token' => $token
            ]
        );
        $id = $meResponse->getData()->user->id;
        //to delete a user 
        $delResponse = $this->json(
            'DELETE', '/api/del_user', [
            'token' => $token,
            'UserID' => $id  
            ]
        );
        $delResponse->assertStatus(200)->assertDontSee("token_error");
        
    }
    
 /**
   *Test an admin delete an existing user
   * @test
   *
   * @return void
   */
  public function AdminDelete()
  { 
      //sign in with an admin account
      $adminLoginResponse = $this->json(
          'POST', '/api/Sign_in', [
          'username' => 'king',
          'password' => 'queen12'
          ]
      );
      $token = $adminLoginResponse->json("token");
      //user to deleted
      $userSignupResponse = $this->json(
        'POST', '/api/sign_up', [
        'email' => 'sebak@gmail.com',
        'password' => '123456',
        'username' => 'sebak',
        ]
    );
    $userLoginResponse = $this->json(
        'POST', '/api/Sign_in', [
        'username' => 'sebak',
        'password' => '123456'
        ]
    );
    $userToken = $userLoginResponse->json("token");
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
    $delResponse->assertStatus(200)->assertDontSee("token_error");
      
  }
  
    
}
