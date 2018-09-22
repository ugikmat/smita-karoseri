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
        $this->middleware(['auth','head']);
    }
    /**
     * Diplay a list of transaction made before
     */
    public function index(){
        return view('penjualan.laporan-penjualan.dompul-head');
    }

    public function lihatLaporan(Request $request){
        session(['tgl_laporan_head'=>$request->tgl]);

        switch ($request->input('action')) {
        case 'server':
            return view('penjualan.laporan-penjualan.dompul-head-server');
            break;

        case 'user':
            return view('penjualan.laporan-penjualan.dompul-head-user');
            break;
        }
    }

    public function showUserTransaction(){
        return view('penjualan.laporan-penjualan.dompul-head-user');
    }
    public function showServerTransaction(){
        return view('penjualan.laporan-penjualan.dompul-head-server');
    }
}
