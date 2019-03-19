<?php

use Faker\Generator as Faker;

$factory->define(App\post::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->all();
    $apex = DB::table('apex_coms')->pluck('id')->all();
    return [
      'id' => 't3_'.(string)rand(100000, 999999),
      'posted_by' => factory(App\User::class)->create(),
      'apex_id' => $apex[array_rand($apex)],
      'title' => str_random(10),
      'img'=>null,
      'videolink'=>null,
      'content'=>$faker->text,
      'locked'=>false
    ];
});
