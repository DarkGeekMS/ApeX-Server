<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\User;

class InvalidSignup3 extends TestCase
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
        
        $duplicateSignup = $this->json(
            'POST',
            '/api/SignUp',
            [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );
        $duplicateSignup->assertStatus(400);
        User::where('id', $user['id'])->forceDelete();
    }
}
