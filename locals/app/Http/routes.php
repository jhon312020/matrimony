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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){
	return view('admin.adminlogin');
});
Route::get('/admin/login', function(){
	return view('admin.adminlogin');
});

Route::get('/admin/logout', 'AuthController@logout');

Route::post('/adminLogin/authenticate','AuthController@authenticate');

Route::match(['get','post'],'/admin/addRole','AdminController@addRole');
Route::get('/admin/viewRoles','AdminController@viewRoles');
Route::match(['get','post'],'/admin/editRole/{role_id}','AdminController@editRole');
Route::get('/admin/deleteRole/{role_id}','AdminController@deleteRole');

Route::match(['get','post'],'/admin/addUser','AdminController@addUser');
Route::get('/admin/viewUsers','AdminController@viewUsers');
Route::match(['get','post'],'/admin/editUser/{id}','AdminController@editUser');
Route::get('/admin/deleteUser/{id}','AdminController@deleteUser');

Route::match(['get','post'],'/admin/addStar','AdminController@addStar');
Route::get('/admin/viewStars','AdminController@viewStars');
Route::match(['get','post'],'/admin/editStar/{id}','AdminController@editStar');
Route::get('/admin/deleteStar/{id}','AdminController@deleteStar');

Route::match(['get','post'],'/admin/addReligion','AdminController@addReligion');
Route::get('/admin/viewReligions','AdminController@viewReligions');
Route::match(['get','post'],'/admin/editReligion/{id}','AdminController@editReligion');
Route::get('/admin/deleteReligion/{id}','AdminController@deleteReligion');