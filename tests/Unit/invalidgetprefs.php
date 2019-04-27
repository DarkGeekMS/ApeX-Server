<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class invalidgetprefs extends TestCase
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
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = "bla bla";
        $prefsResponse = $this->json(
            'POST',
            '/api/GetPreferences',
            [
            'token' => $token
            ]
        );
        $prefsResponse->assertStatus(400);
    }
}
