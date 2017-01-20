<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(array('prefix' => '{locale?}'), function() {
	Route::post('register','FrontendController@register');
	Route::get('search','FrontendController@search');
	Route::get('register','FrontendController@viewRegister');
	Route::match(['get','post'],'login','FrontendController@login');
	Route::get('logout','FrontendController@logout');
	Route::get('profile','FrontendController@profile');
});

