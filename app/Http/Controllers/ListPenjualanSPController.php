<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\PenjualanProduk;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPenjualanSPController extends Controller
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
        return view('penjualan.sp.list-invoice-sp');
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
            session(['sp-list-tgl'=>$tgl_penjualan]);
            $tgl = Carbon::parse($tgl_penjualan);
            $tgl = $tgl->format('Y-m-d');

        }
        return $datatables->eloquent(PenjualanProduk::select('id_penjualan_sp',
        'nm_sales',
        'no_hp_customer',
        'nm_cust',
        'tanggal_penjualan_sp',
        'status_penjualan')
                        ->join('master_saless','master_saless.id_sales','=','penjualan_sps.id_sales')
                        ->join('master_customers','master_customers.id_cust','=','penjualan_sps.id_customer')
                        // ->join('detail_penjualan_dompuls','detail_penjualan_dompuls.id_penjualan_dompul','=','penjualan_dompuls.id_penjualan_dompul')
                        ->where('tanggal_penjualan_sp',$tgl))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                          ->addColumn('action', function ($penjualanSP) {
                              if ($penjualanSP->status_penjualan==0) {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/dompul/list-invoice/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/dompul/list-invoice/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>';
                              }

                            })
                          ->make(true);
    }
}
