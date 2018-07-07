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
    return view('layouts.app');
})->middleware('auth');

Route::Resource('/records', 'RecordController');

Route::Resource('/history', 'HistoryController');

Route::Resource('/teachers', 'UserController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', 'UserController@adminIndex')->name('admin.index');

Route::get('/attendance', 'RecordController@attendView')->name('attend.view');
