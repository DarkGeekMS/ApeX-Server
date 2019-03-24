<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\message;
use App\User;
use App\block;
use Illuminate\Support\Collection;

class Compose extends TestCase
{
    use WithFaker;

    /**
     * Just a helper fuction to create the needed parameters for compose request
     * 
     * @return Collection
     */
    private function _createParams()
    {
        //create sender user
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUpResponse = $this->json(
            'POST',
            '/api/sign_up',
            compact('email', 'username', 'password')
        );
        $signUpResponse->assertStatus(200);
        
        $token = $signUpResponse->json('token');
        $sender = $signUpResponse->json('user')['id'];

        $receiver = factory(User::class)->create()->id;

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
            'POST', '/api/compose', $params->except('sender')->toArray()
        );

        $response->assertStatus(200)->assertSee('id');
        
        $this->assertDatabaseHas('messages', $params->except('token')->toArray());

        //remove the composed message
        message::where('id', $response->json('id'))->delete();
        //remove the created users
        User::where('id', $params['sender'])
            ->orWhere('id', $params['receiver'])->delete();
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
        User::where('id', $params['receiver'])->delete();
        $params['receiver'] = '-1';

        $response = $this->json(
            'POST', '/api/compose', $params->except('sender')->toArray()
        );

        $response->assertStatus(404)->assertSee('Receiver id is not found');

        //remove the created user
        User::where('id', $params['sender'])->delete();
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

        //block the users before sending the message
        block::insert(
            ['blockerID' => $params['receiver'], 'blockedID' => $params['sender']]
        );

        $response = $this->json(
            'POST', '/api/compose', $params->except('sender')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee("blocked users can't message each other");

        //unblock users
        block::where(
            ['blockerID' => $params['receiver'], 'blockedID' => $params['sender']]
        )->delete();

        //remove the created users
        User::where('id', $params['receiver'])
            ->orWhere('id', $params['sender'])->delete();
    }


    /**
     * Test missing subject field
     * 
     * @test
     * 
     * @return void
     */
    public function noSubject() 
    {
        $params = $this->_createParams();

        $response = $this->json(
            'POST', '/api/compose', $params->except('sender', 'subject')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee("subject");

        //remove the created users
        User::where('id', $params['receiver'])
            ->orWhere('id', $params['sender'])->delete();
    }

    /**
     * Test missing receiver field
     * 
     * @test
     * 
     * @return void
     */
    public function noReceiver() 
    {
        $params = $this->_createParams();

        $response = $this->json(
            'POST', '/api/compose', $params->except('sender', 'receiver')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee("receiver");

        //remove the created users
        User::where('id', $params['receiver'])
            ->orWhere('id', $params['sender'])->delete();
    }

    /**
     * Test missing content field
     * 
     * @test
     * 
     * @return void
     */
    public function noContent() 
    {
        $params = $this->_createParams();

        $response = $this->json(
            'POST', '/api/compose', $params->except('sender', 'content')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee('content');

        //remove the created users
        User::where('id', $params['receiver'])
            ->orWhere('id', $params['sender'])->delete();
    }

    /**
     * Test missing token field
     * 
     * @test
     * 
     * @return void
     */
    public function noToken() 
    {
        $params = $this->_createParams();

        $response = $this->json(
            'POST', '/api/compose', $params->except('sender', 'token')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee('token');

        //remove the created users
        User::where('id', $params['receiver'])
            ->orWhere('id', $params['sender'])->delete();
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
            'POST', '/api/compose', $params->except('sender')->toArray()
        );

        $response->assertStatus(400)
            ->assertSee('token');

        //remove the created users
        User::where('id', $params['receiver'])
            ->orWhere('id', $params['sender'])->delete();
    }
}
