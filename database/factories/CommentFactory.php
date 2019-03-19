<?php

use Faker\Generator as Faker;

$factory->define(App\comment::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->all();
    $posts = DB::table('posts')->pluck('id')->all();
    return [
      'id' => 't1_'.(string)rand(100000, 999999),
      'commented_by' => factory(App\User::class)->create(),
      'content'=> $faker->text,
      'root'=> $posts[array_rand($posts)],
      'parent'=>null
    ];
});
