<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderService;
use Faker\Generator as Faker;

$factory->define(OrderService::class, function (Faker $faker) {
    return [
        'requester' => $faker->name,
        'department' => $faker->word,
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'contact' => $faker->phoneNumber,
        'reason' => $faker->sentence($nbWords = 6, $variablesNbWords = true),
        'soluction' => $faker->sentence($nbWords = 6, $variablesNbWords = true),
        'technician' => $faker->name,
        'date_resolution' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'status_service' => 3,
    ];
});
