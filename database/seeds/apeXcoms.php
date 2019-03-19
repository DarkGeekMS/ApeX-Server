<?php

use Illuminate\Database\Seeder;

class apeXcoms extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('apex_coms')->insert([
            'id' => 't5_100000',
            'name' => 'Elder Scrolls',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_100001',
            'name' => 'New dawn',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);
        factory(App\apexCom::class, 10)->create();
    }
}
