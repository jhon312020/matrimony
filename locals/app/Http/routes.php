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
    //return view('welcome');
    return redirect('/'.App::getLocale());
});

/*Route::get('/{locale}', function () {
    return view('welcome');
});*/

include("admin-routes.php");
include("frontend-routes.php");


//Route::get('{locale}/search','FrontEndController@search');