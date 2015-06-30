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
Route::get('news/{id}', array('as'=>'show_news', 'uses'=>'NewsController@show'));
//Public Projects
Route::get('projects', "ProjectsController@index");
Route::get('projects/{id}', array('as'=>'show_projects', 'uses'=>'ProjectsController@show'));
//Public Downloads
Route::get('downloads', "DownloadsController@index");
Route::get('downloads/{id}', array('as'=>'show_downloads', 'uses'=>'DownloadsController@show'));

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::group(['middleware' => 'auth'], function() {
    // Store routes here when logged in!
    //Backend
    Route::get('backend', "BackendController@index");
    //Backend News
    Route::get('backend/news', array('as'=>'news', 'uses'=>'BackendNewsController@index'));
    Route::get('backend/news/show/{id}', array('as'=>'edit_news', 'uses'=>'BackendNewsController@show'));
    Route::get('backend/news/add', array('as'=>'add_news', 'uses'=>'BackendNewsController@add'));
    Route::post('backend/news/update', array('as'=>'update_news', 'uses'=>'BackendNewsController@update'));
    Route::post('backend/news/delete/{id}', array('as'=>'delete_news', 'uses'=>'BackendNewsController@delete'));
    Route::post('backend/news/insert', array('as'=>'insert_news', 'uses'=>'BackendNewsController@insert'));
    //Backend Projects
    Route::get('backend/projects', array('as'=>'project', 'uses'=>'BackendProjectsController@index'));
    Route::get('backend/projects/edit/{id}', array('as'=>'edit_project', 'uses'=>'BackendProjectsController@show'));
    Route::get('backend/projects/add', array('as'=>'add_project', 'uses'=>'BackendProjectsController@add'));
    Route::post('backend/projects/update', array('as'=>'update_project', 'uses'=>'BackendProjectsController@update'));
    Route::post('backend/projects/delete/{id}', array('as'=>'delete_project', 'uses'=>'BackendProjectsController@delete'));
    Route::post('backend/projects/insert', array('as'=>'insert_project', 'uses'=>'BackendProjectsController@insert'));
    //Backend Downloads
    Route::get('backend/downloads', array('as'=>'downloads', 'uses'=>'BackendDownloadsController@index'));
    Route::get('backend/downloads/show/{id}', array('as'=>'edit_downloadst', 'uses'=>'BackendDownloadsController@show'));
    Route::get('backend/downloads/add', array('as'=>'add_downloads', 'uses'=>'BackendDownloadsController@add'));
    Route::post('backend/downloads/update', array('as'=>'update_downloads', 'uses'=>'BackendDownloadsController@update'));
    Route::post('backend/downloads/delete/{id}', array('as'=>'delete_downloads', 'uses'=>'BackendDownloadsController@delete'));
    Route::post('backend/downloads/insert', array('as'=>'insert_downloadst', 'uses'=>'BackendDownloadsController@insert'));
});

