<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class validchangepass1 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();
        $username = $user["username"];
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $username,
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $changeRequest = $this->json(
            'PATCH',
            '/api/ChangePassword',
            [
            'token' => $token,
            'withCode' => '0',
            'password' => '123456',
            'key' => 'monda21',
            'username' => $username
            ]
        );
        $changeRequest->assertStatus(200);
        User::where('id', $user['id'])->forceDelete();
    }
}
