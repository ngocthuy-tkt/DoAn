<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin'], function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

    Route::get('/', 'Backend\DashboardController@index')->name('admin');

    Route::resource('administration', 'backend\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('users', 'backend\UserController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('category', 'backend\CategoryController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('author', 'backend\AuthorController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('publishing_house', 'backend\PublishingHouseController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('products', 'backend\ProductController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('banner', 'backend\BannerController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('order', 'backend\OrderController', ['only' => ['index', 'edit', 'update']]);

});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/{slug}/{id}', 'CategoryController@index')->name('danh-muc');
Route::get('/pro/{id}/{slug}', 'ProductController@index')->name('detail');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/add/{id}', 'CartController@addToCart')->name('add_cart');
Route::get('/cart/remove/{id}', 'CartController@removeCartItem')->name('remove_cart');
Route::get('/cart/update/{id}/{qty}', 'CartController@updateCartItem')->name('update_cart');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@order')->name('order');


Route::get('/login', 'HomeController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/signup', 'HomeController@signupForm')->name('signup');
Route::post('/signup', 'HomeController@creat')->name('signup');
