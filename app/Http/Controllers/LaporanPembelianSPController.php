<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sales;
use App\Customer;
use App\PembelianProduk;
use App\DetailPembelianProduk;
use App\DetailPembayaranPembelianProduk;
use App\HargaProduk;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class LaporanPembelianSPController extends Controller
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
        return view('pembelian/laporan-pembelian/Lbeli-sp');
    }

     /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_pembelian)
    {
        if ($tgl_pembelian=='null') {
            $tgl = $tgl_pembelian;
        }else {
            $tgl = Carbon::parse($tgl_pembelian);
            $tgl = $tgl->format('Y-m-d');
        }
        $total_nominal = DB::table('detail_pembayaran_pembelian_sps')
                   ->select(DB::raw("id_pembelian_sp, sum(nominal) AS total_bayar,
    	sum(IF(metode_pembayaran = 'Cash', nominal, 0)) AS cash,
	sum(IF(metode_pembayaran = 'BCA Pusat', nominal, 0)) AS bca_pusat,
	sum(IF(metode_pembayaran = 'BCA Cabang', nominal, 0)) AS bca_cabang,
	sum(IF(metode_pembayaran = 'Mandiri', nominal, 0)) AS mandiri,
	sum(IF(metode_pembayaran = 'BNI', nominal, 0)) AS bni,
	sum(IF(metode_pembayaran = 'BRI', nominal, 0)) AS bri"))->where('deleted',0)
                   ->groupBy('id_pembelian_sp');

        return $datatables->eloquent(PembelianProduk::select(DB::raw('master_suppliers.nama_supplier, nama_bo,
                                sum(pembelian_sps.grand_total) AS total_penjualan, sum(cash) AS cash,
                                sum(bca_pusat) AS bca_pusat, sum(bca_cabang) AS bca_cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri,
                                (sum(pembelian_sps.grand_total)-sum(total_bayar)) AS piutang,
                                COUNT(pembelian_sps.id_pembelian_sp) AS total_transaksi'))
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_sps.id_supplier')
                        ->join('users','users.id_user','=','pembelian_sps.id_user')
                        ->join('bos','bos.id_bo','=','users.id_bo')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('pembelian_sps.id_pembelian_sp', '=', 'total_nominal.id_pembelian_sp');
                        })
                        ->where('tanggal_pembelian_sp',$tgl)
                        ->groupBy('master_suppliers.nama_supplier','nama_bo'))
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
    public function getData($tgl){
        if ($tgl!='null') {
            session(['tgl_laporan_sp'=>$tgl]);
            $tgl = Carbon::parse($tgl);
            $tgl = $tgl->format('Y-m-d');

        }
        $total_nominal = DB::table('detail_pembayaran_pembelian_sps')
                   ->select(DB::raw("id_pembelian_sp, sum(nominal) AS total_bayar,
    	sum(IF(metode_pembayaran = 'Cash', nominal, 0)) AS cash,
	sum(IF(metode_pembayaran = 'BCA Pusat', nominal, 0)) AS bca_pusat,
	sum(IF(metode_pembayaran = 'BCA Cabang', nominal, 0)) AS bca_cabang,
	sum(IF(metode_pembayaran = 'Mandiri', nominal, 0)) AS mandiri,
	sum(IF(metode_pembayaran = 'BNI', nominal, 0)) AS bni,
	sum(IF(metode_pembayaran = 'BRI', nominal, 0)) AS bri"))->where('deleted',0)
                   ->groupBy('id_pembelian_sp');

        $data = PembelianProduk::select(DB::raw('master_suppliers.nama_supplier, nama_bo,
                                sum(pembelian_sps.grand_total) AS total_penjualan, sum(cash) AS cash,
                                sum(bca_pusat) AS bca_pusat, sum(bca_cabang) AS bca_cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri,
                                (sum(pembelian_sps.grand_total)-sum(total_bayar)) AS piutang,
                                COUNT(pembelian_sps.id_pembelian_sp) AS total_transaksi'))
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_sps.id_supplier')
                        ->join('users','users.id_user','=','pembelian_sps.id_user')
                        ->join('bos','bos.id_bo','=','users.id_bo')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('pembelian_sps.id_pembelian_sp', '=', 'total_nominal.id_pembelian_sp');
                        })
                        ->where('tanggal_pembelian_sp',$tgl)
                        ->groupBy('master_suppliers.nama_supplier','nama_bo')->get();
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
                            $bca_pusat+=$value->bca_pusat;
                            $bca_cabang+=$value->bca_cabang;
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
}
