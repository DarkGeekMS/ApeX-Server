<?php

use Illuminate\Database\Seeder;
use App\Models\Post;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'id' => 't3_1',
            'posted_by' => 't2_2',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_2',
            'posted_by' => 't2_1',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_3',
            'posted_by' => 't2_4',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_4',
            'posted_by' => 't2_2',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_5',
            'posted_by' => 't2_2',
            'apex_id' => 't5_2',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_6',
            'posted_by' => 't2_4',
            'apex_id' => 't5_2',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_7',
            'posted_by' => 't2_10',
            'apex_id' => 't5_3',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_8',
            'posted_by' => 't2_12',
            'apex_id' => 't5_3',
            'title' => 'Anything',
            'locked' => true,
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_9',
            'posted_by' => 't2_7',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_10',
            'posted_by' => 't2_8',
            'apex_id' => 't5_4',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_11',
            'posted_by' => 't2_8',
            'apex_id' => 't5_3',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_12',
            'posted_by' => 't2_9',
            'apex_id' => 't5_5',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        Post::create([
            'id' => 't3_13',
            'posted_by' => 't2_12',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'content' => 'good news'
        ]);

        Post::create([
            'id' => 't3_14',
            'posted_by' => 't2_15',
            'apex_id' => 't5_7',
            'title' => 'Anything',
            'content' => 'talking about the past'
        ]);

        Post::create([
            'id' => 't3_15',
            'posted_by' => 't2_13',
            'apex_id' => 't5_8',
            'title' => 'Anything',
            'content' => 'talking about the present'
        ]);

        Post::create([
            'id' => 't3_16',
            'posted_by' => 't2_6',
            'apex_id' => 't5_9',
            'title' => 'Anything',
            'content' => 'talking about the futrue'
        ]);

        factory(Post::class, 10)->create();
    }
}
