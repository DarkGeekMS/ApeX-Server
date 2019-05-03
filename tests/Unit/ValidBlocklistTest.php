<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class ValidBlocklistTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function blocklist()
    {

        $user = factory(User::class)->create();
        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user['username'],
            'password' => 'monda21'
            ]
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');

        $response = $this->json(
            'POST',
            '/api/BlockList',
            [
            'token' => $token,
            ]
        );
        $response->assertStatus(200)->assertDontSee("token error");
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
