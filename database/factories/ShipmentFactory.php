<?php

use Faker\Generator as Faker;

$factory->define(\App\Shipments::class, function (Faker $faker) {
    $shipping = \App\User::pluck('id')->toArray();
    $warehouse = \App\Take::pluck('id')->toArray();
    return [
        'status' => $faker->numberBetween(0,1),
        'current_location' => $faker->numberBetween(5,200),
        'shipping' => $faker->$faker->randomElement($shipping),
        'amount' => $faker->numberBetween(5,200),
        'mass' => $faker->numberBetween(5,200),
        'delivery_date' => new Date,
        'first_point' => $faker->firstPoint,
        'end_point' => $faker->endPoint,
    ];
});
