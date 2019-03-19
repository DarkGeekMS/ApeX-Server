<?php

use Illuminate\Database\Seeder;

class posts extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'id' => 't3_100000',
            'posted_by' => 't2_100002',
            'apex_id' => 't5_100000',
            'title' => 'Anything'
        ]);
        factory(App\post::class, 10)->create();
    }
}
