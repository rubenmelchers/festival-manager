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

// Home controller
Route::get('/', 'HomeController@welcome');

// Types controller
Route::get('/types', 'TypesController@index');
Route::get('/types/create', 'TypesController@create');
Route::post('/types', 'TypesController@store');
Route::get('/types/{type}', 'TypesController@show');

// Festivals controller
Route::get('/festivals', 'FestivalsController@index');
Route::get('/festivals/create', 'FestivalsController@create');
Route::post('/festivals', 'FestivalsController@store');
Route::get('/festivals/{festival}', 'FestivalsController@show');

// Comments controller
Route::post('/festivals/{festival}/comments', 'CommentsController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
