<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidMail extends TestCase
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
            'username' => 'MohamedRamzy',
            ]
        );
        $response->assertStatus(200)->assertSee('Email sent successfully');    
    }
}
