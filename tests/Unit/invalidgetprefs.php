<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class invalidgetprefs extends TestCase
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
        $token = "bla bla";
        $prefsResponse = $this->json(
            'POST',
            '/api/GetPreferences',
            [
            'token' => $token
            ]
        );
        User::where('id', $user['id'])->forceDelete();
        $prefsResponse->assertStatus(400);
    }
}
