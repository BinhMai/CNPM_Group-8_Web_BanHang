<?php

use Illuminate\Http\RedirectResponse;
use App\User;

Route::get('/', function () {
	#echo User::all();
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
    return view('UserManager',['user'=>'1']);
});

Route::get('/manager',function(){
	 return redirect('list-order');
});

Route::get('/list-order', function () {
    return view('ListOrder',['user'=>'1']);
});

Route::get('/list-account', function () {
    return view('AccountManager',['user'=>'1']);
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

Route::get('/add-account', function () {
    return view('addAccount');
});





