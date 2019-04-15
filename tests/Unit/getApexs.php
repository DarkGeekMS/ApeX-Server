<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class InvalidLogin1 extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {

        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            [
              'username' => 'ramzy',
              'password' => 'monda21'
            ]
        );
          $token = $loginResponse->json('token');
          $response = $this->json(
              'POST',
              '/api/get_ApexComs',
              [
                'token' => $token
              ]
          );
          $response->assertStatus(200);
          $logoutResponse = $this->json(
              'POST',
              '/api/sign_out',
              [
                'token' => $token
              ]
          );
    }
}
