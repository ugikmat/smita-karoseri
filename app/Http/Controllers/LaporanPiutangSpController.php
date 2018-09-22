<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanProduk;
use App\HargaProduk;
use App\DetailPenjualanProduk;
use App\DetailPembayaranSp;
use App\Sales;
use App\produk;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class LaporanPiutangSpController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','head']);
    }
    /**
     * Diplay a list of transaction made before
     */
    public function index(){
        $saless = Sales::where('status',1)->get();
        return view('/penjualan/laporan-penjualan/LP-piutang-sp',['saless'=>$saless]);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_penjualan)
    {
        if ($tgl_penjualan=='null') {
            $tgl = $tgl_penjualan;
        }else {
            $tgl = Carbon::parse($tgl_penjualan);
            $tgl = $tgl->format('Y-m-d');
            session(['tgl_laporan_sp'=>$tgl_penjualan]);
        }
        $total_nominal = DB::table('detail_pembayaran_sps')
                   ->select(DB::raw("id_penjualan_sp, sum(nominal) AS total_bayar"))->where('deleted',0)
                   ->groupBy('id_penjualan_sp');

        return $datatables->eloquent(PenjualanProduk::select(DB::raw('master_saless.nm_sales,
                                (sum(penjualan_sps.grand_total)-sum(total_bayar)) AS piutang'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_sps.id_sales')
                        ->join('users','users.id_user','=','penjualan_sps.id_user')
                        // ->join('bos','bos.id_bo','=','users.id_bo')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_sps.id_penjualan_sp', '=', 'total_nominal.id_penjualan_sp');
                        })
                        // ->where('tanggal_penjualan_sp',$tgl)
                        ->whereRaw("tanggal_penjualan_sp <= '{$tgl}'")
                        ->groupBy('master_saless.nm_sales'))
                        ->addColumn('index', function ($penjualanDompul) {
                              return 
                              '';
                            })
                          
                            ->addColumn('piutang', function ($penjualanDompul) {
                              return number_format($penjualanDompul->piutang,0,",",".");
                            })
                          ->make(true);
    }
}
