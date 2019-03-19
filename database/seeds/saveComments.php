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
            'comID' => 't1_100000',
            'userID' => 't2_100001'
        ]);
        factory(App\saveComment::class, 10)->create();
    }
}
