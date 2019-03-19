<?php

use App\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    static $id = 0;
    return [
        'id' => 't2_'.(string)$id++,
        'fullname'=>$faker->name,
        'email' => $faker->unique()->safeEmail,
        'username'=>$faker->userName,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'avatar'=>'public\img\def.jpg',
        'karma'=>1,
        'notification'=>true,
        'type'=>rand(1, 3)
    ];
});
