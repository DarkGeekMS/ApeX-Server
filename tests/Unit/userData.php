<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Block;

class userData extends TestCase
{
    use WithFaker;
    
    /**
     * Tests user data request with valid parameters.
     * 
     * Assumes that there are some records in the database
     * 
     * @test
     * 
     * @return void
     */
    public function validUserData()
    {
        $username = User::firstOrFail()['username'];

        $response = $this->json(
            'GET',
            '/api/user_data',
            compact('username')
        );

        $response->assertStatus(200)->assertSee('userData')->assertSee('posts');

    }

    /**
     * Tests user data request with invalid username.
     * 
     * @test
     * 
     * @return void
     */
    public function invalidUsername()
    {
        $response = $this->json(
            'GET',
            '/api/user_data',
            ['username' => '-1']
        );

        $response->assertStatus(404)->assertSee('User is not found');
        
    }

    /**
     * Tests user data request with no username.
     * 
     * @test
     * 
     * @return void
     */
    public function missingUsername()
    {
        $response = $this->json(
            'GET',
            '/api/user_data'
        );

        $response->assertStatus(400)->assertSee('username');
    }

    /**
     * Tests user data request with blocked users.
     * 
     * Assumes that there are some records in the database
     * 
     * @test
     * 
     * @return void
     */
    public function blokcedUserData()
    {
        //create a new user and get its token
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
        $user1 = $signUpResponse->json('user');

        //block some user from the data base

        $user2 = User::firstOrFail();
        $username = $user2['username'];
        Block::insert(['blockerID' => $user1['id'], 'blockedID' => $user2['id']]);

        $response = $this->json(
            'POST',
            '/api/user_data',
            compact('token', 'username')
        );

        $response->assertStatus(400)
            ->assertSee("blocked users can't view the data of each other");
    }
}
