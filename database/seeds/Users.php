<?php

use Illuminate\Database\Seeder;
use App\user;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        user::create([
          'id' => 't2_1',
          'fullname' => 'Monda Talaat',
          'email' => 'monda21@gmail.com',
          'username' => 'Monda Talaat',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'type' => 2,
          'created_at' => '2019-03-23 17:20:48'
        ]);

        user::create([
          'id' => 't2_2',
          'fullname' => 'Maxwell',
          'email' => 'max@gmail.com',
          'username' => 'mX',
          'password' => '$2y$10$Bn8ou70RVD03.XejoQ4fWeqn.JR6KOX3GO84Di/qvJnUKK190ATVG',
          'created_at' => '2019-03-23 17:20:49'
        ]);

        user::create([
          'id' => 't2_3',
          'fullname' => 'Any Hooman',
          'email' => 'AHom@gmail.com',
          'username' => 'Anyone',
          'password' => '$2y$10$MH4kKI.qEnCj0MZeEr9abOgQdD.MHtBhRm6PoxWOAsCE9BxaI7Loi',
          'type' => 2,
          'created_at' => '2019-03-23 17:20:50'
        ]);

        user::create([
          'id' => 't2_4',
          'fullname' => 'Martin Luther King',
          'email' => 'king@gmail.com',
          'username' => 'King',
          'password' => '$2y$10$IYrxpk0//MRpX8lx.bhklu6.tn8FT3lqSF.LwVp5dco.UeUdfzlVS',
          'type' => 3,
          'created_at' => '2019-03-23 17:20:51'
        ]);

        user::create([
          'id' => 't2_5',
          'fullname' => 'Mohamed Shawky',
          'email' => 'DarkGeek@gmail.com',
          'username' => 'shawky',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:52'
        ]);

        user::create([
          'id' => 't2_6',
          'fullname' => 'Mohamed Ahmed',
          'email' => 'double@gmail.com',
          'username' => 'double',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'type' => 3,
          'created_at' => '2019-03-23 17:20:53'
        ]);

        user::create([
          'id' => 't2_7',
          'fullname' => 'mohamed ramzy',
          'email' => 'ramzy21@gmail.com',
          'username' => 'ramzy',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'type' => 2,
          'created_at' => '2019-03-23 17:20:54'
        ]);

        user::create([
          'id' => 't2_8',
          'fullname' => 'mazen amr',
          'email' => 'mazen21@gmail.com',
          'username' => 'mazen',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:55'
        ]);

        user::create([
          'id' => 't2_9',
          'fullname' => 'mostafa elshaaer',
          'email' => 'mostafa21@gmail.com',
          'username' => 'mostafa',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:56'
        ]);

        user::create([
          'id' => 't2_10',
          'fullname' => 'kareem osama',
          'email' => 'kareem21@gmail.com',
          'username' => 'kareem',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:57'
        ]);

        user::create([
          'id' => 't2_11',
          'fullname' => 'habiba Ali',
          'email' => 'habiba21@gmail.com',
          'username' => 'habiba',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'type' => 2,
          'created_at' => '2019-03-23 17:20:58'
        ]);

        user::create([
          'id' => 't2_12',
          'fullname' => 'dina mamdoh',
          'email' => 'dina21@gmail.com',
          'username' => 'dina',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:59'
        ]);

        user::create([
          'id' => 't2_13',
          'fullname' => 'ahmed waleed',
          'email' => 'ahmed21@gmail.com',
          'username' => 'waleed',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:60'
        ]);

        user::create([
          'id' => 't2_14',
          'fullname' => 'mohamed kheir',
          'email' => 'mohamed@gmail.com',
          'username' => 'shaheen',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:61'
        ]);

        user::create([
          'id' => 't2_15',
          'fullname' => 'menna mostafa',
          'email' => 'menna21@gmail.com',
          'username' => 'menna',
          'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
          'created_at' => '2019-03-23 17:20:62'
        ]);
    }
}
