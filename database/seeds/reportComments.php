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
            'comID' => 't1_100000',
            'userID' => 't2_100002',
            'content' => 'Sensitive content'
        ]);
        factory(App\reportComment::class, 10)->create();
    }
}
