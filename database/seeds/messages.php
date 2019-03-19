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
            'id' => 't4_100000',
            'content' => 'Hello there',
            'sender' => 't2_100001',
            'receiver' => 't2_100002'
        ]);
        factory(App\message::class, 10)->create();
    }
}
