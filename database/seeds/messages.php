<?php

use Illuminate\Database\Seeder;
use App\message;

class messages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        message::create([
          'id' => 't4_1',
          'content' => 'Hello there',
          'sender' => 't2_1',
          'receiver' => 't2_4',
          'created_at' => '2019-03-23 17:20:50'
        ]);

        message::create([
          'id' => 't4_2',
          'content' => 'Hello there',
          'sender' => 't2_1',
          'receiver' => 't2_3',
          'created_at' => '2019-03-23 17:20:51'
        ]);

        message::create([
          'id' => 't4_3',
          'content' => 'Hello there',
          'sender' => 't2_11',
          'receiver' => 't2_4',
          'created_at' => '2019-03-23 17:20:52'
        ]);

        message::create([
          'id' => 't4_4',
          'content' => 'Hello there',
          'sender' => 't2_10',
          'receiver' => 't2_14',
          'created_at' => '2019-03-23 17:20:53'
        ]);

        message::create([
          'id' => 't4_5',
          'content' => 'Hello there',
          'sender' => 't2_4',
          'receiver' => 't2_6',
          'created_at' => '2019-03-23 17:20:54'
        ]);

        message::create([
          'id' => 't4_6',
          'content' => 'Hello there',
          'sender' => 't2_7',
          'receiver' => 't2_4',
          'created_at' => '2019-03-23 17:20:55'
        ]);
    }
}
