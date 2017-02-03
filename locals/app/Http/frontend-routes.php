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
  Route::get('/','FrontendController@index');
  Route::get('index','FrontendController@index');
  Route::post('register','FrontendController@register');
  Route::get('register','FrontendController@viewRegister');
  Route::match(['get','post'],'login','FrontendController@login');
  Route::get('logout','FrontendController@logout');
  Route::get('profile','FrontendController@profile');
  Route::post('updateProfile','FrontendController@updateProfile');
  Route::post('uploadProfilePicture','FrontendController@uploadProfilePicture');
  Route::post('updatePreference','FrontendController@updatePreference');
  Route::match(['get','post'],'changePassword','FrontendController@changePassword');
  Route::match(['get','post'],'search','FrontendController@search');
  Route::get('profile/{profile_id}','FrontendController@viewProfile');
  Route::get('aboutUs','FrontendController@aboutUs');
  Route::get('contactUs','FrontendController@contactUs');
  Route::post('sendContactMail','FrontendController@sendContactMail');
  Route::get('changeLanguage/{currentPath}','FrontendController@changeLanguage');

});

