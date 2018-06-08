<?php

use App\Talk;
use Faker\Generator as Faker;

$factory->define(Talk::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'description' => $faker->paragraph(),
        'slides_url' => $faker->url,
        'video_url' => $faker->url,
        'thumbnail_path' => 'storage/thumbnails/image.jpg',
        'available_to_speak' => false,
    ];
});
