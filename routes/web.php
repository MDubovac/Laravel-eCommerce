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

Route::get('/product-list', 'CommonController@productList' );

Auth::routes();


// Categories
Route::resource("categories", "CategoryController");
// Products
Route::resource("products", "ProductController");

