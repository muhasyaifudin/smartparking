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

Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index')->name('dashboard');

Route::get('/user', 'ParkingUserController@index');

Route::post('/user/ban', 'ParkingUserController@ban');

Route::resource('parkinglot','ParkingLotController');

Route::post('parkinglot/nonaktifkan', 'ParkingLotController@nonaktifkan');

Route::post('parkinglot/aktifkan', 'ParkingLotController@aktifkan');

Route::get('lot/map', 'MapController@index');

Route::post('lot/map', 'MapController@show');

Route::get('/config','ConfigController@index')->name('config.index');
Route::post('/config','ConfigController@store')->name('config.store');





