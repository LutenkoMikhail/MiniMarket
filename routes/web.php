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

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', 'WelcomeController@index')->name('welcome.start');
Route::get('/index', 'WelcomeController@index')->name('welcome.index');
Route::get('/products', 'WelcomeController@allProducts')->name('products.index');
Route::get('products/{product}', 'WelcomeController@show')->name('product.show');
Route::get('/categories', 'WelcomeController@allCategories')->name('categories.index');
Route::get('category/{category}', 'CategoryController@index')->name('categories.product.show');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('customer')->prefix('customer')->name('customer.')->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('/home', 'HomeController@index')->name('home');

        Route::get('cart', 'CartController@index')->name('cart');
        Route::post('cart/{product}/add', 'CartController@AddProductToCart')->name('cart.add');
        Route::post('cart/{product}/count/update', 'CartController@updateProductCount')->name('cart.count.update');
        Route::post('cart/{product}/delete', 'CartController@deleteProduct')->name('cart.delete.product');
        Route::get('cart/create/order', 'CartController@createOrder')->name('cart.create.order');
        Route::post('cart/store/order', 'CartController@store')->name('cart.store.order');
    });

Route::namespace('admin')->prefix('admin')->name('admin.')->middleware(['auth', 'admin'])
    ->group(function () {
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/categories/create', 'CategoryController@create')->name('categories.create');
        Route::post('/categories/store', 'CategoryController@store')->name('categories.store');
        Route::get('/categories/{category}/delete', 'CategoryController@destroy')->name('categories.delete');
        Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('categories.edit');
        Route::post('/categories/{category}/update', 'CategoryController@update')->name('categories.update');

        Route::get('/product/create', 'ProductController@create')->name('product.create');
        Route::post('/product/store', 'ProductController@store')->name('product.store');
        Route::get('/product/{product}/edit', 'ProductController@edit')->name('product.edit');
        Route::post('/product/{product}/update', 'ProductController@update')->name('product.update');
        Route::get('/products/{product}/delete', 'ProductController@destroy')->name('product.delete');

        Route::get('/orders', 'OrderController@index')->name('orders.index');
        Route::get('/order/{order}', 'OrderController@show')->name('order.show');
        Route::get('/order/{order}/edit', 'OrderController@edit')->name('order.edit');
        Route::post('/order/{order}/update', 'OrderController@update')->name('order.update');;
        Route::get('/order/{order}/delete', 'OrderController@destroy')->name('order.delete');

//
//        Route::get('/', 'AdminController@index')->name('dashboard');
//
//        Route::get('/products', 'ProductController@index')->name('products');


//        Route::get('/products/{product}/delete', 'ProductController@destroy')->name('products.delete');
//
//        Route::get('/categories', 'CategoryController@index')->name('categories');


//
//        Route::get('/users', 'UserController@index')->name('users');
//        Route::get('/users/create', 'UserController@create')->name('users.create');
//        Route::post('/users/store', 'UserController@store')->name('users.store');
//        Route::get('/users/{user}', 'UserController@show')->name('users.show');
//        Route::get('/users/{user}/edit', 'UserController@edit')->name('users.edit');
//        Route::post('/users/{user}/update', 'UserController@update')->name('users.update');
//        Route::get('/users/{user}/delete', 'UserController@destroy')->name('users.delete');
//
//        Route::get('/orders', 'OrderController@index')->name('orders');
//        Route::get('/orders/create', 'OrderController@create')->name('orders.create');

    });

// This route cannot be found
Route::fallback(function () {
    return 'This route cannot be found. Sorry.';
});
