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
Route::get("/show", "SurfController@show");

Route::get("/camps", 'CampController@index');
Route::get("/camp/create", 'CampController@create');
Route::post("/camp", 'CampController@store');
Route::get('/camp/show/{id}', 'CampController@show');
Route::get('/camp/{id}/edit', 'CampController@edit');
Route::put('/camp/{id}/edit', 'CampController@update');

Route::get('/agencies', 'AgencyController@index');
Route::get('/agency/create', 'AgencyController@create');
Route::post('/agency', 'AgencyController@store');
Route::get('/agency/show/{id}', 'AgencyController@show');
Route::get('/agency/{id}/edit', 'AgencyController@edit');
Route::put('/agency/{id}/edit', 'AgencyController@update');

Route::get('/term/create', 'TermsController@create');
Route::post('/term', 'TermsController@store');
Route::get('/term/{id}/edit', 'TermsController@edit');
Route::put('/term/{id}/edit', 'TermsController@update');
Route::resource('reviews', 'ReviewsController');
Route::resource("destinations", "DestinationController");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
