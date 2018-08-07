<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\Customer;
use App\produk;
use App\UploadDompul;
use App\PenjualanProduk;
use App\DetailPenjualanProduk;
use App\HargaProduk;
use App\PenjualanDompul;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class PenjualanSPController extends Controller
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
    public function set_session(Request $request){
        session(['tipe_harga'=>$request->input('tipe_harga'),'kode_produk'=>$request->input('kode_produk')]);
    }

    public function getHarga($tipe,$kode){
        $hargaProduks = HargaProduk::select('harga_sp')->where('status_harga_sp','Aktif')->where('id_produk',$kode)->where('tipe_harga_sp',$tipe)->first();
        return response()->json(['success' => true, 'harga' => $hargaProduks]);
    }

    public function edit(Request $request){
        $penjualanSp = new PenjualanProduk();
        $penjualanSp->id_sales=$request->get('sales');
        $penjualanSp->id_customer=$request->get('customer');
        $penjualanSp->no_hp_customer='0';
        $penjualanSp->grand_total='0';
        $penjualanSp->catatan='none';
        $tgl = Carbon::parse($request->get('tgl_penjualan'));
        $tgl = $tgl->format('Y-m-d');
        $penjualanSp->tanggal_penjualan_sp=$tgl;
        $penjualanSp->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $penjualanSp->no_user=Auth::user()->id;
        $penjualanSp->save();
        $produks = produk::where('status_produk','1')->get()->count();
        for ($i=0; $i <$produks ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                $detailPenjualanSp = new DetailPenjualanProduk();
                $detailPenjualanSp->id_penjualan_sp = $penjualanSp->id_penjualan_sp;
                $detailPenjualanSp->id_customer=$request->get('customer');
                $detailPenjualanSp->id_produk=$request->get("kode{$i}");
                $detailPenjualanSp->jumlah_sp=$request->get("jumlah{$i}");
                $detailPenjualanSp->tipe_harga=$request->get("tipe{$i}");
                $detailPenjualanSp->harga_satuan=$request->get("harga{$i}");
                $detailPenjualanSp->harga_total=$request->get("total{$i}");
                $detailPenjualanSp->harga_beli=0;
                $detailPenjualanSp->keterangan_detail_psp='none';
                $detailPenjualanSp->save();
            }
        }
        $sales = Sales::where('id_sales',$penjualanSp->id_sales)->first();
        $customer = Customer::where('id_cust',$penjualanSp->id_customer)->first();
        return view('/penjualan/sp/invoice-sp-2',['penjualanSp'=>$penjualanSp,'sales'=>$sales,'customer'=>$customer]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hargaProduks = HargaProduk::where('status_harga_sp','Aktif')->get();
        $arrHarga = $hargaProduks->mode('harga_sp');
        $produks = produk::where('status_produk','1')->get();
        $saless = Sales::where('status','1')->get();
        $jumlahProduk = $produks->count();
        return view('penjualan.sp.invoice-sp',['saless'=>$saless,'produks'=>$produks,'hargaProduks'=>$hargaProduks,'jumlah'=>$jumlahProduk,'arrHarga'=>$arrHarga]);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$id)
    {
/**
 * SELECT master_produks.nama_produk(uraian), master_produks.satuan, detail_penjualan_sps.harga_satuan, 
*       detail_penjualan_sps.tipe_harga, detail_penjualan_sps.jumlah_sp(kuantitas), 
*       detail_penjualan_sps.harga_total
*FROM master_produks JOIN detail_penjualan_sps
*ON master_produks.kode_produk = detail_penjualan_sps.id_produk
 */
        return $datatables->eloquent(DetailPenjualanProduk::select(DB::raw('master_produks.nama_produk, 
        master_produks.satuan, detail_penjualan_sps.harga_satuan,detail_penjualan_sps.harga_beli,
        detail_penjualan_sps.tipe_harga, detail_penjualan_sps.jumlah_sp,
        detail_penjualan_sps.harga_total'))
                        ->join('master_produks',function($join){
                            $join->on('detail_penjualan_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_penjualan_sp',$id))
                        ->addColumn('indeks', function ($uploadDompul) {
                              return '';
                            })
                            ->addColumn('action', function ($uploadDompul) {
                              return '';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function detailData(Datatables $datatables,$tgl)
    {

        return $datatables->eloquent(PenjualanProduk::select(DB::raw('penjualan_sps.id_penjualan_sp, master_saless.nm_sales, master_customers.no_hp_customer, master_customers.nm_cust, penjualan_sps.tanggal_penjualan_sp, penjualan_sps.status_penjualan'))
                        ->join('master_saless',function($join){
                            $join->on('penjualan_sps.id_sales','=','master_saless.id_sales');
                        })
                        ->join('master_customers',function($join){
                            $join->on('penjualan_sps.id_customer','=','master_customers.id_cust');
                        })
                        ->where('tanggal_penjualan_sp',$tgl))
                        ->addColumn('indeks', function ($uploadDompul) {
                              return '';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
