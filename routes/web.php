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
    return view('skener');
});

Route::resource('/', 'App\Http\Controllers\ProizvodiController');
Route::resource('/proizvod', 'App\Http\Controllers\ProizvodiController');
Route::get('/search', 'App\Http\Controllers\ProizvodiController@search')->name('search');
Route::get('/quicksearch', 'App\Http\Controllers\ProizvodiController@searchbarcode')->name('searchbarcode');
