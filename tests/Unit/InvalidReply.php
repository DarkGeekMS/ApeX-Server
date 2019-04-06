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
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(200);
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't3_001',
            'content' => ' reply to message '
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
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(200);
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't1_01',
            'content' => ' reply to message '
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

    /**
     *
     * @test
     *
     * @return void
     */

    public function noMessage()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(200);
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't4_01',
            'content' => ' reply to message '
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

    /**
     *
     * @test
     *
     * @return void
     */

    public function noContent()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $loginResponse->assertStatus(200);
        $response = $this->json(
            'POST',
            '/api/comment',
            [
            'token' => $token,
            'parent' => 't1_10'
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
            '/api/sign_in',
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
            'parent' => 't1_4',
            'content' => ' reply to message '
            ]
        );
        $response->assertStatus(400);
    }
}
