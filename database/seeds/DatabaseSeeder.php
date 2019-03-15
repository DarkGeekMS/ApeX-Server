<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(Users::class);
         $this->call(apeXcoms::class);
         $this->call(messages::class);
         $this->call(posts::class);
         $this->call(comments::class);
    }
}
