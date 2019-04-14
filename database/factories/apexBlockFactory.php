<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ApexBlock::class, function (Faker $faker) {
    $apex = DB::table('apex_coms')->pluck('id')->all();
    return [
      'blockedID' => factory(App\Models\User::class)->create(),
      'ApexID' => $apex[array_rand($apex)]
    ];
});
