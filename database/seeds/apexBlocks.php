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
        factory(App\apexBlock::class, 10)->create();
    }
}
