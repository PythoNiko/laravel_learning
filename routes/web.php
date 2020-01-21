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

use Illuminate\Support\Facades\Route;

//Route::get('/', 'PagesController@home');
//Route::get('/home', 'HomeController@index');
//Route::get('/about', 'PagesController@about');
//Route::get('/test', 'PagesController@test');
//Route::get('/testtwo', 'PagesController@test');
//


Auth::routes();

// Route::get('/', 'PagesController@home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/vue', 'VueController@index');
Route::get('/php', 'PhpController@index');
//Route::get('/tests', 'TestController@index');
//Route::post('/tests', 'TestController@store');

Route::resource('tasks', 'TasksController');
Route::resource('sessions','SessionsController');


//Route::get('/tasks', 'TasksController@index');
//Route::get('/tasks/create', 'TasksController@create');
//Route::get('/tasks/{task}', 'TasksController@show');
//Route::post('/tasks', 'TasksController@store');
//Route::get('/tasks/{task}/edit', 'TasksController@edit');
//Route::patch('/tasks/{task}', 'TasksController@update');
//Route::delete('/tasks/{task}', 'TasksController@destroy');



