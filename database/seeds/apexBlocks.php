<?php

use Illuminate\Database\Seeder;

class apexBlocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apex_blocks')->insert([
            'ApexID' => 't5_1',
            'blockedID' => 't2_1'
        ]);
        factory(App\apexBlock::class, 10)->create();
    }
}
