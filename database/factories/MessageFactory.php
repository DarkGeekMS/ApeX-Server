<?php

use Faker\Generator as Faker;

$factory->define(App\message::class, function (Faker $faker) {
    static $id = 0;
    $users = DB::table('users')->pluck('id')->all();
    return [
        'id'=>'t4_'.(string)$id++,
        'content'=> $faker->text,
        'subject'=>str_random(10),
        'parent'=>null,
        'sender'=>factory(App\User::class)->create(),
        'receiver'=>factory(App\User::class)->create(),
        'received'=>false,
        'delSend'=>false,
        'delReceive'=>false
    ];
});
