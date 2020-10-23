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

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('customer')->prefix('customer')->name('customer.')->middleware(['auth'])
    ->group(function () {
        Route::get('/', 'CustomerController@index')->name('index');
        Route::get('cart', 'CartController@index')->name('cart');
        Route::post('cart/{product}/add', 'CartController@AddProductToCart')->name('cart.add');
        Route::post('cart/{product}/count/update', 'CartController@updateProductCount')->name('cart.count.update');
        Route::post('cart/{product}/delete', 'CartController@deleteProduct')->name('cart.delete.product');
        Route::get('cart/create/order', 'CartController@createOrder')->name('cart.create.order');
        Route::post('cart/store/order', 'CartController@store')->name('cart.store.order');
    });


// This route cannot be found
Route::fallback(function() {
    return 'This route cannot be found. Sorry.';
});
