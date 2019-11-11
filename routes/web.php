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
//Route::resource('albums', 'AlbumsController');

Route::get('/', 'AlbumsController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('/albums/create', 'AlbumsController@create')->middleware('auth');
Route::post('/albums/store', 'AlbumsController@store');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::get('/albums/{id}/edit', 'AlbumsController@edit')->middleware('auth');
Route::patch('/albums/{id}', 'AlbumsController@update')->middleware('auth');
Route::delete('/albums/{id}', 'AlbumsController@destroy')->middleware('auth');


Route::get('/photos/create/{id}', 'photosController@create')->middleware('auth');
Route::post('/photos/store', 'photosController@store')->middleware('auth');
Route::get('/photos/{id}', 'photosController@show');
Route::delete('/photos/{id}', 'photosController@destroy')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
