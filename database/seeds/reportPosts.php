<?php

use Illuminate\Database\Seeder;
use App\Models\ReportPost;

class reportPosts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ReportPost::class, 10)->create();
    }
}
