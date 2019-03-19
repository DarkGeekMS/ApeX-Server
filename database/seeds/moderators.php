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
            'apexID' => 't5_100000',
            'userID' => 't2_100000'
        ]);

        DB::table('moderators')->insert([
            'apexID' => 't5_100001',
            'userID' => 't2_100003'
        ]);
        factory(App\moderator::class, 10)->create();
    }
}
