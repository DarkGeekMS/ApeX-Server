<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ApexCom::class, function (Faker $faker) {
    static $i = 1;
    return [
      'id' => 't5_'.(string)(count(DB::table('apex_coms')->pluck('id')->all()) + $i++),
      'name' => str_random(10),
      'avatar'=>'public\img\apx.png',
      'banner'=>'public\img\banner.jpg',
      'rules' => $faker->text,
      'description' => $faker->text,
    ];
});
