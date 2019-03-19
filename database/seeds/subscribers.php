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
            'apexID' => 't5_100000',
            'userID' => 't2_100002'
        ]);
        factory(App\subscriber::class, 10)->create();
    }
}
