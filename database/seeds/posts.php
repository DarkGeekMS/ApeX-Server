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
            'id' => 't3_1',
            'posted_by' => 't2_3',
            'apex_id' => 't5_1',
            'title' => 'Anything'
        ]);
        factory(App\post::class, 10)->create();
    }
}
