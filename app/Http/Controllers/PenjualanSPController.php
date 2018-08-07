<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
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
                $detailPenjualanSp->keterangan_detail_psp='none';
                $detailPenjualanSp->save();
            }
        }        
        return view('/penjualan/sp/invoice-sp-2');
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
}
