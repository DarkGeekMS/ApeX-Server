<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\apexCom;

class sortPostsBy extends TestCase
{
    use WithFaker;

    /**
     * Just a helper fuction to test that the posts are sorted correctly
     *
     * @param string $apexComID    the apexComID that contains the posts
     * @param array  $posts        the posts itself
     * @param string $sortingParam the param that the posts are sorted by in the database
     *
     * @return bool
     */
    private function _checkPosts($apexComID, $posts, $sortingParam)
    {
        for ($i=0; $i < count($posts)-1; $i++) {
            if ($apexComID !== null && $posts[$i]['apex_id'] !== $apexComID) {
                return false;
            };

            if ($posts[$i][$sortingParam] < $posts[$i+1][$sortingParam]) {
                return false;
            }
        }
        return true;
    }

    /**
     * Test sorting the posts by valid sortingParam.
     *
     * Asummes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function validSort()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $sortingParams = [
            'date' => 'created_at', 'votes' => 'votes', 'comments' => 'comments_num'
        ];
        foreach ($sortingParams as $sortingParam => $sortedColumn) {
            $response = $this->json(
                'GET',
                '/api/sort_posts',
                [
                    'apexComID' => $apexComID,
                    'sortingParam' => $sortingParam
                ]
            );
            $response->assertStatus(200);
            $posts = $response->json('posts');
            $this->assertTrue(
                $this->_checkPosts($apexComID, $posts, $sortedColumn)
            );
        }
    }

    /**
     * Tests userSortPostsBy
     * 
     * @test
     *
     * @return void
     */
    public function userSort()
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

        $sortingParams = [
            'date' => 'created_at', 'votes' => 'votes', 'comments' => 'comments_num'
        ];
        foreach ($sortingParams as $sortingParam => $sortedColumn) {
            $response = $this->json(
                'POST',
                '/api/sort_posts',
                compact('sortingParam', 'token')
            );
            $response->assertStatus(200);
            $posts = $response->json('posts');
            $this->assertTrue(
                $this->_checkPosts(null, $posts, $sortedColumn)
            );
        }
        \App\User::where('id', $userID)->delete();
    }

    /**
     * Test sorting the posts with no apexComID (it uses the default (null)).
     * asummes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function noApexCom()
    {
        $sortingParams = [
            'date' => 'created_at', 'votes' => 'votes', 'comments' => 'comments_num'
        ];
        foreach ($sortingParams as $sortingParam => $sortedColumn) {
            $response = $this->json(
                'GET',
                '/api/sort_posts',
                [
                    'sortingParam' => $sortingParam
                ]
            );
            $response->assertStatus(200);
            $posts = $response->json('posts');
            $this->assertTrue(
                $this->_checkPosts(null, $posts, $sortedColumn)
            );
        }
    }


    /**
     * Test invalid apexComID.
     *
     * @test
     *
     * @return void
     */
    public function invalidApexComID()
    {
        $response = $this->json(
            'GET',
            '/api/sort_posts',
            [
            'apexComID' => '-1',
            'sortingParam' => 'votes'
            ]
        );
        $response->assertStatus(404);
    }

    /**
     * Test invalid sortingParam.
     * it will use the default parameter 'date'
     *
     * asummes that there are some recordes in the database
     * @test
     *
     * @return void
     */
    public function invalidSortingParam()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET',
            '/api/sort_posts',
            [
            'apexComID' => $apexComID,
            'sortingParam' => 'something'
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        $this->assertTrue(
            $this->_checkPosts($apexComID, $posts, 'created_at')
        );
    }

    /**
     * Test no given sortingParam.
     * it will use the default parameter 'date'
     *
     * asummes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function noSortingParam()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET',
            '/api/sort_posts',
            [
            'apexComID' => $apexComID,
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        $this->assertTrue(
            $this->_checkPosts($apexComID, $posts, 'created_at')
        );
    }
}
