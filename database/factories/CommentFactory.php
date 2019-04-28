<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    static $i = 1;
    $lastCom = App\Models\Comment::selectRaw('CONVERT( SUBSTR(id, 4), INT) AS intID')->get()->max('intID');
    $posts = DB::table('posts')->pluck('id')->all();
    return [
      'id' => 't1_'.(string)($lastCom + $i++),
      'commented_by' => factory(App\Models\User::class)->create(),
      'content'=> $faker->text,
      'root'=> $posts[array_rand($posts)],
      'parent'=>null
    ];
});
