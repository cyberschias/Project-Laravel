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
    return view('index');
});

Route::get('/api/customer/{id?}', 'CustomerController@index');
Route::post('/api/customer', 'CustomerController@store');
Route::post('/api/customer/{id}', 'CustomerController@update');
Route::delete('/api/customer/{id}', 'CustomerController@destroy');
