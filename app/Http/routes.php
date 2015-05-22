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

Route::get('/', 'IndexController@index');

//Userhandling Auth
Route::get('login', "LoginController@index");
Route::post('login', 'LoginController@login');
Route::get('logout', 'LoginController@logout');
//Public News
Route::get('news', "NewsController@index");
Route::get('news/{id}', "NewsController@show");
//Public Projects
Route::get('projects', "ProjectsController@index");
//Public Downloads
Route::get('downloads', "DownloadsController@index");

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() {
    // Store routes here when logged in!
    Route::get('backend', "BackendController@index");
});

