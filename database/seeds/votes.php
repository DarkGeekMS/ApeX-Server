<?php

use Illuminate\Database\Seeder;
use App\Models\Vote;

class votes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Vote::class, 8)->create();
    }
}
