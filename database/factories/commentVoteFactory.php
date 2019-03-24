<?php

use Faker\Generator as Faker;

$factory->define(App\commentVote::class, function (Faker $faker) {
    $comments = DB::table('comments')->pluck('id')->all();
    return [
        'comID'=> $comments[array_rand($comments)],
        'userID'=> factory(App\User::class)->create(),
        'dir'=>rand(-1, 1)
    ];
});
