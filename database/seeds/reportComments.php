<?php

use Illuminate\Database\Seeder;

class reportComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\reportComment::class, 10)->create();
    }
}
