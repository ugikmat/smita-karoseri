<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StokSp;
use App\Sales;
use App\Lokasi;
use App\produk;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class StokCVSSpAllController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','kasir']);
    }
    public function index(){
        $lokasis = Lokasi::select('master_lokasis.id_lokasi','master_lokasis.nm_lokasi')->where('status_lokasi',1)
        ->join('users_lokasi','users_lokasi.id_lokasi','=','master_lokasis.id_lokasi')
        ->join('users','users.id_user','=','users_lokasi.id_user')
        ->where('users.id_user',Auth::user()->id_user)
          ->get();
        if (empty(session('mutasi_lokasi'))) {
          $saless = Sales::where('status',1)
        ->join('users','users.name','=','master_saless.nm_sales')
        ->join('users_lokasi','users_lokasi.id_user','=','users.id_user')
        ->where('users_lokasi.id_lokasi',$lokasis->first()->id_lokasi)
        ->take(30)
        ->get();
        } else {
          $saless = Sales::where('status',1)
        ->join('users','users.name','=','master_saless.nm_sales')
        ->join('users_lokasi','users_lokasi.id_user','=','users.id_user')
        ->where('users_lokasi.id_lokasi',session('mutasi_lokasi'))
        ->take(30)
        ->get();
        }
        return view('persediaan.sp.mutasi-sp-semua-cvs',['saless'=>$saless,'lokasis'=>$lokasis]);
    }

    public function show(Request $request){
      session(['mutasi_lokasi'=>$request->get('lokasi'),'tgl_akhir_stok_sp'=>$request->get('tgl_akhir'),'tgl_awal_stok_sp'=>$request->get('tgl_awal')]);
      return redirect('/persediaan/sp/mutasi-sp-semua-cvs');
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
        $stokSP = DB::table('kartu_stok_sps')->select(DB::raw("kartu_stok_sps.id_produk as nama,
        COALESCE((SELECT sum(awal.masuk)-sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi < '{$tgl_awal}' AND awal.id_produk=nama),0) AS stok_awal,
COALESCE((SELECT sum(awal.masuk)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi BETWEEN '{$tgl_awal}' AND '{$tgl_akhir}' AND awal.id_produk=nama),0) AS stok_masuk,
COALESCE((SELECT sum(awal.keluar)
FROM kartu_stok_sps awal WHERE awal.tanggal_transaksi BETWEEN '{$tgl_awal}' AND '{$tgl_akhir}' AND awal.id_produk=nama),0) AS stok_keluar,
(sum(masuk)-sum(keluar)) AS jumlah_stok"))
                        ->whereRaw("tanggal_transaksi <= '{$tgl_akhir}'")
                        ->where(function ($query) {
                            $query->where('jenis_transaksi', 'PENGAMBILAN')
                                  ->orWhere('jenis_transaksi', 'PENGEMBALIAN');
                        })
                        ->groupBy('nama');

        $produk = produk::select('kode_produk','nama_produk','stok_awal','stok_masuk','stok_keluar','jumlah_stok')
        ->leftJoinSub($stokSP, 'total_nominal', function($join) {
                            $join->on('master_produks.kode_produk', '=', 'total_nominal.nama');
                        })
        ->where('status_produk',1)->get();
        $table = $datatables->of($produk);
        // $table->addColumn('indeks', function ($dataStok) {
        //                       return '';
        //                     });
        $saless = Sales::select('nm_sales','id_sales')->where('status',1)->get();
        foreach ($saless as $key => $sales) {
          $table = $table->addColumn($sales->nm_sales, function ($dataStok) use ($sales, &$tgl_akhir) {
                              $sum = DB::table('kartu_stok_sps')->select(DB::raw("id_sales,kartu_stok_sps.id_produk,(sum(masuk)-sum(keluar)) AS jumlah_stok"))
                              // ->rightJoin('master_produks','master_produks.kode_produk','=','kartu_stok_sps.id_produk')
                              ->whereRaw("tanggal_transaksi <= '{$tgl_akhir}'")
                              ->where('kartu_stok_sps.id_sales',$sales->id_sales)
                              ->where('kartu_stok_sps.id_produk',$dataStok->kode_produk)
                              ->groupBy('id_sales','kartu_stok_sps.id_produk')
                              ->first();
                              if ($sum==null) {
                                return number_format(0,0,'','.');
                              } else {
                                return number_format($sum->jumlah_stok,0,'','.');
                              }
                            });
        }
        return $table
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
