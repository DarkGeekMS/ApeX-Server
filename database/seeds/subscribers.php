<?php

use Illuminate\Database\Seeder;

class subscribers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscribers')->insert([
          'apexID' => 't5_10',
          'userID' => 't2_7'
        ]);

        DB::table('subscribers')->insert([
          'apexID' => 't5_10',
          'userID' => 't2_2'
        ]);

        DB::table('subscribers')->insert([
          'apexID' => 't5_8',
          'userID' => 't2_2'
        ]);

        DB::table('subscribers')->insert([
          'apexID' => 't5_5',
          'userID' => 't2_7'
        ]);

        DB::table('subscribers')->insert([
          'apexID' => 't5_4',
          'userID' => 't2_10'
        ]);
    }
}
