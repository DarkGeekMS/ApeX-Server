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
    $lastUser = User::withTrashed()
    ->selectRaw('CONVERT( SUBSTR(id, 4), INT) AS intID')->get()->max('intID');
    return [
        'id' => 't2_'.(string)($lastUser + $i++),
        'fullname'=>$faker->name,
        'email' =>  $faker->unique()->safeEmail,
        'username'=>$faker->unique()->userName,
        'password' => '$2y$10$EFyhgTaTJGLEtHg3ylrJ/eAIoEFZ/UZ4w3/dMF5CF4NteCsB/PcgS',
        'avatar'=>'public\img\def.jpg',
        'karma'=>1,
        'notification'=>true,
        'type'=>rand(1, 3)
    ];
});
