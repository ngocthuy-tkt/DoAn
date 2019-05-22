<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    $name = $faker->name;
    $slug = \Illuminate\Support\Str::slug($name);
    $price = $faker->numberBetween(30000, 10000000);

    $categories = \App\Models\Category::all()->pluck('id');
    $author = \App\Models\Author::all()->pluck('id');
    $publishing_house = \App\Models\PublishingHouse::all()->pluck('id');

    return [
        'name' => $name,
        'slug' => $slug,
        'category_id' => $faker->randomElement($categories),
        'author_id' => $faker->randomElement($author),
        'publishing_house_id' => $faker->randomElement($publishing_house),
        'price' => $price,
        'discount_price' => $faker->numberBetween(0, $price),
        'image' => 'https://picsum.photos/200/300/?random=' . $faker->numberBetween(1, 1000),
        'quantity' => $faker->numberBetween(0, 100),
    ];
});
