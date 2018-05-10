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

Route::get('/cast', 'HomeController@cast')->name('cast');
Route::get('/archive', 'HomeController@archive')->name('archive');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/calendar/day', 'HomeController@calendar')->name('calendar.day');
Route::get('/calendar', 'HomeController@calendar')->name('calendar.month');


Auth::routes();

Route::group(['middleware'=>'auth'], function () {
	Route::get('/dash', 'DashController@index')->name('home');
});