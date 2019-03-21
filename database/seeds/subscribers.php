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
        factory(App\subscriber::class, 10)->create();
    }
}
