<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidLock extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
    //admin lock post
    public function adminLock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 1]);
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
    //admin unlock post
    public function adminUnlock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 0]);
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
    //post owner lock the post
    public function ownerLock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mX',
            'password' => 'killa$&12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 1]);
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
    //post owner unlock the post
    public function ownerUnlock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mX',
            'password' => 'killa$&12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 0]);
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
    //moderator in the Apexcom where the post in lock the post
    public function moderatorLock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 1]);
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
    //moderator in the Apexcom where the post in unlock the post
    public function moderatorUnlock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'mondaTalaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/lock_post',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 0]);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }
}
