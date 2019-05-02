<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ApexCom;

class ValidAddMoeratorTest extends TestCase
{
 /**
   * Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
    public function addModerator()
    {
      $user = factory(User::class)->create();
      $admin = factory(User::class)->create();
      User::where('id', $admin['id'])->update(['type' => 3]);
      $apexcom = factory(ApexCom::class)->create();

      $LoginResponse = $this->json(
          'POST',
          '/api/SignIn',
          [
          'username' => $admin['username'],
          'password' => 'monda21'
          ]
      );

      $LoginResponse ->assertStatus(200);

      $token = $LoginResponse ->json('token');
      $addResponse = $this->json(
          'POST',
          '/api/AddModerator',
          [
            'token' => $token,
            'UserID' => $user['id'],
            'ApexComID'=>$apexcom['id']
          ]
        );
      $addResponse->assertStatus(200)->assertDontSee("token_error");
      $this->assertDatabaseHas('moderators', ['apexID' => $apexcom['id'], 'userID' => $user['id']]);

      $deleteResponse = $this->json(
        'POST',
        '/api/AddModerator',
        [
          'token' => $token,
          'UserID' => $user['id'],
          'ApexComID'=>$apexcom['id']
        ]
      );
      $deleteResponse->assertStatus(200)->assertDontSee("token_error");
      $this->assertDatabaseMissing('moderators', ['apexID' => $apexcom['id'], 'userID' => $user['id']]);

      $logoutResponse = $this->json(
        'POST',
        '/api/SignOut',
        [
        'token' => $token
        ]
      );
      //delete user, admin and apexcom from the database
      ApexCom::where('id', $apexcom['id'])->delete();
      $this->assertDatabaseMissing('apex_coms', ['id' => $apexcom['id']]);

      User::where('id', $user['id'])->forceDelete();
      $this->assertDatabaseMissing('users', ['id' => $user['id']]);

      User::where('id', $admin['id'])->forceDelete();
      $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
    }
}
