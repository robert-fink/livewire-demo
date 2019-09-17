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

Route::get('/', 'WritingsController@index');

Auth::routes();

Route::get('/home', 'WritingsController@index');

Route::get('counter', function (){

    return view('counter-test.index');
});
