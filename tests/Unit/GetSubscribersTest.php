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

class GetSubscribersTest extends TestCase
{


    use WithFaker;
    /**
     * Test with an Apexcom not found, and with out token.
     *
     * @test
     *
     * @return void
     */
    public function apexComNotFound()
    {

        // hit the route with out token
        $response = $this->json(
            'POST',
            '/api/get_subscribers',
            [
            ]
        );
        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

        //fake a user, sign him up and get the token
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUp = $this->json(
            'POST',
            '/api/sign_up',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        //check that the user is added to database
        $id = $signUp->json('user')['id'];
        $this->assertDatabaseHas('users', compact('username'));

        $token = $signUp->json('token');
        // hit the route with an invalid id of an apexcom to get its subscribers
        $response = $this->json(
            'POST',
            '/api/get_subscribers',
            [
                'token' => $token,
                'ApexCommID' => '12354'
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        // delete user added to database
        User::where('id', $id)->delete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', compact('username'));
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
            'POST',
            '/api/sign_up',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        //check that the user is added to database
        $id = $signUp->json('user')['id'];
        $this->assertDatabaseHas('users', compact('username'));

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
            'POST',
            '/api/get_subscribers',
            [
                'token' => $signUp->json('token'),
                'ApexCommID' => $apex_id
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
        $this->assertDatabaseMissing('users', compact('username'));
    }
    /**
     * User gets the subscribers of an apexcom.
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
            'POST',
            '/api/sign_up',
            compact('email', 'username', 'password')
        );
        $signUp->assertStatus(200);

        //check that the user is added to database
        $id = $signUp->json('user')['id'];
        $this->assertDatabaseHas('users', compact('username'));

        //get any apex com and hit the route with it to get its subscribers
        $apex_id = ApexCom::all()->first()->id;
        $response = $this->json(
            'POST',
            '/api/get_subscribers',
            [
                'token' => $signUp->json('token'),
                'ApexCommID' => $apex_id
            ]
        );

        // a list of subscribers in apexcom should be returned.
        $response->assertStatus(200);

        // delete user added to database
        User::where('id', $id)->delete();

        //check that the added user is deleted from database
        $this->assertDatabaseMissing('users', compact('username'));
    }
}
