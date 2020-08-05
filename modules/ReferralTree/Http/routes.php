<?php

Route::group([
	'middleware' => ['web', 'auth', 'menu'], 
	'prefix' => 'referraltree', 
	'namespace' => 'Modules\ReferralTree\Http\Controllers'], function() {
		//
		Route::get('/', 'ReferralTreeController@index')->name('referraltree');
		Route::get('/{id}', 'ReferralTreeController@moretree')->name('moretree');
		
		Route::post('/moretree', 'ReferralTreeController@moretree2')->name('moretree2');
		
		Route::get('/genealogia/{id}/{tipo}', 'ReferralTreeController@genealogia')->name('genealogia');

    	Route::get('/getReferreds', 'ReferralTreeController@getReferreds');
		
});
