<?php

use Faker\Generator as Faker;

$factory->define(App\comment::class, function (Faker $faker) {
    static $i = 1;
    $posts = DB::table('posts')->pluck('id')->all();
    return [
      'id' => 't1_'.(string)(count(DB::table('comments')->pluck('id')->all()) + $i++),
      'commented_by' => factory(App\User::class)->create(),
      'content'=> $faker->text,
      'root'=> $posts[array_rand($posts)],
      'parent'=>null
    ];
});
