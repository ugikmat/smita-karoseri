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

Route::resource('carabayar', 'CaraBayarController');
Route::get('master-cara_bayar', 'CaraBayarController@data');

Route::resource('ppn', 'PPNController');
Route::get('master-ppn', 'PPNController@data');

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

Route::resource('permintaan', 'PermintaanPenjualanController');
Route::get('karoseri-permintaan', 'PermintaanPenjualanController@data');
Route::post('getData','PermintaanPenjualanController@getData');
Route::post('accept/{id}', 'PermintaanPenjualanController@accept')->name('accept');
Route::get('unduh/{id}', 'PermintaanPenjualanController@unduh')->name('unduh');

Route::resource('penawaran', 'PrintPenawaranController');
Route::get('tawar/{id}', 'PrintPenawaranController@printpenawaran')->name('printpenawaran');
Route::post('setujutawar/{id}', 'PrintPenawaranController@update')->name('setuju');

Route::resource('produk', 'ProduksiController');
Route::get('produksi/{id}', 'ProduksiController@getData')->name('produksi');
Route::get('produksi_qc/{id}', 'ProduksiController@getDataQC')->name('qc');
Route::get('karoseri-qc_tambah', 'ProduksiController@data');

Route::resource('qualitycontrol', 'QCController');
Route::get('karoseri-print_qc/{id}', 'QCController@data');
Route::get('view/{id}', 'QCController@view')->name('view');
//Route::get('karoseri-spkc', 'SPKCController@data');
Route::resource('akhirproduksi', 'AkhirProduksiController');

Route::resource('spkc', 'SPKCController');
Route::get('karoseri-spkc', 'SPKCController@data');

Route::resource('spkpb', 'SPKPBController');
Route::get('karoseri-spkpb', 'SPKPBController@data');
Route::post('getDataPemborong','SPKPBController@getDataPemborong');
Route::post('getDataSpkc','SPKPBController@getDataSpkc');
Route::post('acc/{id}', 'SPKPBController@acc')->name('acc');
Route::get('viewprint_spkpb/{id}', 'SPKPBController@printview')->name('viewprintspkpb');
Route::get('print_spkpb/{id}', 'SPKPBController@print')->name('printspkpb');
Route::get('print_qcpb/{id}', 'SPKPBController@printqcpb')->name('printqcpb');

Route::resource('qcpb', 'QCPBController');
Route::post('qcpb_done/{id}', 'QCPBController@done');

Route::resource('kasbon', 'KasbonController');
Route::get('karoseri-kasbon', 'KasbonController@data');

Route::resource('bap', 'BAPController');
Route::get('karoseri-bap', 'BAPController@data');
Route::get('berita_acara/{id}', 'BAPController@getBAP')->name('getbap');

Route::resource('surat_jalan', 'SuratJalanController');
Route::get('karoseri-surat_jalan', 'SuratJalanController@data');
Route::get('suratjalan/{id}', 'SuratJalanController@getSJ')->name('getsj');

//Route::post('kasbon/{id}', 'KasbonController@tambah')->name('kasbon');

Route::resource('print', 'PrintSPKCController');
Route::get('karoseri-print_spkc', 'PrintSPKCController@data');
Route::post('getDataPrint','PrintSPKCController@getData');
Route::get('printKu/{id}', 'PrintSPKCController@print');

Route::resource('printpbb', 'PrintPBBController');
Route::get('karoseri-print_pbb/{id}', 'PrintPBBController@data')->name('ppppp');
Route::get('printPBB/{id}', 'PrintPBBController@print')->name('printpbb');

Route::resource('viewprint_pbb', 'ViewPrintPBBController');
Route::get('karoseri-viewprint_pbb/{id}', 'ViewPrintPBBController@data')->name('vp');
Route::get('viewprintPBB/{id}', 'ViewPrintPBBController@printpb');

Route::resource('printview', 'ViewPrintController');
Route::get('karoseri-viewprint_spkc', 'ViewPrintController@data');
Route::post('getDataView','ViewPrintController@getData');
Route::get('viewprint/{id}', 'ViewPrintController@print');

Route::resource('wo', 'WorkOrderController');
Route::get('karoseri-wo', 'WorkOrderController@data');
Route::get('viewprint_wo/{id}', 'WorkOrderController@print')->name('printwo');

Route::resource('pbb', 'PBBController');
Route::get('karoseri-pbb', 'PBBController@data');

Route::resource('edit_pbb', 'EditPBBController');
Route::get('karoseri-edit_pbb/{id}', 'EditPBBController@data')->name('tab');
Route::get('editPBB/{id}', 'EditPBBController@ubah')->name('edit');
Route::put('accPBB/{id}', 'EditPBBController@acc')->name('acc');
Route::put('decPBB/{id}', 'EditPBBController@dec')->name('dec');

Route::post('getMaterial','TambahPBBController@getMaterial');
Route::post('getAddress','TambahPBBController@getAddress');
Route::get('tambah_pbb','TambahPBBController@index');
Route::post('tambah_pbb','TambahPBBController@tambahPbbPost');
Route::resource('tambah_pbb_main', 'TambahPBBController');

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

//upload
// Route::get('/upload/upload', function() {
//   return view ('/upload/upload');
// }) -> name('upload');

Route::get('upload/dompul', 'UploadDompulController@index');
Route::get('downloadExcel/{type}', 'UploadDompulController@downloadExcel');
Route::post('importExcel', 'UploadDompulController@importExcel');
Route::get('/upload', 'UploadDompulController@data');

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

Route::resource('master/harga_dompul', 'HargaDompulController');
Route::get('/harga-dompul-data', 'HargaDompulController@data');

Route::resource('master/harga_produk', 'HargaProdukController');
Route::get('/harga-produk-data', 'HargaProdukController@data');

Route::resource('master/tipe_dompul', 'TipeDompulController');
Route::get('/tipe-dompul-data', 'TipeDompulController@data');

//transaction
Route::get('/karoseri/minta_karoseri', function() {
  return view ('/karoseri/minta_karoseri');
}) -> name('karoseri-permintaan');

Route::get('/karoseri/spkc', function() {
  return view ('/karoseri/spkc');
}) -> name('karoseri-spkc');

Route::get('/karoseri/print_spkc', function() {
  return view ('/karoseri/print_spkc');
}) -> name('karoseri-print_spkc');


Route::get('/master/cara_bayar', function() {
  return view ('/master/cara_bayar');
}) -> name('master-cara_bayar');

Route::get('/karoseri/wo', function() {
  return view ('/karoseri/wo');
}) -> name('karoseri-wo');

Route::get('/karoseri/viewprint_wo', function() {
  return view ('/karoseri/viewprint_wo');
}) -> name('karoseri-viewprint_wo');
//NEW
Route::get('/karoseri/pbb', function() {
  return view ('/karoseri/pbb');
}) -> name('karoseri-pbb');

Route::get('/karoseri/tambah_pbb', function() {
  return view ('/karoseri/tambah_pbb');
}) -> name('karoseri-tambah_pbb');

Route::get('/karoseri/edit_pbb', function() {
  return view ('/karoseri/edit_pbb');
}) -> name('karoseri-edit_pbb');

Route::get('/karoseri/print_pbb', function() {
  return view ('/karoseri/print_pbb');
}) -> name('karoseri-print_pbb');

Route::get('/karoseri/viewprint_pbb', function() {
  return view ('/karoseri/viewprint_pbb');
}) -> name('karoseri-viewprint_pbb');

Route::get('/karoseri/spkpb', function() {
  return view ('/karoseri/spkpb');
}) -> name('karoseri-spkpb');

Route::get('/karoseri/viewprint_spkpb', function() {
  return view ('/karoseri/viewprint_spkpb');
}) -> name('karoseri-viewprint_spkpb');

Route::get('/karoseri/print_spkpb', function() {
  return view ('/karoseri/print_spkpb');
}) -> name('karoseri-print_spkpb');

Route::get('/karoseri/kasbon', function() {
  return view ('/karoseri/kasbon');
}) -> name('karoseri-kasbon');

Route::get('/karoseri/print_penawaran', function() {
  return view ('/karoseri/print_penawaran');
}) -> name('karoseri-print_penawaran');

Route::get('/karoseri/viewprint_adendum', function() {
  return view ('/karoseri/viewprint_adendum');
}) -> name('karoseri-viewprint_adendum');

Route::get('/karoseri/qc_tambah', function() {
  return view ('/karoseri/qc_tambah');
}) -> name('karoseri-qc_tambah');

Route::get('/karoseri/print_qc', function() {
  return view ('/karoseri/print_qc');
}) -> name('karoseri-print_qc');


Route::get('/karoseri/bap', function() {
  return view ('/karoseri/bap');
}) -> name('karoseri-bap');

Route::get('/karoseri/print_bap', function() {
  return view ('/karoseri/print_bap');
}) -> name('karoseri-print_bap');

Route::get('/karoseri/viewprint_bap', function() {
  return view ('/karoseri/viewprint_bap');
}) -> name('karoseri-viewprint_bap');

Route::get('/karoseri/surat_jalan', function() {
  return view ('/karoseri/surat_jalan');
}) -> name('karoseri-surat_jalan');

Route::get('/karoseri/print_sj', function() {
  return view ('/karoseri/print_sj');
}) -> name('karoseri-print_sj');

Route::get('/karoseri/viewprint_sj', function() {
  return view ('/karoseri/viewprint_sj');
}) -> name('karoseri-viewprint_sj');

//LAPORAN

Route::resource('lap_spkc', 'Laporan\LaporanSPKCController');
Route::get('laporan-lap_spkc', 'Laporan\LaporanSPKCController@data')->name('laporanspkc');
Route::get('laporan/printExcel/{type}', 'Laporan\LaporanSPKCController@printExcel');

Route::resource('lap_penjualan', 'Laporan\LaporanPenjualanController');
Route::get('laporan-lap_penjualan', 'Laporan\LaporanPenjualanController@data')->name('laporanpenjualan');
Route::get('laporan/printPenjualanExcel/{type}', 'Laporan\LaporanPenjualanController@printExcel');

Route::resource('lap_penjualan_unit', 'Laporan\LaporanPenjualanUnitController');
Route::get('laporan-lap_penjualan_unit', 'Laporan\LaporanPenjualanUnitController@data')->name('laporanpenjualanunit');
Route::get('laporan/printPenjualanUnitExcel/{type}', 'Laporan\LaporanPenjualanUnitController@printExcel');

Route::resource('lap_progress', 'Laporan\LaporanProgressController');
Route::get('laporan-lap_progress', 'Laporan\LaporanProgressController@data')->name('laporanprogress');
Route::get('laporan/printProgressExcel/{type}', 'Laporan\LaporanProgressController@printExcel');

Route::resource('lap_progress_pb', 'Laporan\LaporanProgressPBController');
Route::get('laporan-lap_progress_pb', 'Laporan\LaporanProgressPBController@data')->name('laporanprogresspb');
Route::get('laporan/printProgressPBExcel/{type}', 'Laporan\LaporanProgressPBController@printExcel');

Route::resource('lap_progress_detailpb', 'Laporan\LaporanProgressDetailPBController');
Route::get('laporan-lap_progress_detailpb', 'Laporan\LaporanProgressDetailPBController@data')->name('laporanprogressdetailpb');
Route::get('laporan/printProgressDetailPBExcel/{type}', 'Laporan\LaporanProgressDetailPBController@printExcel');

Route::get('/laporan/lap_spkc', function() {
  return view ('/laporan/lap_spkc');
}) -> name('laporan-lap_spkc');

Route::get('/laporan/lap_penjualan_unit', function() {
  return view ('/laporan/lap_penjualan_unit');
}) -> name('laporan-lap_penjualan_unit');

Route::get('/laporan/lap_penjualan', function() {
  return view ('/laporan/lap_penjualan');
}) -> name('laporan-lap_penjualan');

Route::get('/laporan/lap_progress', function() {
  return view ('/laporan/lap_progress');
}) -> name('laporan-lap_progress');

Route::get('/laporan/lap_progress_pb', function() {
  return view ('/laporan/lap_progress_pb');
}) -> name('laporan-lap_progress_pb');

Route::get('/laporan/lap_progress_detailpb', function() {
  return view ('/laporan/lap_progress_detailpb');
}) -> name('laporan-lap_progress_detailpb');
