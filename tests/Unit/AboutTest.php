<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use App\apexCom;
use App\apexBlock;
use App\subscriber;

class AboutTest extends TestCase
{


   
    /**
     * Apexcom not found.
     * 
     * @test
     *
     * @return void
     */
    public function apexComNotFound()
    {
        // fake a user
        $email = Str::random(15)."@gmail.com";
        $username = Str::random(15);
        
        // request sign up with a user
        $sign_up = $this->json(
            'POST', '/api/sign_up', [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );
        $sign_up->assertStatus(200);

        // hit the route with an invalid id of an apexcom to get its subscribers
        $response = $this->json(
            'GET', '/api/get_subscribers', [
                'token' => $sign_up->json('token'),
                'ApexCommID' => '12354'
            ]
        );
        // an error that the apexcom is not found
        //$response->assertStatus(404);

        // delete user added to database
        $userid = $sign_up->json('user')->id;
        apexCom::where('id', $userid)->delete();
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
        // fake a user
        $email = Str::random(15)."@gmail.com";
        $username = Str::random(15);
        
        // request sign up with a user
        $sign_up = $this->json(
            'POST', '/api/sign_up', [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );

        $sign_up->assertStatus(200);

        // get any apexcom and block the signed in user from
        $apex_id = apexCom::all()->first()->id;
        apexBlock::create(
            [
                'blockedID' => $sign_up->json('user')->id,
                'ApexID' => $apex_id
            ]
        );

        // hit the route with the blocked user
        $response = $this->json(
            'GET', '/api/get_subscribers', [
                'token' => $sign_up->json('token'),
                'ApexCommID' => $apex_id
            ]
        );

        // an error that the user is blocked from the apexcom
        //$response->assertStatus(400);

        // delete user added to database and blocked from apexbolck table
        $userid = $sign_up->json('user')->id;
        
        apexBlock::where('blockedID', $userid)->delete();
        apexCom::where('id', $userid)->delete();
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
        // fake a user
        $email = Str::random(15)."@gmail.com";
        $username = Str::random(15);
        
        // request sign up with a user
        $sign_up = $this->json(
            'POST', '/api/sign_up', [
            'email' => $email,
            'password' => '1234567',
            'username' => $username
            ]
        );

        $sign_up->assertStatus(200);
        
        //get any apex com and hit the route with it to get its subscribers
        $apex_id = apexCom::all()->first()->id;
        $response = $this->json(
            'GET', '/api/get_subscribers', [
                'token' => $sign_up->json('token'),
                'ApexCommID' => $apex_id
            ]
        );

        // a list of subscriber users should be returned.
        //$response->assertStatus(200);

        // delete user added to database
        $userid = $sign_up->json('user')->id;
        apexCom::where('id', $userid)->delete();
    }
}
