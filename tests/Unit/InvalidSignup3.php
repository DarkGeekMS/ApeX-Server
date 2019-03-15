<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidSignup3 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json(
            'POST', '/api/sign_up', [
            'fullname' => 'mohamed ramzy',
            'email' => '2@gmail.com',
            'password' => '1234567',
            'password_confirmation' => '1234567',
            'username' => 'Mohamed1'
            ]
        );
        $response->assertStatus(400);
    }
}
