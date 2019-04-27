<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
        $admin = factory(User::class)->create();
        User::where('id', $admin['id'])->update(['type' => 3]);

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
              'username' => $admin['username'],
              'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);
        $token = $signIn->json('token');
        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteApexcom',
            [
            'token' => $token,
            'Apex_ID' => 't3_1000'               //wrong Apex_ID
            ]
        );
        $delResponse->assertStatus(500)->assertSee("ApexCom doesnot exist");
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
              'token' => $token
            ]
        );
        DB::table('users')->where('id', $admin['id'])->delete();
    }
 /**
   * User deletes an apexcom (not admin)
   * @test
   *
   * @return void
   */
    public function unautorizedDeletion()
    {
        $admin = factory(User::class)->create();
        User::where('id', $admin['id'])->update(['type' => 1]);
        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $admin['username'],
            'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);
        $token = $signIn->json('token');
     //creating a dummy apexcom
        $id='2';
        $name='m';
        $rules='none';
        $description='none';
        DB::table('apex_coms')-> insert(['id' => $id, 'name' =>$name,'rules'=>$rules,'description'=>$description]);
        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteApexcom',
            [
              'token' => $token,
              'Apex_ID' => $id
            ]
        );
        $delResponse->assertStatus(300)->assertSee("Unauthorized access");
        DB::table('apex_coms')->where('id', '=', $id)->delete();
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
              'token' => $token
            ]
        );
        DB::table('users')->where('id', $admin['id'])->delete();
    }
}
