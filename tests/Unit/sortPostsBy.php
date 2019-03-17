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
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => apexCom::firstOrFail()->id,
            'sortingParam' => 'date'
            ]
        );
        $response->assertStatus(200);
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
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => apexCom::firstOrFail()->id,
            'sortingParam' => 'votes'
            ]
        );
        $response->assertStatus(200);
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
     * 
     * @test
     *
     * @return void
     */
    public function invalidSortingParam()
    {
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => apexCom::firstOrFail()->id,
            'sortingParam' => 'something'
            ]
        );
        $response->assertStatus(200);
    }

    /**
     * Test no given sortingParam.
     * 
     * @test
     *
     * @return void
     */
    public function noSortingParam()
    {
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => apexCom::firstOrFail()->id,
            ]
        );
        $response->assertStatus(200);
    }
}
