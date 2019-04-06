<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\ApexCom;
use App\Models\ApexBlock;
use App\Models\Subscriber;
use \App\Models\User;

class SubscribeTest extends TestCase
{


    use WithFaker;
    /**
     * Test with an Apexcom not found or token not found.
     *
     * @test
     *
     * @return void
     */
    public function apexComNotFound()
    {
        // hit the route with out token
    /*    $response = $this->json(
            'POST', '/api/subscribe', [
            ]
        );
        // a token error will apear.
        $response->assertStatus(400);*/

        //fake a user, sign him up and get the token
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST', '/api/sign_up', compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        //check that the user is added to database
        $id = $signUp->json('user')['id'];
        $this->assertDatabaseHas('users', compact('id'));

        $token = $signUp->json('token');

        // hit the route with an invalid id of an apexcom to subscribe
        $response = $this->json(
            'POST', '/api/subscribe', [
                'token' => $token,
                'ApexCom_ID' => '12354'
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        // delete user added to database
        User::where('id', $id)->delete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', compact('id'));
    }
    /**
     * User Blocked from apexcom.
     *
     * @test
     *
     * @return void
     */
    public function userBlockedFromApexcom()
    {
        //fake a user, sign him up and get the token
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST', '/api/sign_up', compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        //check that the user is added to database
        $id = $signUp->json('user')['id'];
        $this->assertDatabaseHas('users', compact('id'));

        // get any apexcom and block the signed in user from
        $apex_id = ApexCom::all()->first()->id;
        ApexBlock::create(
            [
                'blockedID' => $id,
                'ApexID' => $apex_id
            ]
        );
        $blockedID = $id;
        $ApexID = $apex_id;
        //check that the blocked user from apexcom is added to database
        $this->assertDatabaseHas('apex_blocks', compact('blockedID', 'ApexID'));

        // hit the route with the blocked user
        $response = $this->json(
            'POST', '/api/subscribe', [
                'token' => $signUp->json('token'),
                'ApexCom_ID' => $apex_id
            ]
        );

        // an error that the user is blocked from the apexcom
        $response->assertStatus(400)->assertSee('You are blocked from this Apexcom');

        // delete user added to database and blocked from apexblock table

        ApexBlock::where('blockedID', $id)->delete();
        User::where('id', $id)->delete();

        //check that the blocked user from apexcom is deleted from database
        $this->assertDatabaseMissing('apex_blocks', compact('blockedID', 'ApexID'));

        // check that the user added in test function is deleted from database
        $this->assertDatabaseMissing('users', compact('id'));
    }
    /**
     * User subscribes and unsubscribes an apexcom.
     *
     * @test
     *
     * @return void
     */
    public function userSucceeds()
    {
        //fake a user, sign him up and get the token
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST', '/api/sign_up', compact('email', 'username', 'password')
        );

        $signUp->assertStatus(200);

        //check that the user is added to database
        $userid = $id = $signUp->json('user')['id'];
        $this->assertDatabaseHas('users', compact('id'));

        //get any apex com and hit the route with it to subscribe
        $apexid = ApexCom::all()->first()->id;
        $response = $this->json(
            'POST', '/api/subscribe', [
                'token' => $signUp->json('token'),
                'ApexCom_ID' => $apexid
            ]
        );

        // user should be subscribed.
        $response->assertStatus(200);


        // check that the user subscribed apexcom in database
        $this->assertDatabaseHas('subscribers', compact('userid', 'apexid'));

        // hit the route with same user and apexcom to unsubscribe
        $response = $this->json(
            'POST', '/api/subscribe', [
                'token' => $signUp->json('token'),
                'ApexCom_ID' => $apexid
            ]
        );

        // check that the user unsubscribed apexcom in database(deleted)
        $this->assertDatabaseMissing('subscribers', compact('userid', 'apexid'));

        // delete user added to database
        User::where('id', $id)->delete();

        //check that the added user is deleted from database
        $this->assertDatabaseMissing('users', compact('id'));
    }
}
