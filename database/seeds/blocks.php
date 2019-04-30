<?php

use Illuminate\Database\Seeder;
use App\Models\Block;

class blocks extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          factory(Block::class, 5)->create();
    }
}
