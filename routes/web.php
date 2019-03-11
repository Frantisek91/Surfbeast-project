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

Route::get("/index", "SurfController@index");
Route::post("/show", "SurfController@show");

Route::resource('reviews', 'ReviewsController');
Route::resource("destinations", "DestinationController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

