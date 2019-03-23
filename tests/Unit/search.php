<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\block;
use App\post;

class search extends TestCase
{
    use WithFaker;

    /**
     * Just a helper fuction to check there is no posts shown between blocked users
     *
     * @param string $userID the apexComID that contains the posts
     * @param array  $posts  the posts itself
     *
     * @return bool
     */
    private function _checkBlockedPosts($userID, $posts)
    {
        foreach ($posts as $post) {
            $postWriterID = $post['posted_by'];
            if (block::query()->where(
                ['blockerID' => $userID, 'blockedID' => $postWriterID]
            )->orWhere(
                ['blockerID' => $postWriterID, 'blockedID' => $userID]
            )->exists()
            ) {
                return false;
            }
        }
        return true;
    }

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
            'query' => 'lorem'
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * Tests userSearch
     * 
     * @test
     *
     * @return void
     */
    public function userSearch()
    {
        $username = $this->faker->unique()->userName;
        $email = $this->faker->unique()->safeEmail;
        $password = $this->faker->password;

        $signUpResponse = $this->json(
            'POST',
            '/api/sign_up',
            compact('email', 'username', 'password')
        );
        $signUpResponse->assertStatus(200);

        $token = $signUpResponse->json('token');
        $userID = $signUpResponse->json('user')['id'];

        //block some users before search
        $posts = post::all();
        for ($i=0; $i < count($posts)/2; $i++) {
            $postWriterID = $posts[$i]['posted_by'];
            block::insert(['blockerID' => $userID, 'blockedID' => $postWriterID]);
        }

        $response = $this->json(
            'POST',
            'api/search',
            [
            'query' => 'lorem',
            'token' => $token
            ]
        );
        $response->assertStatus(200);

        $posts = $response->json('posts');
        $this->assertTrue($this->_checkBlockedPosts($userID, $posts));

        //unblock blocked users
        $posts = post::all();
        for ($i=0; $i < count($posts)/2; $i++) {
            $postWriterID = $posts[$i]['posted_by'];
            block::where(['blockerID' => $userID, 'blockedID' => $postWriterID])
            ->delete();
        }

        \App\User::where('id', $userID)->delete();
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
