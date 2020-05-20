<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('categories', 'HomeController@contact');
Route::get('contact', 'HomeController@contact');
Route::get('posts', 'PostController@browse_posts');
Route::get('post/{slug}', 'PostController@post_single');
Route::post('subscribe', 'SubscribeController@subscribe');
Route::post('comment', 'CommentController@comment');

Auth::routes();
Route::middleware(['auth'])->prefix('admin')->group(function(){
	Route::get('home', 'UserController@index')->name('home');
	Route::get('change_password', 'UserController@change_password');
	Route::post('change_password', 'UserController@change_password_do');

	Route::get('categories', 'CategoryController@categories');
	Route::post('category/create', 'CategoryController@create');
	Route::get('category/edit/{id}', 'CategoryController@edit');

	Route::get('posts', 'PostController@posts');
	Route::get('post/create', 'PostController@create');
	Route::post('post/create', 'PostController@store');
	Route::get('post/edit/{id}', 'PostController@edit');
	Route::post('post/update', 'PostController@update');

	Route::get('comments', 'CommentController@comments_list');
	Route::get('comment/delete/{id}', 'CommentController@delete');

	Route::get('pages', 'PageController@pages');
	Route::get('page/create', 'PageController@create');
	Route::post('page/create', 'PageController@store');
	Route::get('page/edit/{id}', 'PageController@edit');
	Route::get('page/delete/{id}', 'PageController@delete');

	Route::get('slider', 'SliderController@index');
	Route::get('slide/create', 'SliderController@create');
	Route::post('slide/create', 'SliderController@store');
	Route::get('slide/edit/{id}', 'SliderController@edit');
	Route::post('slide/update', 'SliderController@update');
	Route::get('slide/delete/{id}', 'SliderController@destroy');

	Route::get('users', 'UserController@users');
	Route::get('user/delete/{id}', 'UserController@delete');
	Route::get('user/status_update/{status}/{id}', 'UserController@status_update');

	Route::get('settings', 'SettingController@settings');
	Route::post('setting/update/logo', 'SettingController@logo_update');
});