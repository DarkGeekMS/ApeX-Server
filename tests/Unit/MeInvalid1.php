<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeInvalid1 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $meResponse = $this->json(
            'POST',
            '/api/me',
            [
            'token' => 'invalid token'
            ]
        );
        $meResponse->assertStatus(400)->assertSee("Not authorized");
    }
}
