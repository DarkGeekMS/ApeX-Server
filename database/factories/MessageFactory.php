<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Message::class, function (Faker $faker) {
    static $i = 1;
    return [
        'id'=>'t4_'.(string)(count(DB::table('messages')->pluck('id')->all()) + $i++),
        'content'=> $faker->text,
        'subject'=>str_random(10),
        'parent'=>null,
        'sender'=>factory(App\Models\User::class)->create(),
        'receiver'=>factory(App\Models\User::class)->create(),
        'received'=>false,
        'delSend'=>false,
        'delReceive'=>false
    ];
});
