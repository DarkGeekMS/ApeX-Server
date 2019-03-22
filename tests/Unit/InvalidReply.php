<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidReply extends TestCase
{
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
            '/api/Sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/comment',
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

    public function noComment()
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
            '/api/comment',
            [
            'token' => $token,
            'name' => 't1_01'
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
    public function noUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'MondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(400);
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'name' => 't1_4'
            ]
        );
        $response->assertStatus(400);
    }
}
