<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\apexCom;

class sortPostsBy extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function sortbyDate()
    {
        $response = $this->json(
            'GET', '/api/sort_posts', [
            'apexComID' => apexCom::firstOrFail(),
            'sortingParam' => 'date'
            ]
        );
        $response->assertStatus(200);
    }
}
