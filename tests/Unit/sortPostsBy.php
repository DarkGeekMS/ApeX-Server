<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\ApexCom;
use App\Models\Block;
use App\Models\Post;
use App\Models\Subscriber;
use App\Models\User;

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
     * Assumes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function validSort()
    {
        $apexComID = ApexCom::inRandomOrder()->firstOrFail()->id;
        $sortingParams = [
            'date' => 'created_at', 'votes' => 'votes', 'comments' => 'comments_count'
        ];
        foreach ($sortingParams as $sortingParam => $sortedColumn) {
            $response = $this->json(
                'GET',
                '/api/SortPosts',
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
     * Assumes that there are some records in the database
     *
     * @test
     *
     * @return void
     */
    public function userSort()
    {
        //get a user from block table
        $user = Block::inRandomOrder()->firstOrFail()->blocker()->first();
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            ['username' => $user->username, 'password' => 'monda21']
        )->assertStatus(200);
        $token = $loginResponse->json('token');
        $userID = $user->id;

        $response = $this->json('POST', '/api/SortPosts', compact('token'))
            ->assertStatus(200);
        $posts = $response->json('posts');

        //check that there are no posts from blocked users or hidden posts or reported posts
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

        $sortingParams = [
            'date' => 'created_at', 'votes' => 'votes', 'comments' => 'comments_count'
        ];
        foreach ($sortingParams as $sortingParam => $sortedColumn) {
            $response = $this->json(
                'POST',
                '/api/SortPosts',
                compact('sortingParam', 'token')
            );
            $response->assertStatus(200);
            $posts = $response->json('posts');
            $this->assertTrue(
                $this->_checkPosts(null, $posts, $sortedColumn)
            );
        }
    }

    /**
     * Test sortPosts when subscribedApexCom is true
     * 
     * @test
     * 
     * @return void
     */
    public function subscribedApexCom()
    {
        //get a user from `subscribed` table
        $user = Subscriber::inRandomOrder()->firstOrFail()->user()->first();
        $loginResponse = $this->json(
            'POST',
            '/api/SignIn',
            ['username' => $user->username, 'password' => 'monda21']
        )->assertStatus(200);
        $token = $loginResponse->json('token');
        $userID = $user->id;

        $subscribedApexCom = true;
        $response = $this->json(
            'POST', '/api/SortPosts', compact('token', 'subscribedApexCom')
        )->assertStatus(200);
        
        //check that the posts are from apexCom that the user is subscribed in
        $posts = $response->json('posts');
        foreach ($posts as $post) {
            $apexID = $post['apex_id'];
            $this->assertDatabaseHas('subscribers', compact('userID', 'apexID'));
        }
    }

    /**
     * Test sortPosts when subscribedApexCom is true and 
     * there is no apexComs that the user is Subscribed in
     * 
     * @test
     * 
     * @return void
     */
    public function noSubscribedApexCom()
    {
        //create a new user and get his token 
        $user = factory(User::class)->create();
        $signIn = $this->json(
            'POST',
            '/api/SignIn',
            ['username' => $user['username'], 'password' => 'monda21']
        )->assertStatus(200);

        $token = $signIn->json('token');

        $subscribedApexCom = true;
        $response = $this->json(
            'POST', '/api/SortPosts', compact('token', 'subscribedApexCom')
        )->assertStatus(400)->assertSee('The user is not subscribed in any ApexCom');

        //delete the created user
        $user->forceDelete();
    }

    /**
     * Test sorting the posts with no apexComID (it uses the default (null)).
     * Assumes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function noApexCom()
    {
        $sortingParams = [
            'date' => 'created_at', 'votes' => 'votes', 'comments' => 'comments_count'
        ];
        foreach ($sortingParams as $sortingParam => $sortedColumn) {
            $response = $this->json(
                'GET',
                '/api/SortPosts',
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
            '/api/SortPosts',
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
     * Assumes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function invalidSortingParam()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET',
            '/api/SortPosts',
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
     * Assumes that there are some recordes in the database
     *
     * @test
     *
     * @return void
     */
    public function noSortingParam()
    {
        $apexComID = ApexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET',
            '/api/SortPosts',
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
