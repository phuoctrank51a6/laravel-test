<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\PostImage;
use Faker\Generator as Faker;

$factory->define(PostImage::class, function (Faker $faker) {
    return [
        'post_id'=>rand(1,10),
        'url'=>$faker->imageUrl(640, 480, 'people'),
    ];
});
