<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanDompul;
use App\UploadDompul;
use App\HargaDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;


class LaporanPenjualanDompulController extends Controller
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
    /**
     * Diplay a list of transaction made before
     */
    public function index(){
        return view('penjualan.laporan-penjualan.LPdompul');
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
        return $datatables->eloquent(PenjualanDompul::select(DB::raw('master_saless.nm_sales, 
                                COUNT(id_penjualan_dompul) as qty,
                                SUM(grand_total) as total_penjualan,
                                SUM(bayar_tunai) as total_tunai,
                                SUM(bca_pusat) as bca_pusat,
                                SUM(bca_cabang) as bca_cabang,
                                SUM(bri) as bri,
                                SUM(bni) as bni,
                                SUM(mandiri) as mandiri'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->groupBy('master_saless.nm_sales'))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('index', function ($penjualanDompul) {
                              return 
                              '';
                            })
                            // ->addColumn('bca_pusat', function ($penjualanDompul) {
                            //   return 
                            //   '';
                            // })
                            // ->addColumn('bca_cabang', function ($penjualanDompul) {
                            //   return 
                            //   '';
                            // })
                            // ->addColumn('mandiri', function ($penjualanDompul) {
                            //   return 
                            //   '';
                            // })
                            // ->addColumn('bni', function ($penjualanDompul) {
                            //   return 
                            //   '';
                            // })
                            // ->addColumn('bri', function ($penjualanDompul) {
                            //   return 
                            //   '';
                            // })
                            ->addColumn('piutang', function ($penjualanDompul) {
                              return $penjualanDompul->total_penjualan-
                              ($penjualanDompul->total_tunai+
                                $penjualanDompul->bca_pusat+
                                $penjualanDompul->bca_cabang+
                                $penjualanDompul->mandiri+
                                $penjualanDompul->bri+
                                $penjualanDompul->bni);
                            })
                          ->make(true);
    }
}
