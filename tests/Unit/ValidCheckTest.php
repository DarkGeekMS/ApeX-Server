<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use app\Models\Code;
use App\Models\User;

class ValidCheckTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();
        $username =  $user["username"];
        $response = $this->json(
            'POST',
            '/api/MailVerification',
            [
            'username' => $username,
            'email' => $user["email"]
            ]
        );
        $id = User::where('username', $username)->first()->id;
        $code = Code::where('id', $id)->first()->code;
        $response = $this->json(
            'POST',
            '/api/CheckCode',
            [
            'email' => $user["email"],
            'code' => $code
            ]
        );
        $response->assertStatus(200);
        User::where('id', $user['id'])->forceDelete();
    }
}
