<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPenjualanDompulController extends Controller
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
        return view('penjualan.laporan-penjualan.LPdompul');
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_penjualan)
    {
        if ($tgl_penjualan=='null') {
            $tgl = $tgl_penjualan;
        }else {
            $tgl = Carbon::parse($tgl_penjualan);
            $tgl = $tgl->format('Y-m-d');
        }
        return $datatables->eloquent(PenjualanDompul::select('penjualan_dompuls.id_penjualan_dompul','master_saless.nm_sales','penjualan_dompuls.no_hp_kios','master_customers.nm_cust','penjualan_dompuls.tanggal_penjualan_dompul','penjualan_dompuls.status_pembayaran')
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
                        ->where('tanggal_penjualan_dompul',$tgl))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                          ->addColumn('action', function ($penjualanDompul) {
                              return 
                              '<a class="btn btn-xs btn-primary" 
                              href="/penjualan/dompul/list-invoice/edit/'.$penjualanDompul->id_penjualan_dompul.'/'.$penjualanDompul->nm_sales.'/'.$penjualanDompul->tanggal_penjualan_dompul.'/'.$penjualanDompul->nm_cust.'">
                              <i class="glyphicon glyphicon-edit"></i> Edit
                              </a>';
                            })
                          ->make(true);
    }
}
