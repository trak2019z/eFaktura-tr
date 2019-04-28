<?php

use Faker\Generator as Faker;

$factory->define(App\Invoice::class, function (Faker $faker) {
    static $password;

    return [
        'number' => $faker->randomNumber(),
		'firstName' => $faker->name,
		'lastName' => $faker->name,
		'town' => $faker->address,
		'postcode' => '36-145',
		'postcode_town' => $faker->address,
		'property_number' => '23',
        'status' => $faker->numberBetween(0,1),
    ];
});

