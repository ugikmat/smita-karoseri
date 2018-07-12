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
})->middleware('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('penjualan/dompul', 'Penjualan\DompulController@index');
Route::get('penjualan/dompul-data', 'Penjualan\DompulController@data');

Route::get('list/users', 'UsersController@index');
Route::get('list/users-data', 'UsersController@data');