<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class InvalidSignup1 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $email = Str::random(15)."@gmail.com";
        $username = Str::random(15);
        $firstSignup = $this->json(
            'POST',
            '/api/SignUp',
            [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );
        $duplicateSignup = $this->json(
            'POST',
            '/api/SignUp',
            [
            'email' => $email,
            'password' => '1234567',
            'username' => Str::random(15)
            ]
        );
        $duplicateSignup->assertStatus(400);
    }
}
