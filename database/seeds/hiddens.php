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
            'postID' => 't3_100000',
            'userID' => 't2_100002'
        ]);
        factory(App\hidden::class, 10)->create();
    }
}
