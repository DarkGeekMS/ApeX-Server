<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Vote::class, function (Faker $faker) {
    $posts = DB::table('posts')->pluck('id')->all();
    return [
        'postID'=> $posts[array_rand($posts)],
        'userID'=> factory(App\Models\User::class)->create(),
        'dir'=>rand(-1, 1)
    ];
});
