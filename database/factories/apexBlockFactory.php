<?php

use Faker\Generator as Faker;

$factory->define(App\apexBlock::class, function (Faker $faker) {
    $apex = DB::table('apex_coms')->pluck('id')->all();
    return [
      'blockedID' => factory(App\User::class)->create(),
      'ApexID' => $apex[array_rand($apex)]
    ];
});
