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

Route::get('/admin', function(){
	return redirect('admin/login');
});

Route::get('/admin/dashboard','AdminController@dashboard');

Route::get('/admin/login', function(){
	if (Auth::guard('admin')->check() == true) {
        return redirect('admin/viewUsers');
    }
	return view('admin.adminlogin');
});

Route::match(['get','post'], '/admin/changePassword', 'AdminController@changePassword');

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

Route::match(['get','post'],'/admin/addCaste','AdminController@addCaste');
Route::get('/admin/viewCastes','AdminController@viewCastes');
Route::match(['get','post'],'/admin/editCaste/{id}','AdminController@editCaste');
Route::get('/admin/deleteCaste/{id}','AdminController@deleteCaste');

Route::match(['get','post'],'/admin/addLocation','AdminController@addLocation');
Route::get('/admin/viewLocations','AdminController@viewLocations');
Route::match(['get','post'],'/admin/editLocation/{id}','AdminController@editLocation');
Route::get('/admin/deleteLocation/{id}','AdminController@deleteLocation');

Route::match(['get','post'],'/admin/addMoonsign','AdminController@addMoonsign');
Route::get('/admin/viewMoonsigns','AdminController@viewMoonsigns');
Route::match(['get','post'],'/admin/editMoonsign/{id}','AdminController@editMoonsign');
Route::get('/admin/deleteMoonsign/{id}','AdminController@deleteMoonsign');

Route::match(['get','post'],'/admin/addZodiacsign','AdminController@addZodiacsign');
Route::get('/admin/viewZodiacsigns','AdminController@viewZodiacsigns');
Route::match(['get','post'],'/admin/editZodiacsign/{id}','AdminController@editZodiacsign');
Route::get('/admin/deleteZodiacsign/{id}','AdminController@deleteZodiacsign');

Route::match(['get','post'],'/admin/addGraduation','AdminController@addGraduation');
Route::get('/admin/viewGraduations','AdminController@viewGraduations');
Route::match(['get','post'],'/admin/editGraduation/{id}','AdminController@editGraduation');
Route::get('/admin/deleteGraduation/{id}','AdminController@deleteGraduation');

Route::match(['get','post'],'/admin/addStatus','AdminController@addStatus');
Route::get('/admin/viewStatus','AdminController@viewStatus');
Route::match(['get','post'],'/admin/editStatus/{id}','AdminController@editStatus');
Route::get('/admin/deleteStatus/{id}','AdminController@deleteStatus');

Route::match(['get','post'],'/admin/addPackage','AdminController@addPackage');
Route::get('/admin/viewPackages','AdminController@viewPackages');
Route::match(['get','post'],'/admin/editPackage/{id}','AdminController@editPackage');
Route::get('/admin/deletePackage/{id}','AdminController@deletePackage');

Route::match(['get','post'],'/admin/updateSettings','AdminController@updateSettings');

Route::get('/admin/memberList','AdminController@memberList');
Route::post('/admin/setRating','AdminController@setRating');