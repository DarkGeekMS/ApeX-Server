<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

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
        $token = $loginResponse->json("token");
        
        $delResponse = $this->json(
            'DELETE',
            '/api/del_user',
            [
              'token' => $token,
              'UserID' => 't3_1000',               //wrong UserID
              'passwordConfirmation'=>'123456'
            ]
        );
        $delResponse->assertStatus(500)->assertSee("User doesnot exist");
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
              'token' => $token
            ]
        );
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
          'POST',
          '/api/sign_in',
          [
            'username' => 'sebak',
            'password' => '123456'
          ]
      );
      $token = $loginResponse->json("token");
      //user to be deleted
      $userSignupResponse = $this->json(
          'POST',
          '/api/sign_up',
          [
            'email' => 'mahmoud@gmail.com',
            'password' => '22011998',
            'username' => 'mahmoud',
          ]
      );
      $userLoginResponse = $this->json(
          'POST',
          '/api/sign_in',
          [
            'username' => 'mahmoud',
            'password' => '22011998'
          ]
      );
      $userToken = $userLoginResponse->json()["token"];
      $meResponse = $this->json(
          'POST',
          '/api/me',
          [
            'token' => $userToken
          ]
      );
      $id = $meResponse->getData()->user->id;

      $delResponse = $this->json(
          'DELETE',
          '/api/del_user',
          [
            'token' => $token,
            'UserID' => $id,
            'passwordConfirmation'=>'123456'
          ]
      );
      $delResponse->assertStatus(300)->assertSee("UnAuthorized Deletion");
      DB::table('users')->where('username', '=', 'sebak')->delete();
      DB::table('users')->where('id', '=', $id)->delete();
  }
  /**
   * User enters a wrong password
   * @test
   *
   * @return void
   */
  public function wrongPassword()
  {
  
      //user to be deletes his account
      $userSignupResponse = $this->json(
          'POST',
          '/api/sign_up',
          [
            'email' => 'mahmoud@gmail.com',
            'password' => '22011998',
            'username' => 'mahmoud',
          ]
      );
      $userLoginResponse = $this->json(
          'POST',
          '/api/sign_in',
          [
            'username' => 'mahmoud',
            'password' => '22011998'
          ]
      );
      $userToken = $userLoginResponse->json()["token"];
      $meResponse = $this->json(
          'POST',
          '/api/me',
          [
            'token' => $userToken
          ]
      );
      $id = $meResponse->getData()->user->id;

      $delResponse = $this->json(
          'DELETE',
          '/api/del_user',
          [
            'token' => $userToken,
            'UserID' => $id,
            'passwordConfirmation'=>'123456'
          ]
      );
      $delResponse->assertStatus(501)->assertSee("Wrong password entered");
      DB::table('users')->where('id', '=', $id)->delete();
  }
    
}
