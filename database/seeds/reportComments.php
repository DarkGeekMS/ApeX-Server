<?php

use Illuminate\Database\Seeder;
use App\Models\ReportComment;

class reportComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ReportComment::class, 5)->create();
    }
}
