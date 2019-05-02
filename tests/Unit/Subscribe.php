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

class Subscribe extends TestCase
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
        $response = $this->json(
            'POST',
            '/api/Subscribe',
            [
            ]
        );
        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

        //fake a user, sign him up and get the token
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

        // hit the route with an invalid id of an apexcom to subscribe
        $response = $this->json(
            'POST',
            '/api/Subscribe',
            [
                'token' => $token,
                'ApexCom_ID' => '12354'
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
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

        // get any apexcom and block the signed in user from
        $apex_id = ApexCom::all()->first()->id;
        ApexBlock::create(
            [
                'blockedID' => $user['id'],
                'ApexID' => $apex_id
            ]
        );
        $blockedID = $user['id'];
        $ApexID = $apex_id;
        //check that the blocked user from apexcom is added to database
        $this->assertDatabaseHas('apex_blocks', compact('blockedID', 'ApexID'));

        // hit the route with the blocked user
        $response = $this->json(
            'POST',
            '/api/Subscribe',
            [
                'token' => $token,
                'ApexCom_ID' => $apex_id
            ]
        );

        // an error that the user is blocked from the apexcom
        $response->assertStatus(400)->assertSee('You are blocked from this Apexcom');

        // delete user added to database and blocked from apexblock table

        ApexBlock::where('blockedID', $user['id'])->delete();
        User::where('id', $user['id'])->forceDelete();

        //check that the blocked user from apexcom is deleted from database
        $this->assertDatabaseMissing('apex_blocks', compact('blockedID', 'ApexID'));

        // check that the user added in test function is deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
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
        $userid = $user['id'];
        $token = $signIn->json('token');

        //get any apex com and hit the route with it to subscribe
        $apexid = ApexCom::all()->first()->id;
        $response = $this->json(
            'POST',
            '/api/Subscribe',
            [
                'token' => $token,
                'ApexCom_ID' => $apexid
            ]
        );

        // user should be subscribed.
        $response->assertStatus(200);


        // check that the user subscribed apexcom in database
        $this->assertDatabaseHas('subscribers', compact('userid', 'apexid'));

        // hit the route with same user and apexcom to unsubscribe
        $response = $this->json(
            'POST',
            '/api/Subscribe',
            [
                'token' => $token,
                'ApexCom_ID' => $apexid
            ]
        );
        $response->assertStatus(200);

        // check that the user unsubscribed apexcom in database(deleted)
        $this->assertDatabaseMissing('subscribers', compact('userid', 'apexid'));

        // delete user added to database
        User::where('id', $user['id'])->forceDelete();

        //check that the added user is deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
