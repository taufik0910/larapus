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
});

Route::get('books/{book}/borrow', [
'middleware' => ['auth', 'role:member'],
'as'
=> 'guest.books.borrow',
'uses'
=> 'BooksController@borrow'
]);
