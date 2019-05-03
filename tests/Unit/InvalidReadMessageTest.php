<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Message;

class InvalidReadMessageTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function noMsg()
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
            '/api/ReadMessage',
            [
            'token' => $token,
            'ID' => '1000'      //fake id
            ]
        );
        $response->assertStatus(500)->assertSee("Message doesnot exist");
        //delete user from database
        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }

    /**
     * @test
     *
     * @return void
     */
    public function unauthorizedAccess()
    {
        $user = factory(User::class)->create();
        $sender = factory(User::class)->create();
        $receiver = factory(User::class)->create();
        $msg = factory(Message::class)->create();
        Message::where('id', $msg['id'])->update(['sender' => $sender['id'],'receiver' => $receiver['id']]);
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
            '/api/ReadMessage',
            [
            'token' => $token,
            'ID' => $msg['id']
            ]
        );
        $response->assertStatus(300)->assertSee("Message doesnot belong to the user");
        //delete message and users from database
        Message::where('id', $msg['id'])->delete();
        $this->assertDatabaseMissing('messages', ['id' => $msg['id']]);

        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);

        User::where('id', $sender['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $sender['id']]);

        User::where('id', $receiver['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $receiver['id']]);
    }
}
