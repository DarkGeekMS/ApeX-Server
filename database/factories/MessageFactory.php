<?php

use Faker\Generator as Faker;
use App\Models\Message;
use App\Models\User;

$factory->define(App\Models\Message::class, function (Faker $faker) {
    static $i = 1;
    $lastmsg = App\Models\Message::selectRaw('CONVERT( SUBSTR(id, 4), INT) AS intID')->get()->max('intID');
    $delSend = $faker->boolean;
    $delReceived = [!$delSend, false];
    $messages = [null, Message::inRandomOrder()->first()];
    $users = User::pluck('id')->toArray();
    return [
        'id' => 't4_'.(string)($lastmsg + $i++),
        'content' => $faker->text,
        'subject' => $faker->sentence,
        'parent' => $messages[array_rand($messages)],
        'sender' => $users[array_rand($users)],
        'receiver' => $users[array_rand($users)],
        'received' => $faker->boolean,
        'delSend' => $delSend,
        'delReceive' => $delReceived[array_rand($delReceived)]
    ];
});
