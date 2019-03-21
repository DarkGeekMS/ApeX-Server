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
            'posted_by' => 't2_2',
            'apex_id' => 't5_1',
            'title' => 'Anything'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_2',
            'posted_by' => 't2_1',
            'apex_id' => 't5_1',
            'title' => 'Anything'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_3',
            'posted_by' => 't2_4',
            'apex_id' => 't5_1',
            'title' => 'Anything'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_4',
            'posted_by' => 't2_2',
            'apex_id' => 't5_1',
            'title' => 'Anything'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_5',
            'posted_by' => 't2_1',
            'apex_id' => 't5_2',
            'title' => 'Anything'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_6',
            'posted_by' => 't2_4',
            'apex_id' => 't5_2',
            'title' => 'Anything'
        ]);

        factory(App\post::class, 10)->create();
    }
}
