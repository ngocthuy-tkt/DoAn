<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\PublishingHouse::class, function (Faker $faker) {
    return [
        'name' => $faker->company
    ];
});
