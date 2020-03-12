<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'category_id' => $faker->numberBetween($min = 1,$max = 30),
        'title' => $faker->sentence(10),
        'content' => $faker->paragraph(),
        'created_at' => $faker->datetime($max = 'now',$timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now',$timezone = date_default_timezone_get()),
    ];
});
