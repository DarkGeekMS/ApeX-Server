<?php

use Illuminate\Database\Seeder;
use App\Models\SaveComment;

class saveComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SaveComment::class, 10)->create();
    }
}
