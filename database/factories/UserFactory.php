<?php

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

$factory->define(\App\User::class, function (Faker $faker) {
    $roles = \App\Role::pluck('id')->toArray();
    $warehouse = \App\Take::pluck('id')->toArray();
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'id_role' => $faker->randomElement($roles),
        'id_warehouse' => $faker->randomElement($warehouse),
        'add' => $faker->address,
        'phone' => $faker->phoneNumber,
        'status' => $faker->numberBetween(5,200),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
