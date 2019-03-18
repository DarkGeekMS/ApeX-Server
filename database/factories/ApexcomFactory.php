<?php

use Faker\Generator as Faker;

$factory->define(App\apexCom::class, function (Faker $faker) {
    return [
      'id' => 't5_'.(string)rand(100000, 999999),
      'name' => str_random(10),
      'avatar'=>'public\img\apx.png',
      'banner'=>'public\img\banner.jpg',
      'rules' => $faker->text,
      'description' => $faker->text,
    ];
});
