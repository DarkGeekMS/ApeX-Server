<?php

use Illuminate\Database\Seeder;

class reportComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('report_comments')->insert([
            'comID' => 't1_1',
            'userID' => 't2_3',
            'content' => 'Sensitive content'
        ]);
        factory(App\reportComment::class, 10)->create();
    }
}
