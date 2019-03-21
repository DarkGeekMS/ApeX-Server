<?php

use Faker\Generator as Faker;

$factory->define(App\savePost::class, function (Faker $faker) {
    $posts = DB::table('posts')->pluck('id')->all();
    return [
        'postID'=> $posts[array_rand($posts)],
        'userID'=> factory(App\User::class)->create()
    ];
});
