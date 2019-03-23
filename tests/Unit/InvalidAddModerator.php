<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class InvalidAddMoerator extends TestCase
{
 /**
   *Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
  public function noUser()
  { 
      //sign in with an admin account
      $adminLoginResponse = $this->json(
        'POST', '/api/Sign_in', [
        'username' => 'king',
        'password' => 'queen12'
        ]
    );
    $token = $adminLoginResponse->json("token");

    //creating a dummy apexcom
    $apexid='100';
    $name='m';
    $rules='none';
    $description='none';
    DB::table('apex_coms')-> insert(['id' => $apexid, 'name' =>$name,'rules'=>$rules,'description'=>$description]);

    $addResponse = $this->json(
        'POST', '/api/add_mod', [
        'token' => $token,
        'UserID' => '1000',             //wrong id
        'ApexComID'=>$apexid 
        ]
    );
    $addResponse->assertStatus(403)->assertDontSee("token_error");
    DB::table('apex_coms')->where('id', '=', $apexid)->delete();  
  }
  /**
   *Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
  public function noApexCom()
  { 
      //sign in with an admin account
      $adminLoginResponse = $this->json(
          'POST', '/api/Sign_in', [
          'username' => 'king',
          'password' => 'queen12'
          ]
      );
      $token = $adminLoginResponse->json("token");
      //user to be added as a moderator
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
    

    $addResponse = $this->json(
        'POST', '/api/add_mod', [
        'token' => $token,
        'UserID' => $id,
        'ApexComID'=>'1000'         //wron apexid
        ]
    );
    $addResponse->assertStatus(404)->assertDontSee("token_error");
      
  }
  /**
   *Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
  public function UnauthorizedAdd()
  { 
      //sign in with a non-admin account
      $adminLoginResponse = $this->json(
          'POST', '/api/Sign_in', [
          'username' => 'Monda Talaat',
          'password' => 'monda21'
          ]
      );
      $token = $adminLoginResponse->json("token");
      //user to be added as a moderator
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
    
    //creating a dummy apexcom
    $apexid='100';
    $name='m';
    $rules='none';
    $description='none';
    DB::table('apex_coms')-> insert(['id' => $apexid, 'name' =>$name,'rules'=>$rules,'description'=>$description]);

    $addResponse = $this->json(
        'POST', '/api/add_mod', [
        'token' => $token,
        'UserID' => $id,
        'ApexComID'=>$apexid 
        ]
    );
    $addResponse->assertStatus(500)->assertDontSee("token_error");
    DB::table('apex_coms')->where('id', '=', $apexid)->delete();  

      
  }
}
