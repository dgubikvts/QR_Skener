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

Route::get('/skener', function () {
    return view('pages.skener');
});

Route::resource('/', 'App\Http\Controllers\ProizvodiController');
Route::resource('/proizvod', 'App\Http\Controllers\ProizvodiController');
Route::get('/search', 'App\Http\Controllers\ProizvodiController@search')->name('search');
Route::get('/quicksearch/{id}', 'App\Http\Controllers\ProizvodiController@quicksearch')->name('quicksearch');
Route::get('/addtocart', 'App\Http\Controllers\ProizvodiController@add_to_cart')->name('add.to.cart');
Route::delete('/removefromcart', 'App\Http\Controllers\ProizvodiController@remove_from_cart')->name('remove.from.cart');
Route::patch('/updatecart', 'App\Http\Controllers\ProizvodiController@update_cart')->name('update.cart');
Route::get('/cart', 'App\Http\Controllers\ProizvodiController@cart')->name('cart');
Route::get('/flush', 'App\Http\Controllers\ProizvodiController@flush')->name('flush');
Route::post('/unos_podataka', 'App\Http\Controllers\ProizvodiController@unos_podataka')->name('unos.podataka');
Route::put('/submitorder', 'App\Http\Controllers\ProizvodiController@submit_order')->name('submit.order');
Route::get('/orders', 'App\Http\Controllers\ProizvodiController@orders');
