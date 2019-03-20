<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use apexCom;
use apexBlock;
use subscriber;

class AboutTest extends TestCase
{

    use RefreshDatabase;


    
   
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

        // hit the route with an invalid id of an apexcom to get its subscribers
        $response = $this->json(
            'GET', '/api/get_subscribers', [
                'token' => $sign_up->token,
                'ApexCommID' => '12354'
            ]
        );

        // an error that the apexcom is not found
        $response->assertStatus(404);
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

        // get any apexcom and block the signed in user from
        $apex_id = apexCom::first()['id'];
        apexBlock::create(
            [
                'blockedID' => $sign_up->user['id'],
                'ApexID' => $apex_id
            ]
        );

        // hit the route with the blocked user
        $response = $this->json(
            'GET', '/api/get_subscribers', [
                'token' => $sign_up->token,
                'ApexCommID' => $apex_id
            ]
        );

        // an error that the user is blocked from the apexcom
        $response->assertStatus(400);
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

        //get any apex com and hit the route with it to get its subscribers
        $apex_id = apexCom::first()['id'];
        $response = $this->json(
            'GET', '/api/get_subscribers', [
                'token' => $sign_up->token,
                'ApexCommID' => $apex_id
            ]
        );

        // a list of subscriber users should be returned.
        $response->assertStatus(200);
    }
}