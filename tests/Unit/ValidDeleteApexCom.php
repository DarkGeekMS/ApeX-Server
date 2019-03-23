<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class ValidDeleteApexCom extends TestCase
{ /**
    *Test deleting an apexcom by an admin
    * @test
    *
    * @return void
    */
     public function deleteApexCom()
     {
        //login by an admin
         $loginResponse = $this->json(
             'POST', '/api/Sign_in', [
             'username' => 'king',
             'password' => 'queen12'
             ]
         );
         $token = $loginResponse->json("token");
         //creating a dummy apexcom
         $id='1';
         $name='m';
         $rules='none';
         $description='none';
         DB::table('apex_coms')-> insert(['id' => $id, 'name' =>$name,'rules'=>$rules,'description'=>$description]);
         //to delete an apexcom 
         $delResponse = $this->json(
             'DELETE', '/api/del_ac', [
             'token' => $token,
             'Apex_ID' => $id             
             ]
         );
         $delResponse->assertStatus(200)->assertDontSee("token_error");
         DB::table('apex_coms')->where('id', '=', $id)->delete();
         
     }
}
