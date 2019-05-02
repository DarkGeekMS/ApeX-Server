<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\User;

class InvalidSignup2Test extends TestCase
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
        $duplicateSignup = $this->json(
            'POST',
            '/api/SignUp',
            [
            'email' => Str::random(15)."@gmail.com",
            'password' => '1234567',
            'username' => $username
            ]
        );
        $duplicateSignup->assertStatus(400);
        User::where('id', $user['id'])->forceDelete();
    }
}
