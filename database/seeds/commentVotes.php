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
        factory(App\commentVote::class, 10)->create();
    }
}
