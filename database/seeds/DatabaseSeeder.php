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
         $this->call([
           Users::class,
           apeXcoms::class,
           posts::class,
           messages::class,
           comments::class,
           apexBlocks::class,
           //blocks::class,
           commentVotes::class,
           //hiddens::class,
           moderators::class,
           //reportComments::class,
           //reportPosts::class,
           saveComments::class,
           savePosts::class,
           subscribers::class,
           votes::class
         ]);
    }
}
