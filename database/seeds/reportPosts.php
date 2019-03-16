<?php

use Illuminate\Database\Seeder;

class reportPosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\reportPost::class, 10)->create();
    }
}
