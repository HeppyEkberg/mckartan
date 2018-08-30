<?php


$ajax = function() {

    Route::get('/routes', 'RouteController@routes')->name('routes.index');
    Route::get('/points', 'PointController@points')->name('points.index');

};


Route::prefix('ajax')
    ->namespace('Ajax')
    ->name('ajax.')
    ->group($ajax);


