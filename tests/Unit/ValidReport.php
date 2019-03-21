<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ValidReport extends TestCase
{
  /**
   *
   * @test
   *
   * @return void
   */
     //moderator in apexcom not include the reported post
    public function reportPost()
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
            'name' => 't3_5',
            'content' => 'report user'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('report_posts', ['postID' => 't3_5' , 'userID' => 't2_1']);
    }

    /**
     *
     * @test
     *
     * @return void
     */
    //ordinary user report a comment
    public function reportComment()
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
            'name' => 't1_5',
            'content' => 'report user'
            ]
        );
        $response->assertStatus(200);
        $this->assertDatabaseHas('report_comments', ['comID' => 't1_5' , 'userID' => 't2_1']);
    }
}
