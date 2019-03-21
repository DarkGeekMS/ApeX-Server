<?php

use Illuminate\Database\Seeder;

class saveComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\saveComment::class, 10)->create();
    }
}
