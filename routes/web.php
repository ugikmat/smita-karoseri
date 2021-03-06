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

Route::resource('produk', 'ProdukController');
Route::get('master-produk', 'ProdukController@data');

Route::resource('satuan', 'SatuanController');
Route::get('master-satuan', 'SatuanController@data');

Route::resource('customer', 'CustController');
Route::get('master-customer', 'CustController@data');

Route::resource('sales', 'SalesController');
Route::get('master-sales', 'SalesController@data');

Route::resource('gudang', 'GudangController');
Route::get('master-gudang', 'GudangController@data');

Route::resource('lokasi', 'LokasiController');
Route::get('master-lokasi', 'LokasiController@data');

Route::resource('pemborong', 'PemborongController');
Route::get('master-pemborong', 'PemborongController@data');

Route::resource('supervisor', 'SupervisorController');
Route::get('master-supervisor', 'SupervisorController@data');

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
Route::resource('master/bank', 'BankController');
Route::get('bank-data', 'BankController@data');

Route::resource('master/produk', 'ProdukController');
Route::get('/produk-data', 'ProdukController@data');

Route::resource('master/satuan', 'SatuanController');
Route::get('/satuan-data', 'SatuanController@data');

Route::resource('master/supplier', 'SupplierController');
Route::get('/supplier-data', 'SupplierController@data');

Route::resource('master/dompul', 'DompulController');
Route::get('/dompul-data', 'DompulController@data');

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

Route::get('/master/suplier', function() {
  return view ('/master/suplier');
}) -> name('master-suplier');

Route::get('/master/pemborong', function() {
  return view ('/master/pemborong');
}) -> name('master-pemborong');

Route::get('/master/supervisor', function() {
  return view ('/master/supervisor');
}) -> name('master-supervisor');

Route::get('/master/satuan', function() {
  return view ('/master/satuan');
}) -> name('master-satuan');
