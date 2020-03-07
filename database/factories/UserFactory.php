<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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
    return [
        'name' => $faker->name,
        'date_of_birth' => $faker->dateTimeThisCentury($max = 'now'),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt(123456),
        'role' =>rand(1,2),
        'avatar' =>$faker->imageUrl(640, 480, 'people'),
    ];
});
