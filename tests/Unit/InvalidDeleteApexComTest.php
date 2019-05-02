<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ApexCom;

class InvalidDeleteApexComTest extends TestCase
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
      User::where('id', $admin['id'])->forceDelete();
      $this->assertDatabaseMissing('users', ['id' => $admin['id']]);;
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
        $apexcom = factory(ApexCom::class)->create();
        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteApexcom',
            [
              'token' => $token,
              'Apex_ID' => $apexcom['id']
            ]
        );
        $delResponse->assertStatus(300)->assertSee("Unauthorized access");
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
