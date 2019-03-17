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
        factory(App\block::class, 10)->create();
    }
}
