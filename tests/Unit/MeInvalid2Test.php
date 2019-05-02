<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use JWTAuth;

class MeInvalid2Test extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $dummyUser = new User;
        $dummyUser->fullname = "Adel shakal";
        $dummyUser->email = "na7o@gmail.com";
        $dummyUser->password = Hash::make("hantykanty");
        $dummyUser->avatar = "default";

        $token = JWTAuth::fromUser($dummyUser);
        $meResponse = $this->json(
            'POST',
            '/api/Me',
            [
            'token' => $token
            ]
        );
        $meResponse->assertStatus(404)->assertSeeText("user_not_found");
    }
}
