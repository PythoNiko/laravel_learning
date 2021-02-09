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

Auth::routes();

 Route::get('/', function () {
     return '';
 })->name('index');

 Route::get('/', 'HomeController@home');
 Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/vue', 'VueController@index');
 Route::get('/php', 'PhpController@index');

 Route::resource('tasks', 'TasksController');
 Route::resource('sessions', 'SessionsController');
 Route::resource('learning', 'QuizController');

 Route::resource('property', 'PropertyController');
 Route::get('/property-delete/{property}', 'PropertyController@removeProperty')->name('property.removeProperty');

 Route::resource('techtest', 'TechTestController');
 Route::resource('/qanw', 'QanwController');
