<?php

Route::group(['prefix' => config('adminamazing.path').'/airdropadmin', 'middleware' => ['web','CheckAccess']], function() {
	Route::get('/', 'Selfreliance\AirDropAdmin\AirDropAdminController@index')->name('AirDropAdmin');
	Route::get('/confirm/{id}', 'Selfreliance\AirDropAdmin\AirDropAdminController@confirm')->name('AirDropAdminConfirm');
	Route::get('/delete/{id}', 'Selfreliance\AirDropAdmin\AirDropAdminController@destroy')->name('AirDropAdminDestroy');
	Route::get('/cancel/{id}', 'Selfreliance\AirDropAdmin\AirDropAdminController@cancel_app')->name('AirDropAdminCancel');
	Route::post('/do_cancel', 'Selfreliance\AirDropAdmin\AirDropAdminController@do_cancel_app')->name('AirDropAdminDoCancel');
});
