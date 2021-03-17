<?php

use Illuminate\Support\Facades\Route;

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

// Common Routes
Route::get('/', function () {
    return view('common.home');
});

Route::get('/home', function () {
    return view('common.home');
});

Route::get('/contact', function () {
    return view('common.contact');
});

// Products
Route::get('/product-list', 'CommonController@productList')->name('common.product-list');
Route::get('/product-details/{product}', 'CommonController@productDetails')->name('common.product-details');
Route::delete('/cart/{id}', 'CartController@destroy');

// Cart
Route::get("/cart", 'CartController@index')->name('cart.index');
Route::post("/cart", 'CartController@store')->name('cart.store');

// Auth
Auth::routes();

// Categories
Route::resource("categories", "CategoryController");
// Products
Route::resource("products", "ProductController");

