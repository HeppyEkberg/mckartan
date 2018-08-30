<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('/city/{city}', 'CityController@show')->name('city.show');
Route::get('/countdown', 'CountdownController@index')->name('countdown.index');



Route::middleware('auth')->group(function() {

    Route::get('/route/create', 'RouteController@create')->name('route.create');
    Route::post('/route/store', 'RouteController@store')->name('route.store');
    Route::get('/route/delete', 'RouteController@delete')->name('route.delete');


    Route::get('/point/create', 'PointController@create')->name('point.create');
    Route::post('/point/store', 'PointController@store')->name('point.store');

});


Route::get('/route/{route}', 'RouteController@show')->name('route.show');
Route::get('/point/{point}', 'PointController@show')->name('point.show');

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

include('web/ajax.php');