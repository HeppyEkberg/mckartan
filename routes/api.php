<?php

use App\Http\Controllers\Api\PointOfInterestController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::get('/pointofinterest', 'Api\PointOfInterestController@index')->name('poi.index');
Route::get('/pointofinterest/{pointofinterest}', 'Api\PointOfInterestController@show')->name('poi.show');
Route::post('/pointofinterest', 'Api\PointOfInterestController@store')->name('poi.store');


Route::get('/routes', 'Api\RouteController@getRoutes')->name('route.index');
Route::get('/route/{route}', 'Api\RouteController@show')->name('route.show');
Route::post('/route', 'Api\RouteController@store')->name('route.store');
