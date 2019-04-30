<?php

use Illuminate\Database\Seeder;
use App\Models\ApexBlock;

class apexBlocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ApexBlock::class, 5)->create();
    }
}
