<?php

namespace App\Providers;

use App\Models\PublishingHouse;
use App\Repositories\AdminInterface;
use App\Repositories\AdminRepository;
use App\Repositories\AuthorInterface;
use App\Repositories\AuthorRepository;
use App\Repositories\BannerInterface;
use App\Repositories\BannerRepository;
use App\Repositories\CartInterface;
use App\Repositories\CartRepository;
use App\Repositories\CategoryInterface;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductInterface;
use App\Repositories\ProductRepository;
use App\Repositories\PublishingHouseInterface;
use App\Repositories\PublishingHouseRepository;
use App\Repositories\UserInterface;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindingRepository();
    }

    public function registerBindingRepository()
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);

        $this->app->bind(UserInterface::class, UserRepository::class);

        $this->app->bind(CategoryInterface::class, CategoryRepository::class);

        $this->app->bind(AuthorInterface::class, AuthorRepository::class);

        $this->app->bind(PublishingHouseInterface::class, PublishingHouseRepository::class);

        $this->app->bind(ProductInterface::class, ProductRepository::class);

        $this->app->bind(BannerInterface::class, BannerRepository::class);

        $this->app->bind(CartInterface::class, CartRepository::class);
    }
}
