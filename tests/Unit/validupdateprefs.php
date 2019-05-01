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
        $newname = "Remonda Talaat";
        $newemail = "zezsso@gmail.com";
        $newnot = 0;
        $updateprefs = $this->json(
            'POST',
            '/api/UpdatePreferences',
            [
            'username' => "zozo",
            'fullname' => $newname,
            'email' => $newemail,
            'notification' => $newnot,
            'token' => $token
            ]
        );
        $newuser = User::where("id", $user["id"])->first();
        User::where('id', $user['id'])->forceDelete();
        $this->assertTrue($newuser->username == "zozo");
        $this->assertTrue($newuser->email == $newemail);
        $this->assertTrue($newuser->notification == $newnot);
        $this->assertTrue($newuser->fullname == $newname);

        $updateprefs->assertStatus(200);

    }
}
