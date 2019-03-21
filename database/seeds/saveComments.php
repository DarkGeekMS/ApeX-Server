<?php

use Illuminate\Database\Seeder;

class saveComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('save_comments')->insert([
            'comID' => 't1_1',
            'userID' => 't2_2'
        ]);
        factory(App\saveComment::class, 10)->create();
    }
}
