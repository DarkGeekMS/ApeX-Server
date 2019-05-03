<?php

use Illuminate\Database\Seeder;
use App\Models\ApexCom;

class apeXcoms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ApexCom::class, 5)->create();
    }
}
