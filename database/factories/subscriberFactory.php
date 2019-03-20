<?php

use Faker\Generator as Faker;

$factory->define(App\subscriber::class, function (Faker $faker) {
    $apex = DB::table('apex_coms')->pluck('id')->all();
    return [
        'apexID'=> $apex[array_rand($apex)],
        'userID'=> factory(App\User::class)->create()
    ];
});
