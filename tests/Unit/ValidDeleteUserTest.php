<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ValidDeleteUserTest extends TestCase
{
 /**
   * Test a user deletes his account (Deactivate)
   * @test
   *
   * @return void
   */
    public function Deactivate()
    {
        $user = factory(User::class)->create();
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );
        $loginResponse->assertStatus(200);
        $token = $loginResponse->json("token");

        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteUser',
            [
            'token' => $token,
            'UserID' => $user['id'],
            'passwordConfirmation'=>'monda21'
            ]
        );
        $delResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertSoftDeleted('users', ['id' => $user['id']]);
    }

 /**
   * Test an admin delete an existing user
   * @test
   *
   * @return void
   */
    public function AdminDelete()
    {
        $user = factory(User::class)->create();
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

        $loginResponse->assertStatus(200);
        $token = $loginResponse->json("token");
        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteUser',
            [
            'token' => $token,
            'UserID' => $user['id'],
            'passwordConfirmation'=>'monda21'
            ]
        );
        $delResponse->assertStatus(200)->assertDontSee("token_error");
        $this->assertSoftDeleted('users', ['id' => $user['id']]);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        //delete user from the database
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);

        //delete admin from the database
        User::where('id', $admin['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
    }
}
