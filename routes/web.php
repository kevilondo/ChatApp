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

Route::get('/', 'PagesController@index');

Route::get('/find_users', 'UsersController@find_users');

Route::post('/search_result', 'UsersController@search');

Route::get('/inbox', 'ChatController@inbox');

Route::post('/chat/{id}', 'ChatController@send_message');

Route::get('/chat/{id}', 'ChatController@chat_page');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile/{id}', 'UsersController@profile');

Route::post('/edit/{id}', 'UsersController@edit_bio');

Route::get('/edit/{id}', 'PagesController@edit_bio');