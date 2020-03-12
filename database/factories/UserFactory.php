<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
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
    static $password;
    return [
      'point_id' => $faker->unique()->numberBetween($min = 1,$max = 30),
      'email' => $faker->unique()->safeEmail,
      'password' => $password ?: $password = bcrypt('secret'),
      'name' => $faker->name,
      'status' => 1,
      'email_verify_token' => base64_encode('index396@gmail.com'),
      'created_at' => $faker->datetime($max = 'now',$timezone = date_default_timezone_get()),
      'updated_at' => $faker->datetime($max = 'now',$timezone = date_default_timezone_get()),
    ];
});
