<?php

use App\Models\User;
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
    static $i = 1;
    return [
        'id' => 't2_'.(string)(count(DB::table('users')->pluck('id')->all()) + $i++),
        'fullname'=>$faker->name,
        'email' => $faker->unique()->safeEmail,
        'username'=>$faker->userName,
        'password' => '$2y$10$Bn8ou70RVD03.XejoQ4fWeqn.JR6KOX3GO84Di/qvJnUKK190ATVG',
        'avatar'=>'public\img\def.jpg',
        'karma'=>1,
        'notification'=>true,
        'type'=>rand(1, 3)
    ];
});
