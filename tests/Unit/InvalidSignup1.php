<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidSignup1 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json(
            'POST',
            '/api/sign_up',
            [
            'fullname' => 'mohamed ramzy',
            'email' => '1@gmail.com',
            'password' => '1234567',
            'password_confirmation' => '123456',
            'username' => 'Mohamed1'
            ]
        );
        $response->assertStatus(400);
    }
}
