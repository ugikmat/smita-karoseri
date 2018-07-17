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

Route::resource('bank', 'BankController');
Route::get('bank-data', 'BankController@data');

// penjualan
Route::get('/penjualan/dompul/invoice-dompul', function() {
  return view ('/penjualan/dompul/invoice-dompul');
}) -> name('invoice-dompul');

Route::get('/penjualan/dompul/list-invoice', function() {
  return view ('/penjualan/dompul/list-invoice');
}) -> name('list-invoice');

//monitoring
Route::get('/penjualan/dompul/list-invoice', function() {
  return view ('/penjualan/dompul/list-invoice');
}) -> name('list-invoice');


//Master
Route::get('/master/bank', function() {
  return view ('/master/bank');
}) -> name('master-bank');

Route::resource('master/produk', 'ProdukController');
Route::get('/master/produk-data', 'ProdukController@data');

Route::resource('master/satuan', 'SatuanController');
Route::get('/master/satuan-data', 'SatuanController@data');

Route::resource('master/supplier', 'SupplierController');
Route::get('master/supplier-data', 'SupplierController@data');

Route::get('/master/customer', function() {
  return view ('/master/customer');
}) -> name('master-customer');

Route::get('/master/gudang', function() {
  return view ('/master/gudang');
}) -> name('master-gudang');

Route::get('/master/lokasi', function() {
  return view ('/master/lokasi');
}) -> name('master-lokasi');

Route::get('/master/sales', function() {
  return view ('/master/sales');
}) -> name('master-sales');

Route::get('/master/dompul', function() {
  return view ('/master/dompul');
}) -> name('master-dompul');
