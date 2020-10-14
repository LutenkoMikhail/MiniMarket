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
Route::get('/categories', 'WelcomeController@allCategories')->name('categories.index');
Route::get('category/{category}', 'CategoryController@index')->name('categories.product.show');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// This route cannot be found
Route::fallback(function() {
    return 'This route cannot be found. Sorry.';
});
