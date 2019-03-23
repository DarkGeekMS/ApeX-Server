<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class search extends TestCase
{
    use WithFaker;

    /**
     * Test Search request with valid query.
     *
     * @test
     *
     * @return void
     */
    public function validQuery()
    {
        $response = $this->json(
            'GET',
            'api/search',
            [
            'query' => 'lorem'
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * Tests userSearch
     * 
     * @test
     *
     * @return void
     */
    public function userSearch()
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
        $userID = $signUpResponse->json('user')['id'];

        $response = $this->json(
            'POST',
            'api/search',
            [
            'query' => 'lorem',
            'token' => $token
            ]
        );
        $response->assertStatus(200);
        
        \App\User::where('id', $userID)->delete();
    }

    /**
     * Test Search request with invalid query.
     *
     * @test
     *
     * @return void
     */
    public function invalidQuery()
    {
        $response = $this->json(
            'GET',
            'api/search',
            [
            'query' => 'l'
            ]
        );
        $response->assertStatus(400);
    }

    /**
     * Test Search request with no query.
     *
     * @test
     *
     * @return void
     */
    public function noQuery()
    {
        $response = $this->json(
            'GET',
            'api/search'
        );
        $response->assertStatus(400);
    }
}
