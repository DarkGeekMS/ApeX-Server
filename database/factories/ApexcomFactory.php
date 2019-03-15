<?php

use Faker\Generator as Faker;

$factory->define(App\apexCom::class, function (Faker $faker) {
    return [
      'id' => $faker->unique()->id,
      'rules' => $faker->unique()->rules,
      'description' => $faker->description,
    ];
});
