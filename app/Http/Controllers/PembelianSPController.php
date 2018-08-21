<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Sales;
use App\Customer;
use App\produk;
use App\DetailPembayaranSp;
use App\UploadDompul;
use App\PenjualanProduk;
use App\DetailPenjualanProduk;
use App\HargaProduk;
use App\PenjualanDompul;
use App\StokSp;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PembelianSPController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hargaProduks = HargaProduk::where('status_harga_sp','Aktif')->get();
        $produks = produk::where('status_produk','1')->get();
        $saless = Sales::where('status','1')->get();
        $jumlahProduk = $produks->count();
        return view('pembelian.sp.pembelian-sp',['saless'=>$saless,'produks'=>$produks,'hargaProduks'=>$hargaProduks,'jumlah'=>$jumlahProduk]);
    }
}
