<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class InvalidDeleteUser extends TestCase
{
 /**
   * User not found
   * @test
   *
   * @return void
   */
    public function noUser()
    {
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
            '/api/DeleteUser',
            [
              'token' => $token,
              'UserID' => 't3_1000',               //wrong UserID
              'passwordConfirmation'=>'123456'
            ]
        );
        $delResponse->assertStatus(500)->assertSee("User doesnot exist");
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
              'token' => $token
            ]
        );
        User::where('id', $admin['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
    }
   /**
   * User deletes another user
   * @test
   *
   * @return void
   */
    public function unauthorizedDeletion()
    {
        //user that tries to perfom the deletion
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

        $user = factory(User::class)->create();

        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteUser',
            [
              'token' => $token,
              'UserID' => $user['id'],
              'passwordConfirmation'=>'123456'
            ]
        );
        $delResponse->assertStatus(300)->assertSee("UnAuthorized Deletion");
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
              'token' => $token
            ]
        );

        User::where('id', $user['id'])->orwhere('id', $admin['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $admin['id']]);
    }
  /**
   * User enters a wrong password
   * @test
   *
   * @return void
   */
    public function wrongPassword()
    {

      //user to be deletes his account
        $user = factory(User::class)->create();

        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');
        $delResponse = $this->json(
            'DELETE',
            '/api/DeleteUser',
            [
            'token' => $token,
            'UserID' => $user['id'],
            'passwordConfirmation'=>'123456'
            ]
        );
        $delResponse->assertStatus(501)->assertSee("Wrong password entered");
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
              'token' => $token
            ]
        );
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
