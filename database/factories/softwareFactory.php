<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\software;
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



$factory->define(software::class, function (Faker $faker) {
    return [
      'hostID'  => $faker->numberBetween($min = 1, $max = 10),
      'software'  => $faker->word,
    ];
});
