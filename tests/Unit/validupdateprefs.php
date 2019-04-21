<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;

class validupdateprefs extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $username = "Monda";
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => $username,
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $newname = "Remonda Talaat";
        $newemail = "mondatalaat@gmail.com";
        $newnot = 0;
        $updateprefs = $this->json(
            'POST',
            '/api/updateprefs',
            [
            'username' => $username,
            'fullname' => $newname,
            'email' => $newemail,
            'notification' => $newnot,
            'token' => $token
            ]
        );
        $user = User::where("username", $username)->first();
        $this->assertTrue($user->username == $username);
        $this->assertTrue($user->email == $newemail);
        $this->assertTrue($user->notification == $newnot);
        $this->assertTrue($user->fullname == $newname);
        $updateprefs->assertStatus(200);
    }
}
