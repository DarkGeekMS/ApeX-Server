<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\apexCom;

class sortPostsBy extends TestCase
{
    /**
     * Test sorting the posts by date.
     * 
     * @test
     *
     * @return void
     */
    public function sortbyDate()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => $apexComID,
            'sortingParam' => 'date'
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        for ($i=0; $i < count($posts)-1; $i++) { 
            //assert that the apex_id of the posts in the result 
            //is equal to apexComID in the given request
            $this->assertTrue($posts[$i]['apex_id'] === $apexComID);
            //assert that the posts are orderd by date correctly
            $this->assertTrue(
                $posts[$i]['created_at'] >= $posts[$i+1]['created_at']
            );
        }
    }

    /**
     * Test sorting the posts by votes.
     * 
     * @test
     *
     * @return void
     */
    public function sortbyVotes()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => $apexComID,
            'sortingParam' => 'votes'
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        for ($i=0; $i < count($posts)-1; $i++) { 
            
            $this->assertTrue($posts[$i]['apex_id'] === $apexComID);
            //assert that the posts are orderd by votes correctly
            $this->assertTrue(
                $posts[$i]['votes'] >= $posts[$i+1]['votes']
            );
        }
    }

    /**
     * Test sorting the posts by the number of comments.
     * 
     * @test
     *
     * @return void
     */
    public function sortbyComments()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => $apexComID,
            'sortingParam' => 'comments'
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        for ($i=0; $i < count($posts)-1; $i++) { 
            
            $this->assertTrue($posts[$i]['apex_id'] === $apexComID);
            //assert that the posts are orderd by votes correctly
            $this->assertTrue(
                $posts[$i]['comments_num'] >= $posts[$i+1]['comments_num']
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
            'GET', '/api/sort_posts', [
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
     * @test
     *
     * @return void
     */
    public function invalidSortingParam()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => $apexComID,
            'sortingParam' => 'something'
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        for ($i=0; $i < count($posts)-1; $i++) { 
            
            $this->assertTrue($posts[$i]['apex_id'] === $apexComID);

            $this->assertTrue(
                $posts[$i]['created_at'] >= $posts[$i+1]['created_at']
            );
        }
    }

    /**
     * Test no given sortingParam.
     * it will use the default parameter 'date'
     * 
     * @test
     *
     * @return void
     */
    public function noSortingParam()
    {
        $apexComID = apexCom::inRandomOrder()->firstOrFail()->id;
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => $apexComID,
            ]
        );
        $response->assertStatus(200);
        $posts = $response->json('posts');
        for ($i=0; $i < count($posts)-1; $i++) { 
            
            $this->assertTrue($posts[$i]['apex_id'] === $apexComID);

            $this->assertTrue(
                $posts[$i]['created_at'] >= $posts[$i+1]['created_at']
            );
        }
    }
}
