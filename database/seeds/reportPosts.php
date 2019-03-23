<?php

use Illuminate\Database\Seeder;

class reportPosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_posts')->insert([
        'postID' => 't3_14',
        'userID' => 't2_1',
        'content' => 'Anything'
        ]);
    }
}
