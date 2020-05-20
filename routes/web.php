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
Route::get('contact', 'HomeController@contact');
Route::get('posts', 'PostController@browse_posts');
Route::get('post/{slug}', 'PostController@post_single');
Route::post('subscribe', 'SubscribeController@subscribe');
Route::post('comment', 'CommentController@comment');

Auth::routes();
Route::get('admin/home', 'UserController@index')->name('home');
Route::get('admin/change_password', 'UserController@change_password');
Route::post('admin/change_password', 'UserController@change_password_do');

Route::get('admin/categories', 'CategoryController@categories');
Route::post('admin/category/create', 'CategoryController@create');
Route::get('admin/category/edit/{id}', 'CategoryController@edit');

Route::get('admin/posts', 'PostController@posts');
Route::get('admin/post/create', 'PostController@create');
Route::post('admin/post/create', 'PostController@store');
Route::get('admin/post/edit/{id}', 'PostController@edit');
Route::post('admin/post/update', 'PostController@update');

Route::get('admin/comments', 'CommentController@comments_list');
Route::get('admin/comment/delete/{id}', 'CommentController@delete');

Route::get('admin/pages', 'PageController@pages');
Route::get('admin/page/create', 'PageController@create');
Route::post('admin/page/create', 'PageController@store');
Route::get('admin/page/edit/{id}', 'PageController@edit');
Route::get('admin/page/delete/{id}', 'PageController@delete');

Route::get('admin/slider', 'SliderController@index');
Route::get('admin/slide/create', 'SliderController@create');
Route::post('admin/slide/create', 'SliderController@store');
Route::get('admin/slide/edit/{id}', 'SliderController@edit');
Route::post('admin/slide/update', 'SliderController@update');
Route::get('admin/slide/delete/{id}', 'SliderController@destroy');

Route::get('admin/users', 'UserController@users');
Route::get('admin/user/delete/{id}', 'UserController@delete');
Route::get('admin/user/status_update/{status}/{id}', 'UserController@status_update');

Route::get('admin/settings', 'SettingController@settings');
Route::post('admin/setting/update/logo', 'SettingController@logo_update');
