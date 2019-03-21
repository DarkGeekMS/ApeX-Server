<?php

use Illuminate\Database\Seeder;

class blocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([
            'blockerID' => 't2_1',
            'blockedID' => 't2_2'
        ]);
        factory(App\block::class, 10)->create();
    }
}
