<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Block::class, function (Faker $faker) {
    return [
        'blockerID' => factory(App\Models\User::class)->create(),
        'blockedID' => factory(App\Models\User::class)->create()
    ];
});
