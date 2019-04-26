<?php

use Illuminate\Database\Seeder;
use App\Models\Subscriber;

class subscribers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Subscriber::class, 10)->create();
    }
}
