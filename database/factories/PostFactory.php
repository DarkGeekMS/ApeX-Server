<?php

use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->all();
    $apex = DB::table('apex_coms')->pluck('id')->all();
    return [
      'id' => 't3_'.str_random(6),
      'posted_by' => factory(App\User::class)->create(),
      'apex_id' => $apex[array_rand($apex)],
      'img'=>null,
      'videolink'=>null,
      'content'=>$faker->text,
      'posted_at'=>now(),
      'locked'=>false
    ];
});
