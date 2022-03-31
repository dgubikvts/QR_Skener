<?php

use Illuminate\Support\Facades\Route;

Route::view('/scanner', 'pages.scanner');
Route::view('/profile', 'pages.profile')->name('profile')->middleware('auth');

Route::get('/', 'App\Http\Controllers\ProizvodiController@index');
Route::get('/product/{id}', 'App\Http\Controllers\ProizvodiController@show')->name('product.show');
Route::get('/search', 'App\Http\Controllers\ProizvodiController@search')->name('search');
Route::get('/quick-search/{id}', 'App\Http\Controllers\ProizvodiController@quick_search')->name('quick.search');
Route::post('/add-to-cart', 'App\Http\Controllers\CartController@add_to_cart')->name('add.to.cart');
Route::delete('/remove-from-cart', 'App\Http\Controllers\CartController@remove_from_cart')->name('remove.from.cart');
Route::patch('/update-cart', 'App\Http\Controllers\CartController@update_cart')->name('update.cart');
Route::get('/cart', 'App\Http\Controllers\CartController@cart')->name('cart');
Route::get('/flush', 'App\Http\Controllers\ProizvodiController@flush')->name('flush');
Route::post('/data-input', 'App\Http\Controllers\OrderController@data_input')->name('data.input');
Route::put('/submit-order', 'App\Http\Controllers\OrderController@submit_order')->name('submit.order');
Route::get('/orders', 'App\Http\Controllers\OrderController@orders');
Route::patch('/update-profile', 'App\Http\Controllers\HomeController@update_profile')->name('update.profile')->middleware('auth');
Route::view('/my-orders', 'pages.my-orders')->name('my.orders')->middleware('auth');
Auth::routes();