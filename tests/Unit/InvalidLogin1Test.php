<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\User;

class InvalidLogin1Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();
        $username = $user["username"];
        $email = $user["email"];

        $firstSignup = $this->json(
            'POST',
            '/api/SignUp',
            [
            'email' => $email,
            'password' => 'monda21',
            'username' => $username
            ]
        );
        $response = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $username,
            'password' => '12345678'
            ]
        );
        $response->assertStatus(400);
        User::where('id', $user['id'])->forceDelete();
    }
}
