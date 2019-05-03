<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\ApexCom;

class InvalidAddMoeratorTest extends TestCase
{
 /**
   * Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
    public function noUser()
    {
      //sign in with an admin account
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

      $apexcom = factory(ApexCom::class)->create();
      $addResponse = $this->json(
          'POST',
          '/api/AddModerator',
          [
            'token' => $token,
            'UserID' => '1000',             //wrong id
            'ApexComID'=>$apexcom['id']
          ]
      );
      $addResponse->assertStatus(403)->assertDontSee("token_error");
      $logoutResponse = $this->json(
          'POST',
          '/api/SignOut',
          [
            'token' => $token
          ]
      );
      //delete admin and apexcom from the database
      User::where('id', $admin['id'])->forceDelete();
      $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
      
      ApexCom::where('id', $apexcom['id'])->delete();
      $this->assertDatabaseMissing('apex_coms', ['id' => $apexcom['id']]);
    }
  /**
   * Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
    public function noApexCom()
    {
      //sign in with an admin account
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
      //user to be added as a moderator
      $user = factory(User::class)->create();

      $addResponse = $this->json(
          'POST',
          '/api/AddModerator',
          [
            'token' => $token,
            'UserID' => $user['id'],
            'ApexComID'=>'1000'         //wrong apexid
          ]
      );

      $addResponse->assertStatus(404)->assertDontSee("token_error");
      $logoutResponse = $this->json(
          'POST',
          '/api/SignOut',
          [
            'token' => $token
          ]
      );
      //delete user and admin from the database
      User::where('id', $user['id'])->forceDelete();
      $this->assertDatabaseMissing('users', ['id' => $user['id']]);

      User::where('id', $admin['id'])->forceDelete();
      $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
    }
  /**
   * Test an admin add a moderator to an apexcom
   * @test
   *
   * @return void
   */
    public function unauthorizedAdd()
    {
      //sign in with a non-admin account
      $admin = factory(User::class)->create();
      User::where('id', $admin['id'])->update(['type' => 2]);

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
      //user to be added as a moderator
      $user = factory(User::class)->create();

      $apexcom = factory(ApexCom::class)->create();

      $addResponse = $this->json(
          'POST',
          '/api/AddModerator',
          [
            'token' => $token,
            'UserID' => $user['id'],
            'ApexComID'=>$apexcom['id']
          ]
      );
      $addResponse->assertStatus(500)->assertDontSee("token_error");
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
