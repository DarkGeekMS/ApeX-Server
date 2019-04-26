<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Message;
use App\Models\User;

class DeleteMsg extends TestCase
{
    use WithFaker;

    /**
     * Create a new userID and return him and his token
     *
     * @return array
     */
    private function _createUser()
    {
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUpResponse = $this->json(
            'POST',
            '/api/SignUp',
            compact('email', 'username', 'password')
        );
        $signUpResponse->assertStatus(200);

        $token = $signUpResponse->json('token');
        $userID = $signUpResponse->json('user')['id'];

        return [$userID, $token];
    }

    /**
     * Test delete a message
     *
     * @test
     *
     * @return void
     */
    public function validDelete()
    {
        //create sender and receiver users and a message
        [$sender, $sToken] = $this->_createUser();
        [$receiver, $rToken] = $this->_createUser();
        $lastID = Message::selectRaw('CONVERT( SUBSTR(id, 4), INT ) AS intID')
            ->get()->max('intID');
        $id = 't4_'.(string)($lastID + 1);
        $content = "Anything";
        Message::create(compact('id', 'sender', 'receiver', 'content'));

        //delete the messege from the sender then from the receiver
        $response = $this->json(
            'POST',
            'api/DeleteMessage',
            ['token' => $sToken, 'id' => $id]
        );
        $response->assertStatus(200)
            ->assertSee("The message is deleted successfully");
        //trying to delete it again
        $response = $this->json(
            'POST',
            'api/DeleteMessage',
            ['token' => $sToken, 'id' => $id]
        );
        $response->assertStatus(400)
            ->assertSee("The message is already deleted from the sender");

        //delete it from the receiver
        $response = $this->json(
            'POST',
            'api/DeleteMessage',
            ['token' => $rToken, 'id' => $id]
        );
        $response->assertStatus(200)
            ->assertSee("The message is deleted successfully");

        //now the message is deleted entirely
        //trying to delete it again
        $response = $this->json(
            'POST',
            'api/DeleteMessage',
            ['token' => $rToken, 'id' => $id]
        );
        $response->assertStatus(404)
            ->assertSee("message ID is not found");
        $this->assertDatabaseMissing('messages', compact('id'));

        //delete the created users
        User::destroy([$sender, $receiver]);
    }

    /**
     * Test delete a message with a user that is not the sender nor the receiver
     * Assumes that there is at least one record of messages in the database
     *
     * @test
     *
     * @return void
     */
    public function invalidUser()
    {
        [$user, $token] = $this->_createUser();
        $id = Message::firstOrFail()->id;
        $response = $this->json('POST', 'api/DeleteMessage', compact('id', 'token'));

        $response->assertStatus(400)
            ->assertSee('The user is not the sender nor the receiver of the message');

        User::destroy($user);
    }
}
