<?php

use Illuminate\Database\Seeder;

class savePosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('save_posts')->insert([
            'postID' => 't3_100000',
            'userID' => 't2_100002'
        ]);
        factory(App\savePost::class, 10)->create();
    }
}
