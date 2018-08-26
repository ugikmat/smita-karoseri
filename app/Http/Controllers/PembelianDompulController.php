<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\UploadDompul;
use App\HargaDompul;
use App\PenjualanDompul;
use App\DetailPenjualanDompul;
use App\StokDompul;
use App\Dompul;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PembelianDompulController extends Controller
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
        $saless = Sales::where('status','1')->get();
        $dompuls = HargaDompul::where('status_harga_dompul','Aktif')->get();
        return view('pembelian.dompul.pembelian-dompul',['saless'=>$saless,'dompuls'=>$dompuls]);
    }
}
