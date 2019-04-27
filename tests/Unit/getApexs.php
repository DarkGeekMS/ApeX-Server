<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use DB;
use \App\Models\User;
use App\Models\Block;

class GetApexcoms extends TestCase
{
    use WithFaker;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
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

        $response = $this->json(
            'POST',
            '/api/GetApexcoms',
            [
              'token' => $token
            ]
        );
        $response->assertStatus(200);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
              'token' => $token
            ]
        );
        // delete user added to database
        DB::table('users')->where('id', $user['id'])->delete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
