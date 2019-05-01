<?php

use Illuminate\Database\Seeder;
use App\Models\SavePost;

class savePosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SavePost::class, 5)->create();
    }
}
