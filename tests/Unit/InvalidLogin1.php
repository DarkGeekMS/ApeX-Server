<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class InvalidLogin1 extends TestCase
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
            'POST', '/api/sign_up', [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );
        $response = $this->json(
            'POST', '/api/Sign_in', [
            'username' => $username,
            'password' => '12345678'
            ]
        );
        $response->assertStatus(400); 
    }
}
