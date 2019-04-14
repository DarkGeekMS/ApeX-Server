<?php

use Illuminate\Database\Seeder;
use App\Models\Comment;

class comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comment::create([
          'id' => 't1_1',
          'commented_by' => 't2_1',
          'content' => 'Hey there',
          'root' => 't3_1',
          'created_at' => '2019-03-23 17:20:37'
        ]);

        Comment::create([
          'id' => 't1_2',
          'commented_by' => 't2_3',
          'content' => 'hii there',
          'root' => 't3_2',
          'created_at' => '2019-03-23 17:20:38'
        ]);

        Comment::create([
          'id' => 't1_3',
          'commented_by' => 't2_2',
          'content' => 'good bye there',
          'root' => 't3_3',
          'created_at' => '2019-03-23 17:20:39'
        ]);

        Comment::create([
          'id' => 't1_4',
          'commented_by' => 't2_2',
          'content' => 'good morning there',
          'root' => 't3_4',
          'created_at' => '2019-03-23 17:20:40'
        ]);

        Comment::create([
          'id' => 't1_5',
          'commented_by' => 't2_4',
          'content' => 'Hello there',
          'root' => 't3_5',
          'created_at' => '2019-03-23 17:20:41'
        ]);

        Comment::create([
          'id' => 't1_6',
          'commented_by' => 't2_10',
          'content' => 'Hey there',
          'root' => 't3_10',
          'created_at' => '2019-03-23 17:20:42'
        ]);

        Comment::create([
          'id' => 't1_7',
          'commented_by' => 't2_11',
          'content' => 'Hey there',
          'root' => 't3_11',
          'created_at' => '2019-03-23 17:20:43'
        ]);

        Comment::create([
          'id' => 't1_8',
          'commented_by' => 't2_8',
          'content' => 'Hey there',
          'root' => 't3_7',
          'created_at' => '2019-03-23 17:20:44'
        ]);

        Comment::create([
          'id' => 't1_9',
          'commented_by' => 't2_15',
          'content' => 'Hey there',
          'root' => 't3_9',
          'created_at' => '2019-03-23 17:20:45'
        ]);

        Comment::create([
          'id' => 't1_10',
          'commented_by' => 't2_13',
          'content' => 'Hey there',
          'root' => 't3_7',
          'created_at' => '2019-03-23 17:20:46'
        ]);

        Comment::create([
          'id' => 't1_11',
          'commented_by' => 't2_11',
          'content' => 'Hey there',
          'root' => 't3_9',
          'created_at' => '2019-03-23 17:20:47'
        ]);

        Comment::create([
          'id' => 't1_12',
          'commented_by' => 't2_13',
          'content' => 'Hey there',
          'root' => 't3_14',
          'created_at' => '2019-03-23 17:20:48'
        ]);

        Comment::create([
          'id' => 't1_13',
          'commented_by' => 't2_8',
          'content' => 'Hey there',
          'root' => 't3_8',
          'created_at' => '2019-03-23 17:20:48'
        ]);

        Comment::create([
          'id' => 't1_14',
          'commented_by' => 't2_14',
          'content' => 'Hey there',
          'root' => 't3_9',
          'created_at' => '2019-03-23 17:20:49'
        ]);

        Comment::create([
          'id' => 't1_15',
          'commented_by' => 't2_15',
          'content' => 'Hey there',
          'root' => 't3_8',
          'created_at' => '2019-03-23 17:20:50'
        ]);
    }
}
