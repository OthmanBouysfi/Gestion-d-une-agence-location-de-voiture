<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Command;
use Faker\Generator as Faker;

$factory->define(Command::class, function (Faker $faker) {
    return [
        'user_id' => App\User::pluck('id')->random(),
        'car_id' =>  App\Car::pluck('id')->random(),
        'dateL' =>  $faker->datetime(),
        'dateR' =>  $faker->datetime(),
        'prixTTC' =>  $faker->randomDigit(100,5000),
        'notes' =>  $faker->text(300),

    ];
});
