<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class MeValid extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
  /*      $email = "test@gmail.com";
        $username = 'mondaa';
        $firstSignup = $this->json(
            'POST',
            '/api/sign_up',
            [
            'email' => $email,
            'password' => 'monda21',
            'username' => $username
            ]
        );*/
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $meResponse = $this->json(
            'POST',
            '/api/me',
            [
            'token' => $token
            ]
        );
        $meResponse->assertStatus(200);
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
