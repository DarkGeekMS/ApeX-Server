<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidLogoutTest extends TestCase
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
            '/api/SignOut',
            [
            'token' => "invalid token"
            ]
        );
        $logoutResponse->assertStatus(400)->assertSeeText("Not authorized");
    }
}
