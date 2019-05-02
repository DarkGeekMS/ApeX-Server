<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\User;

class ValidLoginTest extends TestCase
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
            '/api/SignIn',
            [
            'username' => $user["username"],
            'password' => 'monda21'
            ]
        );
        $response->assertStatus(200);
        $token = $response->json('token');
        $response1 = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        $response1->assertStatus(200);
        User::where('id', $user['id'])->forceDelete();
    }
}
