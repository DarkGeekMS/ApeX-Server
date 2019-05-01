<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ValidMail extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $response = $this->json(
            'POST',
            '/api/MailVerification',
            [
            'username' => $user["username"],
            'email' => $user["email"]
            ]
        );
        $response->assertStatus(200)->assertSee('Email sent successfully');
        User::where('id', $user['id'])->forceDelete();
    }
}
