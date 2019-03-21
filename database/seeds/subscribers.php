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
            'apexID' => 't5_1',
            'userID' => 't2_3'
        ]);
        factory(App\subscriber::class, 10)->create();
    }
}
