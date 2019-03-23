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
          'comID' => 't1_10',
          'userID' => 't2_12',
          'dir' => 1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_13',
          'userID' => 't2_10',
          'dir' => 1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_8',
          'userID' => 't2_15',
          'dir' => -1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_9',
          'userID' => 't2_12',
          'dir' => 1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_13',
          'userID' => 't2_15',
          'dir' => -1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_7',
          'userID' => 't2_12',
          'dir' => -1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_11',
          'userID' => 't2_8',
          'dir' => 1
        ]);

        DB::table('comment_votes')->insert([
          'comID' => 't1_13',
          'userID' => 't2_9',
          'dir' => 1
        ]);
    }
}
