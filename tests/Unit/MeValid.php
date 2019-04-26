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
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
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
        $meResponse->json('token');
        $response1 = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
        $response1->assertStatus(200)->assertDontSee("token_error");
    }
}
