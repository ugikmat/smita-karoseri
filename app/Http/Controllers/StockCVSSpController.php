<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokSp;
use App\Sales;
use App\produk;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class StockCVSSpController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','kasir']);
    }
    public function index(){
        $saless = Sales::where('status',1)->get();
        return view('persediaan.sp.mutasi-sp-cvs',['saless'=>$saless]);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$sales,$tgl_awal,$tgl_akhir)
    {
        // $data = DB::table('temp_detail_penjualan_sps')->get();

        $tgl_awal = Carbon::parse($tgl_awal);
        $tgl_awal = $tgl_awal->format('Y-m-d');

        $tgl_akhir = Carbon::parse($tgl_akhir);
        $tgl_akhir = $tgl_akhir->format('Y-m-d');
        $stokSP = DB::table('kartu_stok_sps')->select(DB::raw("kartu_stok_sps.id_produk as nama,
        COALESCE((SELECT sum(awal.masuk)-sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi < '{$tgl_awal}' AND awal.id_produk=nama),0) AS stok_awal,
COALESCE((SELECT sum(awal.masuk)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi BETWEEN '{$tgl_awal}' AND '{$tgl_akhir}' AND awal.id_produk=nama),0) AS stok_masuk,
COALESCE((SELECT sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi BETWEEN '{$tgl_awal}' AND '{$tgl_akhir}' AND awal.id_produk=nama),0) AS stok_keluar,
(sum(masuk)-sum(keluar)) AS jumlah_stok"))
                        ->whereRaw("tanggal_transaksi <= '{$tgl_akhir}'")
                        ->where('id_sales',$sales)
                        ->groupBy('nama');
        $produk = produk::select('kode_produk','nama_produk','stok_awal','stok_masuk','stok_keluar','jumlah_stok')
        ->leftJoinSub($stokSP, 'total_nominal', function($join) {
                            $join->on('master_produks.kode_produk', '=', 'total_nominal.nama');
                        })
        ->where('status_produk',1)->get();
        return $datatables->of($produk)
                        ->addColumn('indeks', function ($dataStok) {
                              return '';
                            })
                            ->addColumn('stok_awal', function ($dataStok) {
                              return number_format($dataStok->stok_awal,0,'','.');
                            })
                            ->addColumn('stok_masuk', function ($dataStok) {
                              return number_format($dataStok->stok_masuk,0,'','.');
                            })
                            ->addColumn('stok_keluar', function ($dataStok) {
                              return number_format($dataStok->stok_keluar,0,'','.');
                            })
                            ->addColumn('jumlah_stok', function ($dataStok) {
                              return number_format($dataStok->jumlah_stok,0,'','.');
                            })
                          ->make(true);
    }
}
