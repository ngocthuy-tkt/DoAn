<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Category::class, function (Faker $faker) {

    $name = $faker->name;
    $slug = \Illuminate\Support\Str::slug($name);

    $categories = \App\Models\Category::all()->pluck('id');
    if (count($categories) <= 4) {
        $categories = [0];
    } else {
        $categories = $categories->toArray();
    }

    return [
        'name' => $name,
        'slug' => $slug,
        'parent_id' =>$faker->randomElement($categories),
    ];
});
