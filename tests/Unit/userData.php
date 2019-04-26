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
     * Create a new user and return him and his token
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
            '/api/sign_up',
            compact('email', 'username', 'password')
        );
        $signUpResponse->assertStatus(200);

        $token = $signUpResponse->json('token');
        $user = $signUpResponse->json('user');

        return [$user, $token];
    }

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
        [$user, $token] = $this->_createUser();

        $username = User::inRandomOrder()->firstOrFail()['username'];

        $methods = [
            'GET' => compact('username'),
            'POST' => compact('username', 'token')
        ];

        foreach ($methods as $method => $data) {
            $response = $this->json(
                $method,
                '/api/user_data',
                $data
            );

            $response->assertStatus(200)->assertSee('userData')->assertSee('posts');
        }

        User::destroy($user['id']);
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
        $username = '-1';

        [$user, $token] = $this->_createUser();

        $methods = [
            'GET' => compact('username'),
            'POST' => compact('username', 'token')
        ];

        foreach ($methods as $method => $data) {
            $response = $this->json(
                $method,
                '/api/user_data',
                $data
            );

            $response->assertStatus(404)->assertSee('User is not found');
        }

        User::destroy($user['id']);
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
        [$user, $token] = $this->_createUser();

        $methods = [
            'GET' => [],
            'POST' => compact('token')
        ];

        foreach ($methods as $method => $data) {
            $response = $this->json(
                $method,
                '/api/user_data',
                $data
            );

            $response->assertStatus(400)->assertSee('username');
        }

        User::destroy($user['id']);
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
        [$user1, $token] = $this->_createUser();
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

        //delete the block relation and the created user
        Block::where(['blockerID' => $user1['id'], 'blockedID' => $user2['id']])->delete();
        User::destroy($user1['id']);
    }
}
