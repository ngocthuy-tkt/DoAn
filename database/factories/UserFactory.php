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

$factory->define(\App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt('123456'),
        'phone' => $faker->phoneNumber,
        'birthdays' => $faker->dateTimeBetween('-40 years', '-18 years'),
        'avatar' => 'https://picsum.photos/200/300/?random=' . $faker->numberBetween(1, 100),
        'address' => 'Ngõ 53 Lê Văn Hiến, Đức Thắng, Bắc Từ Liêm, Hà Nội'
    ];
});
