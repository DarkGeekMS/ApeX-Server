<?php

use Illuminate\Database\Seeder;

class moderators extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('moderators')->insert([
            'apexID' => 't5_1',
            'userID' => 't2_1'
        ]);

        DB::table('moderators')->insert([
            'apexID' => 't5_2',
            'userID' => 't2_4'
        ]);
        factory(App\moderator::class, 10)->create();
    }
}
