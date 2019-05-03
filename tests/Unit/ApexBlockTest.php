<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\Models\ApexCom;
use App\Models\ApexBlock;
use App\Models\Moderator;
use App\Models\Subscriber;
use App\Models\User;
use DB;

class ApexBlockTest extends TestCase
{

    use WithFaker;
    /**
     * Test with an Apexcom not found, or with out a token, or without user to be blocked/unblocked.
     *
     * @test
     *
     * @return void
     */
    public function nonCompleteParameters()
    {
        // hit the route with out token
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
            ]
        );

        // a token error will apear.
        $response->assertStatus(400)->assertSee('Not authorized');

        //create the moderator and the blocked user and sign in with the moderator.
        $blockeduser = factory(User::class)->create();

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

        // hit the route with an invalid id of an apexcom.
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
                'token' => $token,
                'user_id' => $blockeduser['id']
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('ApexCom is not found.');

        $apex_id = ApexCom::all()->first()->id;

        // hit the route with out a user to be blocked
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id
            ]
        );
        // an error that the apexcom is not found
        $response->assertStatus(404)->assertSee('User not found.');
        

        // delete users added to database
        User::where('id', $user['id'])->forceDelete();
        User::where('id', $blockeduser['id'])->forceDelete();

        //check that the user deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $blockeduser['id']]);
    }

    /**
     * This test function tests moderation restrictions.
     *
     * @test
     *
     * @return void
     */
    public function moderationRestrictions()
    {
        //create the moderator and the blocked user and sign in with the moderator.
        $blockeduser = factory(User::class)->create();

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

        $apex_id = ApexCom::all()->first()->id;

        // set the moderator as a normal user.
        User::where('id', $user['id'])->update(['type' => 1]);
        // hit the route with a user that is not a moderator or site admin
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'user_id' => $blockeduser['id']
            ]
        );
        // an error that you are not a moderator to this apexcom
        $response->assertStatus(400)->assertSee('You are not a moderator of this apexcom or the admin of the site.');
        
        // make the signed in user and the user to be blocked admins.
        User::where('id', $user['id'])->update(['type' => 3]);
        User::where('id', $blockeduser['id'])->update(['type' => 3]);

        // hit the route to block site admin
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'user_id' => $blockeduser['id']
            ]
        );
        // an error that you can not block the site admin or a moderator in the apexcom
        $response->assertStatus(400)->assertSee('You can not block a moderator in the apexcom or the admin of the site.');
        
        // delete user added to database and blocked user

        User::where('id', $user['id'])->forceDelete();
        User::where('id', $blockeduser['id'])->forceDelete();

        //check that the users deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $blockeduser['id']]);
    }

    /**
     * This test function tests the succeeded block and unblock process.
     *
     * @test
     *
     * @return void
     */
    public function userSucceeds()
    {
        //create the moderator and the blocked user and sign in with the moderator.
        $blockeduser = factory(User::class)->create();

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

        // make the signed in user an admin and user to be blocked as normal user.
        User::where('id', $user['id'])->update(['type' => 3]);
        User::where('id', $blockeduser['id'])->update(['type' => 1]);

        $apex_id = ApexCom::all()->first()->id;

        // let the user to be blocked subscribe the apexcom and check this in database.
        Subscriber::create(['apexID' => $apex_id,  'userID' => $blockeduser['id']]);

        $this->assertDatabaseHas('subscribers', ['apexID' => $apex_id, 'userID' => $blockeduser['id']]);

        // hit the route with a loged in site admin to block a normal user
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'user_id' => $blockeduser['id']
            ]
        );
        $response->assertStatus(200);

        // check that the subscription is deleted, and the user is blocked from this apexcom in the data base.
        $this->assertDatabaseMissing('subscribers', ['apexID' => $apex_id, 'userID' => $blockeduser['id']]);
        $this->assertDatabaseHas('apex_blocks', ['ApexID' => $apex_id, 'blockedID' => $blockeduser['id']]);


        // hit the route to unblock the user.
        $response = $this->json(
            'POST',
            '/api/ApexcomBlockUser',
            [
                'token' => $token,
                'ApexCom_id' => $apex_id,
                'user_id' => $blockeduser['id']
            ]
        );
        $response->assertStatus(200);
        
        // check that he is no longer blocked in the database.
        $this->assertDatabaseMissing('apex_blocks', ['ApexID' => $apex_id, 'blockedID' => $blockeduser['id']]);
        
        // delete user added to database and blocked user

        User::where('id', $user['id'])->forceDelete();
        User::where('id', $blockeduser['id'])->forceDelete();

        //check that the users deleted from database
        $this->assertDatabaseMissing('users', ['id' => $user['id']]);
        $this->assertDatabaseMissing('users', ['id' => $blockeduser['id']]);
    }
}
