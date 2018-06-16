<?php

use App\Talk;
use App\User;
use Faker\Generator as Faker;

$factory->define(Talk::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(User::class)->create()->id;
        },
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'slides_url' => $faker->url,
        'video_url' => $faker->url,
        'thumbnail_url' => null,
        'available_to_speak' => false,
    ];
});
