<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ApexCom;

class ValidDeleteApexCom extends TestCase
{
  /**
    * Test deleting an apexcom by an admin
    * @test
    *
    * @return void
    */
    public function deleteApexCom()
    {
        $admin = factory(User::class)->create();
        User::where('id', $admin['id'])->update(['type' => 3]);
         $loginResponse = $this->json(
             'POST',
             '/api/SignIn',
             [
             'username' => $admin['username'],
             'password' => 'monda21'
             ]
         );
         $token = $loginResponse->json("token");
         $apexcom = factory(ApexCom::class)->create();
         $delResponse = $this->json(
             'DELETE',
             '/api/DeleteApexcom',
             [
             'token' => $token,
             'Apex_ID' => $apexcom['id']
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
         ApexCom::where('id', $apexcom['id'])->delete();
         $this->assertDatabaseMissing('apex_coms', ['id' => $apexcom['id']]);

         User::where('id', $admin['id'])->forceDelete();
         $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
    }
}
