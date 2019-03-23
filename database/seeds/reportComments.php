<?php

use Illuminate\Database\Seeder;

class reportComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_comments')->insert([
          'comID' => 't1_14',
          'userID' => 't2_1',
          'content' => 'Anything'
        ]);
    }
}
