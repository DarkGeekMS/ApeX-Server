<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidVote extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
     //no post
    public function invalidPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => 't3_01',
            'dir' => 1
            ]
        );
        $response->assertStatus(404);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //no comment
    public function noComment()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => 't1_01',
            'dir' => 1
            ]
        );
        $response->assertStatus(404);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //no user
    public function invalidUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(400);
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => 't1_4',
            'dir' => 1
            ]
        );
        $response->assertStatus(400);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //no user
    public function invalidDir()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/Vote',
            [
            'token' => $token,
            'name' => 't1_4',
            'dir' => 2
            ]
        );
        $response->assertStatus(400);
        $logoutResponse = $this->json(
            'POST',
            '/api/SignOut',
            [
            'token' => $token
            ]
        );
    }
}
