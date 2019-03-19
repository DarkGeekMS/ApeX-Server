<?php

use Illuminate\Database\Seeder;

class commentVotes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comment_votes')->insert([
            'comID' => 't1_100000',
            'userID' => 't2_100001',
            'dir' => 1
        ]);
        factory(App\commentVote::class, 10)->create();
    }
}
