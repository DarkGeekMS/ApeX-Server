<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use DB;

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
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST',
            '/api/SignUp',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        $token = $signUp->json('token');

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
        DB::table('users')->where('email', $email)->delete();
    }
}
