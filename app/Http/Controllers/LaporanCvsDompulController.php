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

class LaporanCvsDompulController extends Controller
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
      $saless = Sales::where('status',1)->get();
        return view('penjualan.laporan-penjualan.LPdompul-cvs',['saless'=>$saless]);
    }

    public function getData($tgl,$sales){
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
                                sum(penjualan_dompuls.grand_total) AS total_penjualan, sum(cash) AS cash, sum(qty) as qty,
                                sum(bca_pusat) AS pusat, sum(bca_cabang) AS cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri, 
                                (sum(penjualan_dompuls.grand_total)-sum(total_bayar)) AS piutang,
                                COUNT(penjualan_dompuls.id_penjualan_dompul) AS total_transaksi'))
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('upload_dompuls','upload_dompuls.id_penjualan_dompul','=','penjualan_dompuls.id_penjualan_dompul')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        })
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->where('penjualan_dompuls.id_sales',$sales)
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
                            $qty+=$value->qty;
                            $total+=$value->total_penjualan;
                            $cash+=$value->cash;
                            $bca_pusat+=$value->pusat;
                            $bca_cabang+=$value->cabang;
                            $mandiri+=$value->mandiri;
                            $bni+=$value->bni;
                            $bri+=$value->bri;
                            $piutang+=$value->piutang;
                        }
        $nm_sales = Sales::select('nm_sales')->where('id_sales',$sales)->first();
        return response()->json(['success' => true, 'data' => $data
        , 'qty' => $qty
        , 'total' => $total
        , 'cash' => $cash
        , 'bca_pusat' => $bca_pusat
        , 'bca_cabang' => $bca_cabang
        , 'mandiri' => $mandiri
        , 'bni' => $bni
        , 'bri' => $bri
        , 'piutang' => $piutang
        , 'sales' => $nm_sales->nm_sales]);
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_penjualan,$sales)
    {
        if ($tgl_penjualan=='null') {
            $tgl = $tgl_penjualan;
        }else {
            $tgl = Carbon::parse($tgl_penjualan);
            $tgl = $tgl->format('Y-m-d');
        }
    //     $total_nominal = DB::table('detail_penjualan_dompuls')
    //                ->select(DB::raw("id_penjualan_dompul, sum(nominal) AS total_bayar,
    // 	sum(IF(metode_pembayaran = 'Cash', nominal, 0)) AS cash,
	// sum(IF(metode_pembayaran = 'BCA Pusat', nominal, 0)) AS bca_pusat, 
	// sum(IF(metode_pembayaran = 'BCA Cabang', nominal, 0)) AS bca_cabang, 
	// sum(IF(metode_pembayaran = 'Mandiri', nominal, 0)) AS mandiri,
	// sum(IF(metode_pembayaran = 'BNI', nominal, 0)) AS bni, 
    // sum(IF(metode_pembayaran = 'BRI', nominal, 0)) AS bri"))
    //                 ->where('deleted',0)
    //                ->groupBy('id_penjualan_dompul');

    //     $total_penjualan = DB::table('upload_dompuls')
    //                ->select(DB::raw("id_penjualan_dompul, produk,
    // 	sum(IF(produk = 'DOMPUL', qty, 0)) AS dompul,
    //     sum(IF(produk = 'DP5', qty, 0)) AS dp5,
    //     sum(IF(produk = 'DP10', qty, 0)) AS dp10"))
    //                 ->where('deleted',0)
    //                 ->where('status_active',1)
    //                ->groupBy('id_penjualan_dompul','produk');

        return $datatables->eloquent(PenjualanDompul::select(DB::raw('produk, sum(qty) as qty, harga_dompul, 
                                sum(qty*harga_dompul) AS harga_total'))
                        // ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('upload_dompuls','upload_dompuls.id_penjualan_dompul','=','penjualan_dompuls.id_penjualan_dompul')
                        // ->joinSub($total_nominal, 'total_nominal', function($join) {
                        //     $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_nominal.id_penjualan_dompul');
                        // })
                        // ->joinSub($total_penjualan, 'total_penjualan', function($join) {
                        //     $join->on('penjualan_dompuls.id_penjualan_dompul', '=', 'total_penjualan.id_penjualan_dompul');
                        // })
                        ->where('tanggal_penjualan_dompul',$tgl)
                        ->where('penjualan_dompuls.id_sales',$sales)
                        ->groupBy('id_sales','produk','harga_dompul'))
                        ->addColumn('index', function ($penjualanDompul) {
                              return 
                              '';
                            })
                            ->addColumn('jumlah_dompul', function ($penjualanDompul) {
                              return number_format($penjualanDompul->qty,0,",",".");
                            })
                            ->addColumn('harga_satuan', function ($penjualanDompul) {
                              return number_format($penjualanDompul->harga_dompul,3,",",".");
                            })
                            ->addColumn('harga_total', function ($penjualanDompul) {
                              return number_format($penjualanDompul->harga_total,3,",",".");
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
}
