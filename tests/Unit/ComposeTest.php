<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Message;
use App\Models\User;
use App\Models\Block;
use Illuminate\Support\Collection;

class ComposeTest extends TestCase
{
    use WithFaker;

    /**
     * Just a helper fuction to create the needed parameters for compose request
     *
     * @return Collection
     */
    private function _createParams()
    {
        $user = factory(User::class)->create();
        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            ['username' => $user['username'], 'password' => 'monda21']
        );

        $signIn->assertStatus(200);

        $token = $signIn->json('token');
        $sender = $user['id'];

        $receiver = factory(User::class)->create()->username;

        $subject = $this->faker->title;
        $content = $this->faker->text;

        return collect(compact('token', 'sender', 'receiver', 'subject', 'content'));
    }

    /**
     * Test a user can send a message to another user.
     *
     * @test
     *
     * @return void
     */
    public function validCompose()
    {
        $params = $this->_createParams();

        $response = $this->json(
            'POST',
            '/api/ComposeMessage',
            $params->except('sender')->toArray()
        );

        $response->assertStatus(200)->assertSee('id');

        //make $params['receiver'] = receiverID instead of receiver username
        $params['receiver'] = User::where('username', $params['receiver'])
            ->first()->id;
        $this->assertDatabaseHas('messages', $params->except('token')->toArray());

        //remove the composed message
        Message::where('id', $response->json('id'))->delete();
        //remove the created users
        User::where('id', $params['sender'])
            ->orWhere('id', $params['receiver'])->forceDelete();
    }

    /**
     * Test invalid receiver.
     *
     * @test
     *
     * @return void
     */
    public function invalidReceiver()
    {
        $params = $this->_createParams();
        //delete receiver, we don't need him
        User::where('username', $params['receiver'])->forceDelete();
        $params['receiver'] = '-1';

        $response = $this->json(
            'POST',
            '/api/ComposeMessage',
            $params->except('sender')->toArray()
        );

        $response->assertStatus(404)->assertSee('Receiver username is not found');

        //remove the created user
        User::where('id', $params['sender'])->forceDelete();
    }

    /**
     * Test blocked users can't message each other.
     *
     * @test
     *
     * @return void
     */
    public function blockedUsers()
    {
        $params = $this->_createParams();
        $receiverID = User::where('username', $params['receiver'])->first()->id;
        //block the users before sending the message
        Block::insert(
            ['blockerID' => $receiverID, 'blockedID' => $params['sender']]
        );

        $response = $this->json(
            'POST',
            '/api/ComposeMessage',
            $params->except('sender')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee("blocked users can't message each other");

        //unblock users
        Block::where(
            ['blockerID' => $receiverID, 'blockedID' => $params['sender']]
        )->delete();

        //remove the created users
        User::where('id', $receiverID)
            ->orWhere('id', $params['sender'])->forceDelete();
    }


    /**
     * Test missing requird fields
     *
     * @test
     *
     * @return void
     */
    public function noParams()
    {
        $params = $this->_createParams();

        $missing = ['subject', 'content', 'receiver'];
        foreach ($missing as $misParam) {
            $response = $this->json(
                'POST',
                '/api/ComposeMessage',
                $params->except('sender', $misParam)->toArray()
            );

            $response->assertStatus(400)->assertSee($misParam);
        }

        //remove the created users
        User::where('username', $params['receiver'])
            ->orWhere('id', $params['sender'])->forceDelete();
    }

    /**
     * Test invalid token
     *
     * @test
     *
     * @return void
     */
    public function invalidToken()
    {
        $params = $this->_createParams();
        $params['token'] = '-1';

        $response = $this->json(
            'POST',
            '/api/ComposeMessage',
            $params->except('sender')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee('Not authorized');

        //remove the created users
        User::where('username', $params['receiver'])
            ->orWhere('id', $params['sender'])->forceDelete();
    }
}
