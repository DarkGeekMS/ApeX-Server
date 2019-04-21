<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class invalidchangepass2 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $username = "Monda Talaat";
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => $username,
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json()["token"];
        $changeRequest = $this->json(
            'PATCH',
            '/api/changepassword',
            [
            'token' => $token,
            'withCode' => '0',
            'password' => '123456',
            'key' => 'bla bla bla',
            'username' => $username
            ]
        );
        $changeRequest->assertStatus(400);
    }
}
