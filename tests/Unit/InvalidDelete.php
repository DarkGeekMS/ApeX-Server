<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class InvalidDelete extends TestCase
{
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
            '/api/sign_in',
            [
            'username' => 'Monda Talaat',
            'password' => 'monda21'
            ]
        );
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't3_06'
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
    //no comment or reply
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
        $token = $loginResponse->json()["token"];
        $response = $this->json(
            'DELETE',
            '/api/delete',
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
    //not valid user
    public function noUser()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
            'username' => 'Anyone',
            'password' => '451447'
            ]
        );
        $token = $loginResponse->json('token');
        $response = $this->json(
            'DELETE',
            '/api/delete',
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
    //not post owner , admin or moderator in the apexcom where the post in
    public function notAllowed()
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
        $response = $this->json(
            'DELETE',
            '/api/delete',
            [
            'token' => $token,
            'name' => 't3_6'
            ]
        );
        $response->assertStatus(400);
    }
}
