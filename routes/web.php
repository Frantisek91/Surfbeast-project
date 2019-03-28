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

 Route::group(['middleware' => ['can:admin']], function () {

    Route::resource('/destinations', 'DestinationController');
    Route::get("destinations", "DestinationController@index")->name("destinations");

    Route::get('/camp/{id}/term/create', 'TermsController@create');
    Route::post('/camp/{id}/term/store', 'TermsController@store');
    Route::get('/term/{id}/edit', 'TermsController@edit');
    Route::put('/term/{id}/edit', 'TermsController@update');
    Route::delete('/term/{id}/edit', 'TermsController@destroy');

    Route::get("/camps/all", 'CampController@all')->name("camps");
    Route::post("/camp", 'CampController@store');
    Route::get("/camp/create", 'CampController@create');
    Route::get('/camp/{id}/edit', 'CampController@edit');
    Route::put('/camp/{id}/edit', 'CampController@update');
    Route::delete('/camp/{id}', 'CampController@destroy');

    Route::get('/agencies', 'AgencyController@index')->name("agencies");
    Route::get('/agency/show/{id}', 'AgencyController@show');
    Route::get('/agency/create', 'AgencyController@create');
    Route::post('/agency', 'AgencyController@store');
    Route::get('/agency/{id}/edit', 'AgencyController@edit');
    Route::put('/agency/{id}/edit', 'AgencyController@update');
    Route::delete('/agency/{id}', 'AgencyController@destroy');

    Route::delete("/camp/show/{camp}", "ReviewsController@destroy");

    Route::get("/inquiries", "InquiryController@index")->name("inquiries");
    Route::get("/inquiry/show/{id}", "InquiryController@show");
    

});

Route::get("/index", "SurfController@index")->name("index");
Route::get("/show", "SurfController@show");

Route::get("/camps", 'CampController@index');
Route::get('/camp/show/{id}', 'CampController@show');

//Route::get('/camp/show/{id}', 'CampController@show');
/* Route::post("/camp", 'CampController@store');
Route::get('/camp/show/{id}', 'CampController@show');
Route::get('/camp/{id}/edit', 'CampController@edit');
Route::put('/camp/{id}/edit', 'CampController@update'); */



/* Route::get('/agency/create', 'AgencyController@create');
Route::post('/agency', 'AgencyController@store');
Route::get('/agency/show/{id}', 'AgencyController@show');
Route::get('/agency/{id}/edit', 'AgencyController@edit');
Route::put('/agency/{id}/edit', 'AgencyController@update'); */

/* Route::get('/term/create', 'TermsController@create');
Route::post('/term', 'TermsController@store');
Route::get('/term/{id}/edit', 'TermsController@edit');
Route::put('/term/{id}/edit', 'TermsController@update'); */

//Route::resource('reviews', 'ReviewsController');
//
Route::post("/camp/show/{camp}", "ReviewsController@store");
//
/* Route::resource("destinations", "DestinationController");  */

Route::get("destinations", "DestinationController@index")->name("destinations"); 
Route::get("destinations/show/{id}", "DestinationController@show"); 


Route::post("/term/{id}/inquiry/store", "InquiryController@store");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
