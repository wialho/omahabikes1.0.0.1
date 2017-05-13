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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/', function () {
    return view('survey');
});

Route::post('/survey', function(Request $request){
    $s = "<h1>This is the data you input:</h1>";
    $s .= "First Name: " .$request->input('first_name')."<br>";
    $s .="Last Name:".$request->input('last_name')."<br>";
    $s .="Your Favorite Dish:".$request->input('favorite_dish')."<br>";
    return $s;
});