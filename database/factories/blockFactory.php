<?php

use Faker\Generator as Faker;

$factory->define(App\block::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->all();
    return [
        'blockerID' => factory(App\User::class)->create(),
        'blockedID' => factory(App\User::class)->create()
    ];
});
