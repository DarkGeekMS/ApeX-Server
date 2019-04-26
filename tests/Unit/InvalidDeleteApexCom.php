<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class InvalidDeleteApexCom extends TestCase
{
    /**
   * ApexCom not found
   * @test
   *
   * @return void
   */
    public function noApexCom()
    {
    //login by an admin
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
              'username' => 'king',
              'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json("token");
        $delResponse = $this->json(
            'DELETE',
            '/api/del_apexCom',
            [
            'token' => $token,
            'Apex_ID' => 't3_1000'               //wrong Apex_ID
            ]
        );
        $delResponse->assertStatus(500)->assertSee("ApexCom doesnot exist");
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
              'token' => $token
            ]
        );
    }
 /**
   * User deletes an apexcom (not admin)
   * @test
   *
   * @return void
   */
    public function unautorizedDeletion()
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
     //creating a dummy apexcom
        $id='2';
        $name='m';
        $rules='none';
        $description='none';
        DB::table('apex_coms')-> insert(['id' => $id, 'name' =>$name,'rules'=>$rules,'description'=>$description]);
        $delResponse = $this->json(
            'DELETE',
            '/api/del_apexCom',
            [
              'token' => $token,
              'Apex_ID' => $id
            ]
        );
        $delResponse->assertStatus(300)->assertSee("Unauthorized access");
        DB::table('apex_coms')->where('id', '=', $id)->delete();
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
              'token' => $token
            ]
        );
    }
}
