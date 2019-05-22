<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Banner::class, function (Faker $faker) {
    $title = $faker->name;
    $slug = \Illuminate\Support\Str::slug($title);

    return [
        'title' => $title,
        'slug' => $slug,
        'link' => "#",
        'image' => 'https://picsum.photos/900/300/?random=' . $faker->numberBetween(1, 1000)
    ];
});
