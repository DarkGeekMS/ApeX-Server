<?php

use Illuminate\Database\Seeder;

class hiddens extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\hidden::class, 10)->create();
    }
}
