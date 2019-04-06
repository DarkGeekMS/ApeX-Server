<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $apex = DB::table('apex_coms')->pluck('id')->all();
    static $i = 1;
    return [
      'id' => 't3_'.(string)(count(DB::table('posts')->pluck('id')->all()) + $i++),
      'posted_by' => factory(App\Models\User::class)->create(),
      'apex_id' => $apex[array_rand($apex)],
      'title' => str_random(10),
      'img'=>null,
      'videolink'=>null,
      'content'=>$faker->text,
      'locked'=>false
    ];
});
