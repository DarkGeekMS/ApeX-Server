<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Block;
use App\Models\Post;
use App\Models\ApexBlock;

class search extends TestCase
{
    use WithFaker;

    /**
     * Test Search request with valid query.
     *
     * @test
     *
     * @return void
     */
    public function validQuery()
    {
        $response = $this->json(
            'GET',
            'api/search',
            [
            'query' => 'any'
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * Tests userSearch
     * Assumes that there are some records in the database
     * 
     * @test
     *
     * @return void
     */
    public function userSearch()
    {

        $loginResponse = $this->json(
            'POST',
            '/api/sign_in',
            ['username' => 'Monda Talaat', 'password' => 'monda21']
        );
        $token = $loginResponse->json('token');
        $userID = 't2_1';

        $response = $this->json(
            'POST',
            'api/search',
            [
            'query' => 'any',
            'token' => $token
            ]
        );
        $response->assertStatus(200);

        //check that there are no posts from blocked users 
        //or posts from apexComs that the user is blocked from
        //or hidden posts or reported posts
        $posts = $response->json('posts');
        foreach ($posts as $post) {
            $postWriterID = $post['posted_by'];
            $this->assertFalse(Block::areBlocked($userID, $postWriterID));
            $this->assertDatabaseMissing(
                'apex_blocks',
                ['ApexID' => $post['apex_id'], 'blockedID' => $userID]
            );
            $this->assertDatabaseMissing(
                'hiddens',
                ['postID' => $post['id'], 'userID' => $userID]
            );
            $this->assertDatabaseMissing(
                'report_posts',
                ['postID' => $post['id'], 'userID' => $userID]
            );
        }

        //check that there is no blocked users shown in the results
        $users = $response->json('users');
        foreach ($users as $user) {
            $this->assertFalse(Block::areBlocked($userID, $user['id']));
        }

        //check that there are no apexComs that the user is blocked from
        $apexComs = $response->json('apexComs');
        foreach ($apexComs as $apexCom ) {
            $this->assertFalse(
                ApexBlock::query()->where(
                    ['ApexID' => $apexCom['id'], 'blockedID' => $userID]
                )->exists()
            );
        }

    }

    /**
     * Test Search request with invalid query.
     *
     * @test
     *
     * @return void
     */
    public function invalidQuery()
    {
        $response = $this->json(
            'GET',
            'api/search',
            [
            'query' => 'l'
            ]
        );
        $response->assertStatus(400);
    }

    /**
     * Test Search request with no query.
     *
     * @test
     *
     * @return void
     */
    public function noQuery()
    {
        $response = $this->json(
            'GET',
            'api/search'
        );
        $response->assertStatus(400);
    }
}
