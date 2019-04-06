<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidMail extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->json(
            'POST',
            '/api/mail_verify',
            [
            'username' => 'MohamedRamzy5',
            ]
        );
        $response->assertStatus(400)->assertSee('Username is not found');
    }
}
