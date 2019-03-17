<?php

use Illuminate\Database\Seeder;

class apeXcoms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\apexCom::class, 10)->create();
    }
}
