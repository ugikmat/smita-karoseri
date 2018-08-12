<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanDompulHeadController extends Controller
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
        return view('penjualan.laporan-penjualan.dompul-head');
    }
    public function showUserTransaction(){
        return view('penjualan.laporan-penjualan.dompul-head-user');
    }
    public function showServerTransaction(){
        return view('penjualan.laporan-penjualan.dompul-head-server');
    }
}
