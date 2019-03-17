<?php

use Faker\Generator as Faker;

$factory->define(App\message::class, function (Faker $faker) {
    $users = DB::table('users')->pluck('id')->all();
    return [
        'id'=>'t4_'.str_random(6),
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
