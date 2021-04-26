<?php

use Faker\Generator as Faker;

$factory->define(\App\Warehouse::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'status' => $faker->numberBetween(0,1),
        'add' => $faker->address,
    ];
});
