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
        Moderator::create([
            'apexID' => 't5_1',
            'userID' => 't2_1'
        ]);

        Moderator::create([
            'apexID' => 't5_2',
            'userID' => 't2_3'
        ]);

        factory(Moderator::class, 10)->create();
    }
}
