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
use DB;

class GetSubscribersTest extends TestCase
{


    use WithFaker;
    /**
     * Test the guest get subscribers with out a valid apexcom id and with a valid apexcom id.
     *
     * @test
     *
     * @return void
     */
    public function guestTest()
    {
        // hit the route with out valid apexcomid
        $response = $this->json(
            'GET',
            '/api/GetSubscribers',
            [
                'ApexCommID' => '12354'
            ]
        );

        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        //get any apex com and hit the route with it to get its subscribers
        $apex_id = ApexCom::all()->first()->id;
        $response = $this->json(
            'GET',
            '/api/GetSubscribers',
            [
                'ApexCommID' => $apex_id
            ]
        );

        // a list of subscribers of apexcom should be returned.
        $response->assertStatus(200);
    }
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
            '/api/GetSubscribers',
            [
            ]
        );
        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

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

        // hit the route with an invalid id of an apexcom to get its subscribers
        $response = $this->json(
            'POST',
            '/api/GetSubscribers',
            [
                'token' => $token,
                'ApexCommID' => '12354'
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        // delete user added to database
        DB::table('users')->where('id', $user['id'])->delete();

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
        $blockedID =  $user['id'];
        $ApexID = $apex_id;
        //check that the blocked user from apexcom is added to database
        $this->assertDatabaseHas('apex_blocks', compact('blockedID', 'ApexID'));

        // hit the route with the blocked user
        $response = $this->json(
            'POST',
            '/api/GetSubscribers',
            [
                'token' => $token,
                'ApexCommID' => $apex_id
            ]
        );

        // an error that the user is blocked from the apexcom
        $response->assertStatus(400)->assertSee('You are blocked from this Apexcom');

        // delete user added to database and blocked from apexblock table

        ApexBlock::where('blockedID', $user['id'])->delete();
        DB::table('users')->where('id', $user['id'])->delete();

        //check that the blocked user from apexcom is deleted from database
        $this->assertDatabaseMissing('apex_blocks', compact('blockedID', 'ApexID'));

        // check that the user added in test function is deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
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

        //get any apex com and hit the route with it to get its subscribers
        $apex_id = ApexCom::all()->first()->id;
        $response = $this->json(
            'POST',
            '/api/GetSubscribers',
            [
                'token' => $token,
                'ApexCommID' => $apex_id
            ]
        );

        // a list of subscribers in apexcom should be returned.
        $response->assertStatus(200);

        // delete user added to database
        DB::table('users')->where('id', $user['id'])->delete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
    }
}
