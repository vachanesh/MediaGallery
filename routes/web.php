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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/photos', 'PhotosController@index')->name('photos');
Route::get('/photos/create', 'PhotosController@create')->name('photos.create');
Route::post('/photos/save/{id?}', 'PhotosController@save')->name('photos.save');
Route::get('/photos/delete/{id}', 'PhotosController@delete')->name('photos.delete');

Route::get('/videos', 'VideosController@index')->name('videos');
Route::get('/videos/create', 'VideosController@create')->name('videos.create');
Route::post('/videos/save/{id?}', 'VideosController@save')->name('videos.save');
Route::get('/videos/delete/{id}', 'VideosController@delete')->name('videos.delete');
