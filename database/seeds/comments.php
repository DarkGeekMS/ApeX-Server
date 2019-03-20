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
        factory(App\comment::class, 10)->create();
    }
}
