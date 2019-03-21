<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidLock extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //admin lock post
    public function adminLock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json()["token"];
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
    }

    //admin unlock post
    public function adminUnlock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json()["token"];
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
    }


    //post owner lock the post
    public function ownerLock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'mX',
            'password' => 'killa$&12'
            ]
        );
        $token = $loginResponse->json()["token"];
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
    }

    //post owner unlock the post
    public function ownerUnlock()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'mX',
            'password' => 'killa$&12'
            ]
        );
        $token = $loginResponse->json()["token"];
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
    }

    //moderator in the Apexcom where the post in lock the post
    public function moderatorLock()
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
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 1]);
    }

    //moderator in the Apexcom where the post in unlock the post
    public function moderatorUnlock()
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
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('posts', ['id' => 't3_4' , 'locked' => 0]);
    }
}
