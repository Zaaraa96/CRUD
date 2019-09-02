<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\host;
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



$factory->define(host::class, function (Faker $faker) {
    return [
          'hostname'  => $faker->domainName,
          'ip'  => $faker->ipv4,
          'collector'  => $faker->word,
          'assetValue'  => $faker->word,
          'icon'  => $faker->imageUrl($width = 640, $height = 480),
          'FQND'  => $faker->word,
          'OS'  => $faker->randomElement($array = array ('Mac','Ubuntu','Windows','Unix')),
          'OSversion'  => $faker->numberBetween($min = 1, $max = 10),
          'CPU'  => $faker->word,
          'CPUbrand'  => $faker->word,
          'RAM'  => $faker->word,
          'RAMbrand'  => $faker->word,
          'MACaddress'  => $faker->macAddress,
          'location'  => $faker->address,
          'HDD'  => $faker->word,
          'HDDbrand'  => $faker->word,
    ];
});
