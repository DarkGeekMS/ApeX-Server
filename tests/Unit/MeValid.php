<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\User;

class MeValid extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $user["username"],
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $meResponse = $this->json(
            'POST',
            '/api/Me',
            [
            'token' => $token
            ]
        );
        $meResponse->json('token');
        $response1 = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
        $response1->assertStatus(200)->assertDontSee("token_error");
        User::where('id', $user['id'])->forceDelete();

    }
}
