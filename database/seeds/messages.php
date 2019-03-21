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
        factory(App\message::class, 10)->create();
    }
}
