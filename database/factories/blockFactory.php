<?php

use Faker\Generator as Faker;

$factory->define(App\block::class, function (Faker $faker) {
    return [
        'blockerID' => factory(App\User::class)->create(),
        'blockedID' => factory(App\User::class)->create()
    ];
});
