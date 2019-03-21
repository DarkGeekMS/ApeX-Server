<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidReport extends TestCase
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
            '/api/Sign_in',
            [
            'username' => 'MondaTalaat',
            'password' => '1561998'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
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
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
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
    //no comment
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
            '/api/report',
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
    //moderator in the apexcom holds the post or comment to be reported
    public function modUser()
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
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_4'
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
    // admin in the website
    public function adminUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't3_4'
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
    //the owner of the post to be reported or hase the reported comment
    public function owner()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/Sign_in',
            [
            'username' => 'King',
            'password' => 'queen12'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'POST',
            '/api/report',
            [
            'token' => $token,
            'name' => 't1_5'
            ]
        );
        $response->assertStatus(404);
    }
}
