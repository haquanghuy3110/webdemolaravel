<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@getIndex');

Route::get('post/{id}/{slug}.html','PostController@getPost');
Route::post('post/{id}/{slug}.html','PostController@commentPost');

Route::get('cat/{id}/{slug}.html','PostController@getCat');

Route::get('search','PostController@getSearch');

Route::get('createuser','Admin\LoginController@createUser');

Route::group(['namespace'=>'Admin'],function(){
	Route::group(['prefix'=>'login','middleware'=>'checkLogin'],function(){
		Route::get('/','LoginController@getLogin');
		Route::post('/','LoginController@postLogin');
	});
	Route::group(['prefix'=>'admin','middleware'=>'checkLogout'],function(){
		Route::get('home','HomeController@getHome');
		Route::get('logout','HomeController@getLogout');

		Route::group(['prefix'=>'cat'],function(){
			Route::get('add','CategoryController@getAddCat');
			Route::post('add','CategoryController@postAddCat');

			Route::get('view','CategoryController@getViewCat');

			Route::get('edit/{id}','CategoryController@getEditCat');
			Route::post('edit/{id}','CategoryController@postEditCat');

			Route::get('del/{id}','CategoryController@getDelPost');
		});

		Route::group(['prefix'=>'post'],function(){
			Route::get('add','PostController@getAddPost');
			Route::post('add','PostController@postAddPost');

			Route::get('view','PostController@getViewPost');

			Route::get('edit/{id}','PostController@getEditPost');
			Route::post('edit/{id}','PostController@postEditPost');

			Route::get('del/{id}','PostController@getDelPost');
		});
	});
});