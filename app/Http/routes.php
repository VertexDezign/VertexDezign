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
//Public Downloads
Route::get('about', "IndexController@indexAbout");

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
    Route::get('backend/news/edit/{id}', array('as'=>'edit_news', 'uses'=>'BackendNewsController@show'));
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
    Route::get('backend/downloads/edit/{id}', array('as'=>'edit_download', 'uses'=>'BackendDownloadsController@show'));
    Route::get('backend/downloads/add', array('as'=>'add_download', 'uses'=>'BackendDownloadsController@add'));
    Route::post('backend/downloads/update', array('as'=>'update_download', 'uses'=>'BackendDownloadsController@update'));
    Route::post('backend/downloads/delete/{id}', array('as'=>'delete_download', 'uses'=>'BackendDownloadsController@delete'));
    Route::post('backend/downloads/insert', array('as'=>'insert_download', 'uses'=>'BackendDownloadsController@insert'));
    //Backend Media
    Route::get('backend/media', array('as'=>'media', 'uses'=>'BackendMediaController@index'));
    Route::get('backend/media/getfolder', array('as'=>'get_folder', 'uses'=>'BackendMediaController@getFolderContent'));
    Route::post('backend/media/addfolder', array('as'=>'add_folder', 'uses'=>'BackendMediaController@addFolder'));
    Route::post('backend/media/addfile', array('as'=>'add_file', 'uses'=>'BackendMediaController@addFile'));
    Route::post('backend/media/delete', array('as'=>'delete_media', 'uses'=>'BackendMediaController@delete'));
    //Backend Slider
    Route::get('backend/slider', array('as'=>'slider', 'uses'=>'BackendSliderController@index'));
    Route::get('backend/slider/edit/{id}', array('as'=>'edit_slider', 'uses'=>'BackendSliderController@show'));
    Route::get('backend/slider/add', array('as'=>'add_slider', 'uses'=>'BackendSliderController@add'));
    Route::post('backend/slider/update', array('as'=>'update_slider', 'uses'=>'BackendSliderController@update'));
    Route::post('backend/slider/delete/{id}', array('as'=>'delete_slider', 'uses'=>'BackendSliderController@delete'));
    Route::post('backend/slider/insert', array('as'=>'insert_slider', 'uses'=>'BackendSliderController@insert'));
});

