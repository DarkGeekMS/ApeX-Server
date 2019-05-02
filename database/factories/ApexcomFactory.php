<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ApexCom::class, function (Faker $faker) {
    static $i = 1;
    $lastApex = App\Models\ApexCom::selectRaw('CONVERT( SUBSTR(id, 4), INT) AS intID')->get()->max('intID');
    return [
      'id' =>  't5_'.(string)($lastApex + $i++),
      'name' => str_random(10),
      'avatar'=>'/storage/avatars/users/t2_3872.jpg',
      'banner'=>'/storage/avatars/users/t2_3872.jpg',
      'rules' => $faker->text,
      'description' => $faker->text,
    ];
});
