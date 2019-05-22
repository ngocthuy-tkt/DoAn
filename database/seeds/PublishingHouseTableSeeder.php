<?php

use Illuminate\Database\Seeder;

class PublishingHouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\PublishingHouse::class, 10)->create();
    }
}
