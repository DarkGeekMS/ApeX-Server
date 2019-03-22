<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class ValidLogin extends TestCase
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
            '/api/sign_up',
            [
            'email' => $email,
            'password' => 'monda21',
            'username' => 'Monda Talaat'
            ]
        );
        $response = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $response->assertStatus(200);
        $token = $response->json('token');
        $response1 = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
        $response1->assertStatus(200);
    }
}
