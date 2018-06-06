<?php

use App\Talk;
use Faker\Generator as Faker;

$factory->define(Talk::class, function (Faker $faker) {
    return [
        'title' => $faker->title(),
        'description' => $faker->paragraph(),
        'accepting_petitions' => false,
    ];
});
