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
Route::match(['get','put'],'/admin/updateRole','AdminController@updateRole');
Route::get('/admin/role/{role_id}','AdminController@deleteRole');

Route::match(['get','post'],'/admin/addUser','AdminController@addUser');
Route::get('/admin/users','AdminController@viewUsers');
Route::match(['get','put'],'/admin/updateUser','AdminController@updateUser');
Route::get('/admin/user/{user_id}','AdminController@deleteUser');