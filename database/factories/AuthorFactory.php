<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'avatar' => "https://picsum.photos/200/200/?random" . $faker->numberBetween(1, 100),
    ];
});
