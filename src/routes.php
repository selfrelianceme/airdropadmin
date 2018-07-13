<?php

Route::group(['prefix' => config('adminamazing.path').'/airdropadmin', 'middleware' => ['web','CheckAccess']], function() {
	Route::get('/', 'Selfreliance\AirDropAdmin\AirDropAdminController@index')->name('AirDropAdmin');
});
