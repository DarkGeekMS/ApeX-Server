<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MeInvalid1Test extends TestCase
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
            '/api/Me',
            [
            'token' => 'invalid token'
            ]
        );
        $meResponse->assertStatus(400)->assertSee("Not authorized");
    }
}
