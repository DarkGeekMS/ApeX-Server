<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 't2_1',
            'fullname' => 'Monda Talaat',
            'email' => 'monda21@gmail.com',
            'username' => 'Monda Talaat',
            'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
            'type' => 2
        ]);

        DB::table('users')->insert([
            'id' => 't2_2',
            'fullname' => 'Maxwell',
            'email' => 'max@gmail.com',
            'username' => 'mX',
            'password' => '$2y$10$Bn8ou70RVD03.XejoQ4fWeqn.JR6KOX3GO84Di/qvJnUKK190ATVG'
        ]);

        DB::table('users')->insert([
            'id' => 't2_3',
            'fullname' => 'Any Hooman',
            'email' => 'AHom@gmail.com',
            'username' => 'Anyone',
            'password' => '$2y$10$MH4kKI.qEnCj0MZeEr9abOgQdD.MHtBhRm6PoxWOAsCE9BxaI7Loi',
            'type' => 2
        ]);

        DB::table('users')->insert([
            'id' => 't2_4',
            'fullname' => 'Martin Luther King',
            'email' => 'king@gmail.com',
            'username' => 'King',
            'password' => '$2y$10$IYrxpk0//MRpX8lx.bhklu6.tn8FT3lqSF.LwVp5dco.UeUdfzlVS',
            'type' => 3
        ]);
        factory(App\User::class, 10)->create();
    }
}
