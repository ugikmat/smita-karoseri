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

class StokSpController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $saless = Sales::where('status',1)->get();
        return view('persediaan.mutasi-sp',['saless'=>$saless]);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_awal,$tgl_akhir)
    {
        // $data = DB::table('temp_detail_penjualan_sps')->get();
        
        $tgl_awal = Carbon::parse($tgl_awal);
        $tgl_awal = $tgl_awal->format('Y-m-d');    
        
        $tgl_akhir = Carbon::parse($tgl_akhir);
        $tgl_akhir = $tgl_akhir->format('Y-m-d');    
        $stokSP = DB::table('kartu_stok_sps')->select(DB::raw("kartu_stok_sps.id_produk as nama, nama_produk,
        COALESCE((SELECT sum(awal.masuk)-sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi < '{$tgl_awal}' AND awal.id_produk=nama),0) AS stok_awal,
sum(masuk) AS stok_masuk, sum(keluar) AS stok_keluar,
(sum(masuk)-sum(keluar)+COALESCE((SELECT sum(awal.masuk)-sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi < '{$tgl_awal}' AND awal.id_produk=nama),0)) AS jumlah_stok"))
                        ->join('master_produks',function($join){
                            $join->on('kartu_stok_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->whereBetween('tanggal_transaksi',[$tgl_awal,$tgl_akhir])
                        ->groupBy('nama','nama_produk');
        $produk = produk::select('kode_produk','stok_awal','stok_masuk','stok_keluar','jumlah_stok')
        ->leftJoinSub($stokSP, 'total_nominal', function($join) {
                            $join->on('master_produks.kode_produk', '=', 'total_nominal.nama_produk');
                        })
        ->where('status_produk',1)->groupBy('kode_produk','stok_awal','stok_masuk','stok_keluar','jumlah_stok')->get();
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
