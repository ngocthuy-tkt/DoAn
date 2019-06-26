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
    Route::get('/san-pham-ban-chay', 'Backend\DashboardController@banchay')->name('banchay');
    Route::get('/san-pham-ban-cham', 'Backend\DashboardController@bancham')->name('bancham');
    Route::get('/hang-sap-het-trong-kho', 'Backend\DashboardController@hanghet')->name('hanghet');

    Route::resource('administration', 'Backend\AdminController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('users', 'Backend\UserController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('category', 'Backend\CategoryController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('author', 'Backend\AuthorController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('publishing_house', 'Backend\PublishingHouseController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('products', 'Backend\ProductController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('banner', 'Backend\BannerController', ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]);
    Route::resource('order', 'Backend\OrderController', ['only' => ['index', 'edit', 'update']]);
    Route::resource('supplier', 'Backend\SupplierController');
    Route::resource('invoice', 'Backend\InvoiceController');
    Route::resource('bill', 'Backend\BillOfSaleController', ['only' => ['index', 'create', 'store']]);
    Route::resource('inventory', 'Backend\InventoryController', ['only' => ['index', 'create', 'store']]);
    Route::resource('phieunhap', 'Backend\EnterCouponController');

});


Route::get('/', 'HomeController@index')->name('home');
Route::get('/{slug}/{id}', 'CategoryController@index')->name('danh-muc');
Route::get('/pro/{id}/{slug}', 'ProductController@index')->name('detail');
Route::get('/cart', 'CartController@index')->name('cart');
Route::post('/cart', 'CartController@addToCart')->name('addToCart');
Route::delete('/{id}', 'CartController@destroy')->name('cart.destroy');
Route::patch('gio-hang/{id}', 'CartController@update')->name('cart.update');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::post('/checkout', 'CheckoutController@order')->name('order');


Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.submit');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/signup', 'HomeController@signupForm')->name('signup');
Route::post('/signup', 'HomeController@create')->name('signup');
Route::get('/lich-su-mua-hang', 'HomeController@historyOrder')->name('historyOrder');
Route::get('/tai-khoan', 'HomeController@detailAccount')->name('detailAccount');
Route::post('/tai-khoan', 'HomeController@postDetailAccount')->name('detailAccount');
Route::get('/quydinhdoitra', 'HomeController@quydinhdoitra')->name('quydinhdoitra');

//search
Route::get('/search', 'HomeController@searchByName')->name('search');
