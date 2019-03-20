<?php

use Illuminate\Database\Seeder;

class hiddens extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hiddens')->insert([
            'postID' => 't3_1',
            'userID' => 't2_3'
        ]);
        factory(App\hidden::class, 10)->create();
    }
}
