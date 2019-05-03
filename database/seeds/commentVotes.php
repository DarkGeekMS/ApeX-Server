<?php

use Illuminate\Database\Seeder;
use App\Models\CommentVote;

class commentVotes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CommentVote::class, 5)->create();
    }
}
