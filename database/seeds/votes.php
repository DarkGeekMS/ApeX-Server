<?php

use Illuminate\Database\Seeder;

class votes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert([
            'postID' => 't3_100000',
            'userID' => 't2_100001',
            'dir' => 1
        ]);
        factory(App\vote::class, 10)->create();
    }
}
