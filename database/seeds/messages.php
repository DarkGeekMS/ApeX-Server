<?php

use Illuminate\Database\Seeder;

class messages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'id' => 't4_1',
            'content' => 'Hello there',
            'sender' => 't2_1',
            'receiver' => 't2_4'
        ]);

        DB::table('messages')->insert([
            'id' => 't4_2',
            'content' => 'Hello there',
            'sender' => 't2_1',
            'receiver' => 't2_3'
        ]);

        DB::table('messages')->insert([
            'id' => 't4_3',
            'content' => 'Hello there',
            'sender' => 't2_11',
            'receiver' => 't2_4'
        ]);

        DB::table('messages')->insert([
            'id' => 't4_4',
            'content' => 'Hello there',
            'sender' => 't2_10',
            'receiver' => 't2_14'
        ]);

        DB::table('messages')->insert([
            'id' => 't4_5',
            'content' => 'Hello there',
            'sender' => 't2_4',
            'receiver' => 't2_6'
        ]);

        DB::table('messages')->insert([
            'id' => 't4_6',
            'content' => 'Hello there',
            'sender' => 't2_7',
            'receiver' => 't2_4'
        ]);
    }
}
