<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class invalidchangepass1 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $username = "mondaTalaat";
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $username,
            'password' => '123456'
            ]
        );
        $token = $loginResponse->json()["token"];
        $changeRequest = $this->json(
            'PATCH',
            '/api/ChangePassword',
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
