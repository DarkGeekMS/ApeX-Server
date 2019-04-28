<?php

use Illuminate\Database\Seeder;
use App\Models\Moderator;

class moderators extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Moderator::class, 10)->create();
    }
}
