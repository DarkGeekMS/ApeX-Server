<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use \App\Models\User;
use App\Models\Block;
use DB;

class blockUser extends TestCase
{

    use WithFaker;

    /**
     * Test a user block another user and testing alredy existing block
     *
     * @test
     *
     * @return void
     */
    public function validBlock()
    {
        //make a new user, sign him up and get the token
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

        $blockerID = $user['id'];

        //make the blocked user
        $blockedID = factory(User::class)->create()->id;

        $response = $this->json(
            'POST',
            'api/BlockUser',
            compact('token', 'blockedID')
        );

        $response->assertStatus(200)->assertSee(
            'The user has been blocked successfully'
        );

        $this->assertDatabaseHas('blocks', compact('blockerID', 'blockedID'));

        //test requseting the block again
        $response = $this->json(
            'POST',
            'api/BlockUser',
            compact('token', 'blockedID')
        );

        $response->assertStatus(200)->assertSee(
            'The user has been unblocked successfully'
        );

        $this->assertDatabaseMissing('blocks', compact('blockerID', 'blockedID'));
        //delete the created users
        DB::table('users')->where('id', $blockerID)->orWhere('id', $blockedID)->delete();
    }

    /**
     * Test a block request with no token sent
     *
     * @test
     *
     * @return void
     */
    public function noToken()
    {

        $blockedID = factory(User::class)->create()->id;

        $response = $this->json(
            'POST',
            'api/BlockUser',
            compact('blockedID')
        );

        $response->assertStatus(400)->assertSee('Not authorized');

        DB::table('users')->where('id', $blockedID)->delete();
    }

    /**
     * Test a block request without blockedID
     *
     * @test
     *
     * @return void
     */
    public function noBlockedID()
    {
        //make a new user, sign him up and get the token
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
        $blockerID = $user['id'];


        $response = $this->json(
            'POST',
            'api/BlockUser',
            compact('token')
        );

        $response->assertStatus(400)->assertSee('blockedID');

        //delete the created users
        DB::table('users')->where('id', $blockerID)->delete();
    }

    /**
     * Test a block request with invalid blockedID
     *
     * @test
     *
     * @return void
     */
    public function invalidBlockedID()
    {
      //make a new user, sign him up and get the token
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
        $blockerID = $user['id'];

        $blockedID = '-1';

        $response = $this->json(
            'POST',
            'api/BlockUser',
            compact('token', 'blockedID')
        );

        $response->assertStatus(404);

        //delete the created users
        DB::table('users')->where('id', $blockerID)->delete();
    }

    /**
     * Test a user block himself
     *
     * @test
     *
     * @return void
     */
    public function selfBlock()
    {
        //make a new user, sign him up and get the token
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
        $blockedID = $user['id'];


        $response = $this->json(
            'POST',
            'api/BlockUser',
            compact('token', 'blockedID')
        );

        $response->assertStatus(400)->assertSee("The user can't block himself");

        DB::table('users')->where('id', $blockedID)->delete();
    }
}
