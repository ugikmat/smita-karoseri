<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PembelianDompul;
use App\DetailPembelianDompul;
use App\DetailPembayaranPembelianDompul;
use App\UploadDompul;
use App\HargaDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class LaporanPembelianDompulController extends Controller
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
        return view('pembelian.laporan-pembelian.Lbeli-dompul');
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
        $total_nominal = DB::table('detail_pembayaran_pembelian_dompuls')
                   ->select(DB::raw("id_pembelian_dompul, sum(nominal) AS total_bayar,
    	sum(IF(metode_pembayaran = 'Cash', nominal, 0)) AS cash,
	sum(IF(metode_pembayaran = 'BCA Pusat', nominal, 0)) AS bca_pusat, 
	sum(IF(metode_pembayaran = 'BCA Cabang', nominal, 0)) AS bca_cabang, 
	sum(IF(metode_pembayaran = 'Mandiri', nominal, 0)) AS mandiri,
	sum(IF(metode_pembayaran = 'BNI', nominal, 0)) AS bni, 
    sum(IF(metode_pembayaran = 'BRI', nominal, 0)) AS bri"))
                    ->where('deleted',0)
                   ->groupBy('id_pembelian_dompul');

        $total_penjualan = DB::table('detail_pembelian_dompuls')
                   ->select(DB::raw("id_pembelian_dompul, produk,
    	sum(IF(produk = 'DOMPUL', jumlah, 0)) AS dompul,
        sum(IF(produk = 'DP5', jumlah, 0)) AS dp5,
        sum(IF(produk = 'DP10', jumlah, 0)) AS dp10"))
                    ->where('status_detail_pd',1)
                   ->groupBy('id_pembelian_dompul','produk');

        return $datatables->eloquent(PembelianDompul::select(DB::raw('master_suppliers.nama_supplier, nama_bo,
                                sum(pembelian_dompuls.grand_total) AS total_penjualan, sum(cash) AS cash, 
                                sum(bca_pusat) AS bca_pusat, sum(bca_cabang) AS bca_cabang, sum(mandiri) AS mandiri, sum(bni) AS bni, sum(bri) AS bri, 
                                (sum(pembelian_dompuls.grand_total)-sum(total_bayar)) AS piutang,
                                SUM(dompul) AS dompul,
                                SUM(dp5) AS dp5,
                                SUM(dp10) AS dp10'))
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_dompuls.id_supplier')
                        ->join('users','users.id_user','=','pembelian_dompuls.id_user')
                        ->join('bos','bos.id_bo','=','users.id_bo')
                        ->joinSub($total_nominal, 'total_nominal', function($join) {
                            $join->on('pembelian_dompuls.id_pembelian_dompul', '=', 'total_nominal.id_pembelian_dompul');
                        })
                        ->joinSub($total_penjualan, 'total_penjualan', function($join) {
                            $join->on('pembelian_dompuls.id_pembelian_dompul', '=', 'total_penjualan.id_pembelian_dompul');
                        })
                        // ->join('upload_dompuls','upload_dompul.id_pembelian_dompul','=','penjualan_dompul.id_pembelian_dompul')
                        ->where('tanggal_pembelian_dompul',$tgl)
                        ->groupBy('master_suppliers.nama_supplier','nama_bo'))
                        ->addColumn('index', function ($pembelianDompul) {
                              return 
                              '';
                            })
                            ->addColumn('total_penjualan', function ($pembelianDompul) {
                              return number_format($pembelianDompul->total_penjualan,0,",",".");
                            })
                            ->addColumn('dompul', function ($pembelianDompul) {
                              return number_format($pembelianDompul->dompul,0,",",".");
                            })
                            ->addColumn('dp5', function ($pembelianDompul) {
                              return number_format($pembelianDompul->dp5,0,",",".");
                            })
                            ->addColumn('dp10', function ($pembelianDompul) {
                              return number_format($pembelianDompul->dp10,0,",",".");
                            })
                            ->addColumn('cash', function ($pembelianDompul) {
                              return number_format($pembelianDompul->cash,0,",",".");
                            })
                            ->addColumn('bca_pusat', function ($pembelianDompul) {
                              return number_format($pembelianDompul->bca_pusat,0,",",".");
                            })
                            ->addColumn('bca_cabang', function ($pembelianDompul) {
                              return number_format($pembelianDompul->bca_cabang,0,",",".");
                            })
                            ->addColumn('mandiri', function ($pembelianDompul) {
                              return number_format($pembelianDompul->mandiri,0,",",".");
                            })
                            ->addColumn('bni', function ($pembelianDompul) {
                              return number_format($pembelianDompul->bni,0,",",".");
                            })
                            ->addColumn('bri', function ($pembelianDompul) {
                              return number_format($pembelianDompul->bri,0,",",".");
                            })
                            ->addColumn('mandiri', function ($pembelianDompul) {
                              return number_format($pembelianDompul->mandiri,0,",",".");
                            })
                            ->addColumn('piutang', function ($pembelianDompul) {
                              return number_format($pembelianDompul->piutang,0,",",".");
                            })
                            // ->addColumn('piutang', function ($pembelianDompul) {
                            //   return $pembelianDompul->total_penjualan-
                            //   ($pembelianDompul->total_tunai+
                            //     $pembelianDompul->bca_pusat+
                            //     $pembelianDompul->bca_cabang+
                            //     $pembelianDompul->mandiri+
                            //     $pembelianDompul->bri+
                            //     $pembelianDompul->bni);
                            // })
                          ->make(true);
    }
}
