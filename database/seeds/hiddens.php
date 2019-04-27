<?php

use Illuminate\Database\Seeder;
use App\Models\Hidden;

class hiddens extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Hidden::class, 10)->create();
    }
}
