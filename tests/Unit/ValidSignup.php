<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class ValidSignup extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSignup()
    {
        $response = $this->json(
            'POST',
            '/api/sign_up',
            [
            'fullname' => 'mohamed ramzy',
            'email' => Str::random(15)."@gmail.com",
            'password' => '1234567',
            'password_confirmation' => '1234567',
            'username' => Str::random(15),
            ]
        );
        $response->assertStatus(200);
    }
}
