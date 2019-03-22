<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidLock extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

    //not moderator in the apeXcom where the post in
    public function notModerator()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_5'
            ]
        );
        $response->assertStatus(404);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //no post
    public function noPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_01'
            ]
        );
        $response->assertStatus(404);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //no user
    public function noUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_6'
            ]
        );
        $response->assertStatus(400);
    }
}
