<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Car;
use Faker\Generator as Faker;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'marque' => $faker->company,
        'model' => $faker->year,
        'type' =>  $faker->word,
        'prixJ' =>  $faker->randomNumber(),
        'dispo' =>  $faker->randomDigit(0,1),
    ];
});
