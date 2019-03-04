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

Route::get("/camps", 'CampController@index');

Route::get("/camp/create", 'CampController@create');
Route::post("/camp", 'CampController@store');

Route::get('/camp/show/{id}', 'CampController@show');

Route::get('/camp/{id}/edit', 'CampController@edit');
Route::put('/camp/{id}/edit', 'CampController@update');