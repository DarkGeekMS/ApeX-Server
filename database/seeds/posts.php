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
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:30'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_2',
            'posted_by' => 't2_1',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:31'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_3',
            'posted_by' => 't2_4',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:32'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_4',
            'posted_by' => 't2_2',
            'apex_id' => 't5_1',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:33'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_5',
            'posted_by' => 't2_2',
            'apex_id' => 't5_2',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:34'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_6',
            'posted_by' => 't2_4',
            'apex_id' => 't5_2',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:35'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_7',
            'posted_by' => 't2_10',
            'apex_id' => 't5_3',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:36'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_8',
            'posted_by' => 't2_12',
            'apex_id' => 't5_3',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:37'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_9',
            'posted_by' => 't2_7',
            'apex_id' => 't5_4',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:38'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_10',
            'posted_by' => 't2_8',
            'apex_id' => 't5_4',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:39'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_11',
            'posted_by' => 't2_8',
            'apex_id' => 't5_3',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:40'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_12',
            'posted_by' => 't2_9',
            'apex_id' => 't5_5',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:41'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_13',
            'posted_by' => 't2_12',
            'apex_id' => 't5_6',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:42'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_14',
            'posted_by' => 't2_15',
            'apex_id' => 't5_7',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:43'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_15',
            'posted_by' => 't2_13',
            'apex_id' => 't5_8',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:44'
        ]);

        DB::table('posts')->insert([
            'id' => 't3_16',
            'posted_by' => 't2_6',
            'apex_id' => 't5_9',
            'title' => 'Anything',
            'created_at' => '2019-03-23 17:20:45'
        ]);
    }
}
