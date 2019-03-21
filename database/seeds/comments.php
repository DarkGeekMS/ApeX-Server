<?php

use Illuminate\Database\Seeder;

class comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->insert([
            'id' => 't1_1',
            'commented_by' => 't2_1',
            'content' => 'Hey there',
            'root' => 't3_1'
        ]);

        DB::table('comments')->insert([
            'id' => 't1_2',
            'commented_by' => 't2_3',
            'content' => 'Hey there',
            'root' => 't3_2'
        ]);

        DB::table('comments')->insert([
            'id' => 't1_3',
            'commented_by' => 't2_2',
            'content' => 'Hey there',
            'root' => 't3_3'
        ]);

        DB::table('comments')->insert([
            'id' => 't1_4',
            'commented_by' => 't2_2',
            'content' => 'Hey there',
            'root' => 't3_4'
        ]);

        DB::table('comments')->insert([
            'id' => 't1_5',
            'commented_by' => 't2_4',
            'content' => 'Hey there',
            'root' => 't3_5'
        ]);
        factory(App\comment::class, 10)->create();
    }
}
