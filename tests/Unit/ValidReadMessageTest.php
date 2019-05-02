<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Message;

class ValidReadMessageTest extends TestCase
{
    /**
     * @test
     *
     * @return void
     */
    public function senderReadMsg()
    {
        $user = factory(User::class)->create();
        $msg = factory(Message::class)->create();
        Message::where('id', $msg['id'])->update(['sender' => $user['id']]);
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
        $response->assertStatus(200);
        //delete message and user from database
        Message::where('id', $msg['id'])->delete();
        $this->assertDatabaseMissing('messages', ['id' => $msg['id']]);

        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
    /**
     * @test
     *
     * @return void
     */
    public function receiverReadMsg()
    {
        $user = factory(User::class)->create();
        $msg = factory(Message::class)->create();
        Message::where('id', $msg['id'])->update(['receiver' => $user['id']]);
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
        $response->assertStatus(200);
        //delete message and user from database
        Message::where('id', $msg['id'])->delete();
        $this->assertDatabaseMissing('messages', ['id' => $msg['id']]);

        User::where('id', $user['id'])->forceDelete();
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
