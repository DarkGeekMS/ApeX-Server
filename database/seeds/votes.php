<?php

use Illuminate\Database\Seeder;

class votes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
        'postID' => 't3_10',
        'userID' => 't2_12',
        'dir' => -1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_8',
        'userID' => 't2_12',
        'dir' => 1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_9',
        'userID' => 't2_12',
        'dir' => 1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_10',
        'userID' => 't2_11',
        'dir' => -1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_10',
        'userID' => 't2_13',
        'dir' => -1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_8',
        'userID' => 't2_11',
        'dir' => 1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_7',
        'userID' => 't2_14',
        'dir' => -1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_11',
        'userID' => 't2_13',
        'dir' => 1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_10',
        'userID' => 't2_9',
        'dir' => 1
        ]);

        DB::table('votes')->insert([
        'postID' => 't3_8',
        'userID' => 't2_10',
        'dir' => -1
        ]);
    }
}
