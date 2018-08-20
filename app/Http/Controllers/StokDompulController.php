<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokDompul;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class StokDompulController extends Controller
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
        return view('persediaan.mutasi-dompul');
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl)
    {
        // $data = DB::table('temp_detail_penjualan_sps')->get();
        $tgl = Carbon::parse($tgl);
        $tgl = $tgl->format('Y-m-d');
        session(['tgl_stok_dompul'=>$tgl]);
        $stokDompul = DB::table('kartu_stok_dompuls')->select(DB::raw('kartu_stok_dompuls.id_produk,
sum(kartu_stok_dompuls.masuk) AS stok_masuk, sum(kartu_stok_dompuls.keluar) AS stok_keluar,
(sum(kartu_stok_dompuls.masuk)-sum(kartu_stok_dompuls.keluar)) AS jumlah_stok'))
                        // ->join('upload_dompuls',function($join){
                        //     $join->on('kartu_stok_dompuls.id_produk','=','upload_dompuls.produk');
                        // })
                        ->where('tanggal_transaksi',$tgl)
                        ->groupBy('kartu_stok_dompuls.id_produk')->get();
        return $datatables->of($stokDompul)
                        ->addColumn('indeks', function ($dataStok) {
                              return '';
                            })
                            ->addColumn('stok_awal', function ($dataStok) {
                              return number_format(0,0,'','.');
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
