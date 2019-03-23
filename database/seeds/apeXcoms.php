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
            'id' => 't5_1',
            'name' => 'Elder Scrolls',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_2',
            'name' => 'New dawn',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_3',
            'name' => 'gaming area',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_4',
            'name' => 'foods',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_5',
            'name' => 'sports',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_6',
            'name' => 'technology',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_7',
            'name' => 'memes',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_8',
            'name' => 'movies',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_9',
            'name' => 'health care',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);

        DB::table('apex_coms')->insert([
            'id' => 't5_10',
            'name' => 'comics',
            'avatar' => 'public\img\apx.png',
            'banner' => 'public\img\banner.jpg',
            'rules' => 'NO RULES',
            'description' => 'The name says it all.',
        ]);
    }
}
