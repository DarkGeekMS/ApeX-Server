<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Code;
use App\Models\User;

class validchangepass2 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $username = "mondaTalaat";
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => $username,
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $resetMail = $this->json(
            'POST',
            '/api/MailVerification',
            [
                'username' => $username
            ]
        );
        $user = User::where("username", $username)->first();
        $code = Code::where("id", $user->id)->first()->code;
        $changeRequest = $this->json(
            'PATCH',
            '/api/ChangePassword',
            [
            'token' => $token,
            'withCode' => '1',
            'password' => '123456',
            'key' => $code,
            'username' => $username
            ]
        );
        $changeRequest->assertStatus(200);
    }
}
