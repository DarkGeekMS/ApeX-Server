<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidHide extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */

    public function hidePost()
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

        //to hide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('hiddens', ['postID' => 't3_4' , 'userID' => 't2_1']);
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

    public function unhidePost()
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

        //to unhide the post
        $response = $this->json(
            'POST',
            '/api/Hide',
            [
            'token' => $token,
            'name' => 't3_4'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseMissing('hiddens', ['postID' => 't3_4' , 'userID' => 't2_1']);
        $logoutResponse = $this->json(
            'POST',
            '/api/sign_out',
            [
            'token' => $token
            ]
        );
    }
}
