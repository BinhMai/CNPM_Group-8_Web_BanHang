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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/details', function () {
    return view('details');
});

Route::get('/productlitst', function () {
    return view('productlitst');
});

Route::get('/productgird', function () {
    return view('productgird');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/list-product', function () {
    return view('UserManager');
});

Route::get('/list-order', function () {
    return view('ListOrder');
});

Route::get('/list-account', function () {
    return view('AccountManager');
});





Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/checkout2', function () {
    return view('checkout2');
});

Route::get('/contact', function () {
    return view('contact');
});



