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
            'POST',
            '/api/SignUp',
            [
            'email' => 'sebak@gmail.com',
            'password' => '123456',
            'username' => 'sebak',
            ]
        );
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'sebak',
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json("token");
        $meResponse = $this->json(
            'POST',
            '/api/Me',
            [
            'token' => $token
            ]
        );
        $id = $meResponse->getData()->user->id;
        //to delete a user
        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteUser',
            [
            'token' => $token,
            'UserID' => $id,
            'passwordConfirmation'=>'123456'
            ]
        );
        $delResponse->assertStatus(200)->assertDontSee("token_error");
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
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
            'POST',
            '/api/SignIn',
            [
            'username' => 'king',
            'password' => 'queen12'
            ]
        );
        $token = $adminLoginResponse->json("token");
      //user to deleted
        $userSignupResponse = $this->json(
            'POST',
            '/api/SignUp',
            [
              'email' => 'sebak@gmail.com',
              'password' => '123456',
              'username' => 'sebak',
            ]
        );
        $userLoginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'sebak',
            'password' => '123456'
            ]
        );
        $userToken = $userLoginResponse->json("token");
        $meResponse = $this->json(
            'POST',
            '/api/Me',
            [
            'token' => $userToken
            ]
        );
        $id = $meResponse->getData()->user->id;

        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteUser',
            [
            'token' => $token,
            'UserID' => $id,
            'passwordConfirmation'=>'12'
            ]
        );
        $delResponse->assertStatus(200)->assertDontSee("token_error");
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }
}
