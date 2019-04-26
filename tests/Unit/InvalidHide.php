<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidHide extends TestCase
{
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
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'tc'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(400);
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_5'
            ]
        );

        $response->assertStatus(400);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    public function noPost()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_01'
            ]
        );
        $response->assertStatus(404);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }
}
