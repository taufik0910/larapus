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

Route::get('/', 'GuestController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function (){
// Route diisi disini... 
Route::resource('authors', 'AuthorsController');
Route::resource('books', 'BooksController');
Route::resource('members', 'MembersController');
});

Route::get('statistics', ['as'=>'statistics.index','uses'=>'StatisticsController@index']);


Route::get('books/{book}/borrow', [
'middleware' => ['auth', 'role:member'],'as'=> 'guest.books.borrow','uses'=> 'BooksController@borrow'
]);

<<<<<<< HEAD
Route::put('books/{book}/return',['middleware' => ['auth', 'role:member'],'as'=>'member.books.return','uses'=>'BooksController@returnBack'
=======
Route::put('books/{book}/return', [
'middleware' => ['auth', 'role:member'],
'as'=>'member.books.return',
'uses'=>'BooksController@returnBack'
>>>>>>> 2ddd467ce0c2e9397f56f5d63a66c275183efc34
]);

Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');

Route::get('settings/profile', 'SettingsController@profile');

Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');

Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');