<?php

use Faker\Generator as Faker;

$factory->define(App\reportComment::class, function (Faker $faker) {
    $comments = DB::table('comments')->pluck('id')->all();
    return [
        'comID' => $comments[array_rand($comments)],
        'userID' => factory(App\User::class)->create(),
        'content' => $faker->text
    ];
});
