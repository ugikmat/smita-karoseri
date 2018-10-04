<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanDompul;
use App\UploadDompul;
use App\HargaDompul;
use App\Sales;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class LaporanPiutangDompulController extends Controller
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
        return view('/penjualan/laporan-penjualan/LP-piutang-dompul',['saless'=>$saless]);
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
        }
        $total_nominal = DB::table('detail_penjualan_dompuls')
                   ->select(DB::raw("id_penjualan_dompul, sum(nominal) AS total_bayar,
    	sum(IF(metode_pembayaran = 'Cash', nominal, 0)) AS cash,
	sum(IF(metode_pembayaran = 'BCA Pusat', nominal, 0)) AS bca_pusat, 
	sum(IF(metode_pembayaran = 'BCA Cabang', nominal, 0)) AS bca_cabang, 
	sum(IF(metode_pembayaran = 'Mandiri', nominal, 0)) AS mandiri,
	sum(IF(metode_pembayaran = 'BNI', nominal, 0)) AS bni, 
    sum(IF(metode_pembayaran = 'BRI', nominal, 0)) AS bri"))
                    ->where('deleted',0)
                   ->groupBy('id_penjualan_dompul');

        $total_penjualan = DB::table('upload_dompuls')
                   ->select(DB::raw("id_penjualan_dompul, produk,
    	sum(IF(produk = 'DOMPUL', qty, 0)) AS dompul,
        sum(IF(produk = 'DP5', qty, 0)) AS dp5,
        sum(IF(produk = 'DP10', qty, 0)) AS dp10"))
                    ->where('deleted',0)
                    ->where('status_active',1)
                   ->groupBy('id_penjualan_dompul','produk');

        return $datatables->eloquent(PenjualanDompul::select(DB::raw('master_saless.nm_sales,
                                sum(penjualan_dompuls.grand_total) AS total_penjualan, sum(cash) AS cash, 
                                sum(bca_pusat) AS bca_pusat, sum(bca_cabang) AS bca_cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri, 
                                (sum(penjualan_dompuls.grand_total)-sum(total_bayar)) AS piutang,
                                SUM(dompul) AS dompul,
                                SUM(dp5) AS dp5,
                                SUM(dp10) AS dp10'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('users','users.id_user','=','penjualan_dompuls.id_user')
                        ->join('bos','bos.id_bo','=','users.id_bo')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        })
                        ->joinSub($total_penjualan, 'total_penjualan', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_penjualan.id_penjualan_dompul');
                        })
                        ->whereRaw("tanggal_penjualan_dompul <= '{$tgl}'")
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
