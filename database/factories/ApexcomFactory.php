<?php

use Faker\Generator as Faker;

$factory->define(App\apexCom::class, function (Faker $faker) {
    return [
      'id' => 't5_'.str_random(6),
      'avatar'=>'public\img\apx.png',
      'banner'=>'public\img\banner.jpg',
      'rules' => $faker->text,
      'description' => $faker->text,
    ];
});
