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
            'id' => 't2_100000',
            'fullname' => 'Monda Talaat',
            'email' => 'monda21@gmail.com',
            'username' => 'Monda Talaat',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => 2
        ]);

        DB::table('users')->insert([
            'id' => 't2_100001',
            'fullname' => 'Maxwell',
            'email' => 'max@gmail.com',
            'username' => 'mX',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        DB::table('users')->insert([
            'id' => 't2_100002',
            'fullname' => 'Any Hooman',
            'email' => 'AHom@gmail.com',
            'username' => 'Anyone',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

        DB::table('users')->insert([
            'id' => 't2_100003',
            'fullname' => 'Martin Luther King',
            'email' => 'king@gmail.com',
            'username' => 'King',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'type' => 2
        ]);
        factory(App\User::class, 10)->create();
    }
}
