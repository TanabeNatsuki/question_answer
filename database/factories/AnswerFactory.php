<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'question_id' => $faker->numberBetween($min = 1, $max = 30),
        'user_id' => $faker->numberBetween($min = 1,$max = 30),
        'content' => $faker->paragraph(),
        'created_at' => $faker->datetime($max = 'now',$timezone = date_default_timezone_get()),
        'updated_at' => $faker->datetime($max = 'now',$timezone = date_default_timezone_get()),
    ];
});
