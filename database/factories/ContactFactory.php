<?php

use Faker\Generator as Faker;

$factory->define(\App\Contact::class, function (Faker $faker) {
    return [
        'id' => rand(1, 100),
        'name' => $faker->name(),
        'phone' => $faker->unique()->phoneNumber,
        'comment' => $faker->text()
    ];
});
