<?php

use Illuminate\Database\Seeder;

class messages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\message::class, 10)->create();
    }
}
