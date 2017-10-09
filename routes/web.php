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

// Home
Route::get('/', 'HomeController@welcome');

// Types
Route::get('/types', 'TypesController@index');
// Route::get('/types/{type}', 'TypesController@index');
Route::get('/types/create', 'TypesController@create');
Route::post('/types', 'TypesController@store');
Route::get('/types/{type}', 'TypesController@show');

// Festivals
Route::get('/festivals', 'FestivalsController@index');
Route::get('/festivals/create', 'FestivalsController@create');
Route::post('/festivals', 'FestivalsController@store');
Route::get('/festivals/{festival}', 'FestivalsController@show');
Route::get('/festivals/types/{type}', 'TypesController@index');

// Comments
Route::post('/festivals/{festival}/comments', 'CommentsController@store');

//User related
Route::get('/register', 'RegistrationController@create');
Route::post('/register', 'RegistrationController@store');
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store');
Route::get('/logout', 'SessionController@destroy');
Route::get('/users/{id}', 'SessionController@accountPage');
Route::get('/users/{id}/update', 'SessionController@updateView');
Route::post('/users/{id}/update', 'SessionController@updateAccount');

Route::get('/home', 'HomeController@index')->name('home');

//admin related
Route::get('/admin', 'AdminController@index')->name('adminpanel');

Route::get('/admin/add/user', 'AdminController@addUser');
Route::post('/admin/add/user', 'RegistrationController@store');
Route::get('/admin/update/user/{id}', 'AdminController@updateUser');
Route::post('/admin/update/user/{id}', 'SessionController@update');
Route::get('/admin/delete/user/{id}', 'SessionController@delete');

Route::get('/admin/add/festival', 'FestivalsController@create');
Route::post('/admin/add/festival', 'FestivalsController@store');
Route::get('admin/update/festival/{id}', 'AdminController@updateFestival');
Route::post('admin/update/festival/{id}', 'FestivalsController@update');
Route::get('/admin/delete/festival/{id}', 'FestivalsController@delete');

Route::get('/admin/add/type', 'TypesController@create');
Route::post('/admin/add/type', 'TypesController@store');
Route::get('admin/update/type/{id}', 'AdminController@updateType');
Route::post('admin/update/type/{id}', 'TypesController@update');
Route::get('/admin/delete/type/{id}', 'TypesController@delete');
