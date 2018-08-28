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

    public function detail($sales){
        $dataSales = Sales::where('nm_sales',$sales)->first();
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
        $tgl = Carbon::parse(session('tgl_laporan_dompul'));
        $tgl = $tgl->format('Y-m-d');
        $penjualan =PenjualanDompul::select(DB::raw('master_customers.nm_cust,
                                sum(penjualan_dompuls.grand_total) AS total_penjualan, 
                                (sum(penjualan_dompuls.grand_total)-sum(total_bayar)) AS piutang'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        })
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->where('master_saless.nm_sales',$sales)
                        ->groupBy('master_customers.nm_cust')->get();
        $total_penjualan=0;
        $total_piutang=0;
        foreach ($penjualan as $key => $value) {
            $total_penjualan+=$value->total_penjualan;
            $total_piutang+=$value->piutang;
        }
        return view('penjualan.laporan-penjualan.LPdompul-2',['sales'=>$dataSales,'total_penjualan'=>$total_penjualan,'total_piutang'=>$total_piutang,]);
    }
    public function getData($tgl){
        if ($tgl!='null') {
            session(['tgl_laporan_dompul'=>$tgl]);
            $tgl = Carbon::parse($tgl);
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
        $data = PenjualanDompul::select(DB::raw('master_saless.nm_sales, 
                                sum(penjualan_dompuls.grand_total) AS total_penjualan, sum(cash) AS cash, 
                                sum(bca_pusat) AS pusat, sum(bca_cabang) AS cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri, 
                                (sum(penjualan_dompuls.grand_total)-sum(total_bayar)) AS piutang,
                                COUNT(penjualan_dompuls.id_penjualan_dompul) AS total_transaksi'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        })
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->groupBy('master_saless.nm_sales')->get();
                        $qty=0;
                        $total=0;
                        $cash=0;
                        $bca_pusat=0;
                        $bca_cabang=0;
                        $mandiri=0;
                        $bni=0;
                        $bri=0;
                        $piutang=0;
                        foreach ($data as $key => $value) {
                            $qty+=$value->total_transaksi;
                            $total+=$value->total_penjualan;
                            $cash+=$value->cash;
                            $bca_pusat+=$value->pusat;
                            $bca_cabang+=$value->cabang;
                            $mandiri+=$value->mandiri;
                            $bni+=$value->bni;
                            $bri+=$value->bri;
                            $piutang+=$value->piutang;
                        }
        return response()->json(['success' => true, 'data' => $data
        , 'qty' => $qty
        , 'total' => $total
        , 'cash' => $cash
        , 'bca_pusat' => $bca_pusat
        , 'bca_cabang' => $bca_cabang
        , 'mandiri' => $mandiri
        , 'bni' => $bni
        , 'bri' => $bri
        , 'piutang' => $piutang]);
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

        return $datatables->eloquent(PenjualanDompul::select(DB::raw('master_saless.nm_sales, nama_bo,
                                sum(penjualan_dompuls.grand_total) AS total_penjualan, sum(cash) AS cash, 
                                sum(bca_pusat) AS bca_pusat, sum(bca_cabang) AS bca_cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri, 
                                (sum(penjualan_dompuls.grand_total)-sum(total_bayar)) AS piutang,
                                COUNT(penjualan_dompuls.id_penjualan_dompul) AS total_transaksi'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('users','users.id_user','=','penjualan_dompuls.id_user')
                        ->join('bos','bos.id_bo','=','users.id_bo')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        })
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->groupBy('master_saless.nm_sales','nama_bo'))
                        ->addColumn('index', function ($penjualanDompul) {
                              return 
                              '';
                            })
                            ->addColumn('total_penjualan', function ($penjualanDompul) {
                              return number_format($penjualanDompul->total_penjualan,0,",",".");
                            })
                            ->addColumn('cash', function ($penjualanDompul) {
                              return number_format($penjualanDompul->cash,0,",",".");
                            })
                            ->addColumn('bca_pusat', function ($penjualanDompul) {
                              return number_format($penjualanDompul->bca_pusat,0,",",".");
                            })
                            ->addColumn('bca_cabang', function ($penjualanDompul) {
                              return number_format($penjualanDompul->bca_cabang,0,",",".");
                            })
                            ->addColumn('mandiri', function ($penjualanDompul) {
                              return number_format($penjualanDompul->mandiri,0,",",".");
                            })
                            ->addColumn('bni', function ($penjualanDompul) {
                              return number_format($penjualanDompul->bni,0,",",".");
                            })
                            ->addColumn('bri', function ($penjualanDompul) {
                              return number_format($penjualanDompul->bri,0,",",".");
                            })
                            ->addColumn('mandiri', function ($penjualanDompul) {
                              return number_format($penjualanDompul->mandiri,0,",",".");
                            })
                            ->addColumn('piutang', function ($penjualanDompul) {
                              return number_format($penjualanDompul->piutang,0,",",".");
                            })
                            // ->addColumn('piutang', function ($penjualanDompul) {
                            //   return $penjualanDompul->total_penjualan-
                            //   ($penjualanDompul->total_tunai+
                            //     $penjualanDompul->bca_pusat+
                            //     $penjualanDompul->bca_cabang+
                            //     $penjualanDompul->mandiri+
                            //     $penjualanDompul->bri+
                            //     $penjualanDompul->bni);
                            // })
                          ->make(true);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataPiutang(Datatables $datatables,$id,$tgl)
    {
        if ($tgl!='null') {
            $tgl = Carbon::parse($tgl);
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
        return $datatables->eloquent(PenjualanDompul::select(DB::raw('master_customers.nm_cust,
                                sum(penjualan_dompuls.grand_total) AS total_penjualan, 
                                (sum(penjualan_dompuls.grand_total)-sum(total_bayar)) AS piutang'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        })
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->where('master_saless.id_sales',$id)
                        ->groupBy('master_customers.nm_cust'))
                        ->addColumn('index', function ($penjualanDompul) {
                              return 
                              '';
                            })
                            ->addColumn('total_penjualan', function ($penjualanDompul) {
                              return number_format($penjualanDompul->total_penjualan,0,",",".");
                            })
                            ->addColumn('piutang', function ($penjualanDompul) {
                              return number_format($penjualanDompul->piutang,0,",",".");
                            })
                          ->make(true);
    }
}
