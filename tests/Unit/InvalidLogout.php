<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidLogout extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => "invalid token"
            ]
        );
        $logoutResponse->assertStatus(400)->assertSeeText("Not authorized");
    }
}
