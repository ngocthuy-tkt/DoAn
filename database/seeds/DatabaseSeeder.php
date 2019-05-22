<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminTableSeeder::class);
         // $this->call(UserTableSeeder::class);
         // $this->call(AuthorTableSeeder::class);
         // $this->call(PublishingHouseTableSeeder::class);
         // $this->call(CategoryTableSeeder::class,'');
         // $this->call(ProductTableSeeder::class);
         // $this->call(BannerTableSeeder::class);
    }
}
