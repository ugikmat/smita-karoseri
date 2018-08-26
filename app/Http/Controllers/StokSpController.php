<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokSp;
use App\Sales;
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
    public function data(Datatables $datatables,$tgl,$sales)
    {
        // $data = DB::table('temp_detail_penjualan_sps')->get();
        session(['tgl_stok_sp'=>$tgl]);
        if (!empty($sales)) {
          session(['sales_stok_sp'=>$sales]); 
        }
        $tgl = Carbon::parse($tgl);
        $tgl = $tgl->format('Y-m-d');        
        $stokSP = DB::table('kartu_stok_sps')->select(DB::raw("id_produk as nama,
        (SELECT sum(awal.masuk)-sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi < '{$tgl}' AND awal.id_produk=nama AND awal.id_sales='{$sales}') AS stok_awal,
sum(masuk) AS stok_masuk, sum(keluar) AS stok_keluar,
(sum(masuk)-sum(keluar)+(SELECT sum(awal.masuk)-sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi < '{$tgl}' AND awal.id_produk=nama AND awal.id_sales='{$sales}')) AS jumlah_stok"))
                        // ->join('upload_dompuls',function($join){
                        //     $join->on('kartu_stok_dompuls.id_produk','=','upload_dompuls.produk');
                        // })
                        ->where('tanggal_transaksi',$tgl)
                        ->where('id_sales',$sales)
                        ->groupBy('nama')->get();
        return $datatables->of($stokSP)
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
