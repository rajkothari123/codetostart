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



Route::get('/blog/test', 'HomeController@test');
Route::post('/homec', 'HomeController@send_email');


Route::get('/blog/bin', 'BlogController@bin');

Route::get('/blog/bin/{id}/restore', 'BlogController@restore');

Route::delete('/blog/bin/{id}/destroyblog', 'BlogController@destroyBlog');

Route::get('/blog/draft', 'BlogController@draft');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('redirect','SocialAuthController@redirect');
Route::get('callback','SocialAuthController@callback');

Route::get('/home', 'HomeController@index');

Route::get('/blog', 'BlogController@index');

Route::get('/blog/create', 'BlogController@create');

Route::post('/blog/store', 'BlogController@store');

Route::get('/blog/{slug}', 'BlogController@show');

Route::get('/blog/{id}/edit', 'BlogController@edit');

Route::patch('/blog/{id}', 'BlogController@update');

Route::patch('/blog/publish/{id}', 'BlogController@publish');


Route::delete('/blog/{id}', 'BlogController@destroy');



Route::get('/admin', 'AdminController@index');

Route::resource('categories', 'CategoryController');

Route::resource('subcategories', 'SubCategory');

Route::resource('media', 'PhotosController');

Route::get('userlist','UserController@userlist');

Route::resource('users', 'UserController');

Route::get('/{username?}', array('as' =>'show','uses'=>'UserController@show'));



