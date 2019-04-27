<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class ValidAddMoerator extends TestCase
{
 /**
   *Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
    public function addModerator()
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
    //user to be added as a moderator
        $userLoginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => 'mondaTalaat',
              'password' => 'monda21'
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

    //creating a dummy apexcom
        $apexid='t5_1';               //id of an existing apexcom
        $addResponse = $this->json(
            'POST',
            '/api/AddModerator',
            [
              'token' => $token,
              'UserID' => $id,
              'ApexComID'=>$apexid
            ]
        );
        $addResponse->assertStatus(200)->assertDontSee("token_error");
    }
  /**
   *Test an admin remove a moderator from an apexcom
   * @test
   *
   * @return void
   */
    public function deleteModerator()
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
        $userLoginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => 'mondaTalaat',
              'password' => 'monda21'
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
        $apexid='t5_1';
        $delResponse = $this->json(
            'POST',
            '/api/AddModerator',
            [
              'token' => $token,
              'UserID' => $id,
              'ApexComID'=>$apexid
            ]
        );
        $delResponse->assertStatus(200)->assertDontSee("token_error");
    }
}
