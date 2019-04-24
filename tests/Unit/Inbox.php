<?php

namespace Tests\Unit;

use Tests\TestCase;
use PHPUnit\Framework\Assert;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class Inbox extends TestCase
{
    /**
     * Test a valid request to inbox.
     * Assumes that there are some records in the database
     *
     * @test
     * 
     * @return void
     */
    public function validInbox()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            ['username' => 'Monda Talaat', 'password' => 'monda21']
        );
        $token = $loginResponse->json('token');
        $userID = 't2_1';

        $response = $this->json('POST', 'api/inbox_messages', compact('token'));
        $structure = ["sent" , "received" => ["read", "unread", "all"]];
        $response->assertStatus(200)->assertJsonStructure($structure);
        
        $sent = $response->json('sent');
        foreach ($sent as $mes ) {
            $this->assertDatabaseHas(
                'messages', ['sender' => $userID, 'delSend' => false]
            );
        }

        $read = $response->json('received')['read'];
        foreach ($read as $mes ) {
            $this->assertDatabaseHas(
                'messages',
                ['receiver' => $userID, 'delReceive' => false, 'received' => true]
            );
        }

        $unread = $response->json('received')['unread'];
        foreach ($unread as $mes ) {
            $this->assertDatabaseHas(
                'messages',
                ['receiver' => $userID, 'delReceive' => false, 'received' => false]
            );
        }

        $all = $response->json('received')['all'];

        $this->assertTrue(count($all) == count(array_merge($read, $unread)));
    }

    /**
     * Test invalid max
     * Assumes that there are some records in the database
     *
     * @test
     * 
     * @return void
     */
    public function invalidMax()
    {
        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            ['username' => 'Monda Talaat', 'password' => 'monda21']
        );
        $token = $loginResponse->json('token');
        $max = "bla";
        $response = $this->json(
            'POST', 'api/inbox_messages', compact('token', 'max')
        );
        $response->assertStatus(400)->assertSee('max');
    }

    /**
     * Test invalid token
     * Assumes that there are some records in the database
     *
     * @test
     * 
     * @return void
     */
    public function invalidtoken()
    {
        $token = '-1';
        $response = $this->json(
            'POST', 'api/inbox_messages', compact('token')
        );
        $response->assertStatus(400)->assertSee('Not Authorized');
    }
}
