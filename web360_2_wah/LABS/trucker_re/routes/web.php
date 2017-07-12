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

Route::resource('truckers', 'TruckerController');

Route::post('storetrip', 'TruckerController@storetrip');

Route::get('tripedit/{id}', 'TruckerController@tripedit');

Route::put('tripupdate/{id}', 'TruckerController@tripupdate');

Route::post('tripdelete/{id}', 'TruckerController@tripdestroy');