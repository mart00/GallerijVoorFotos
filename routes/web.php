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
Route::get('/albums/create', 'AlbumsController@create');
Route::post('/albums/store', 'AlbumsController@store');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::get('/albums/{id}/edit', 'AlbumsController@edit');
Route::patch('/albums/{id}', 'AlbumsController@update');
Route::delete('/albums/{id}', 'AlbumsController@destroy');


Route::get('/photos/create/{id}', 'photosController@create');
Route::post('/photos/store', 'photosController@store');
Route::get('/photos/{id}', 'photosController@show');
Route::delete('/photos/{id}', 'photosController@destroy');
?>
