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
            'postID' => 't3_1',
            'userID' => 't2_1',
            'content' => 'Sensitive content'
        ]);
        factory(App\reportPost::class, 10)->create();
    }
}
