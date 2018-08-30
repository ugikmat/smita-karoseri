<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sales;
use App\Customer;
use App\PembelianProduk;
use App\DetailPembelianProduk;
use App\DetailPembayaranPembelianProduk;
use App\HargaProduk;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPembelianSPController extends Controller
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
        return view('pembelian.sp.list-pembelian-sp');
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
        return $datatables->eloquent(PembelianProduk::select('id_penjualan_sp',
        'nm_sales',
        'master_customers.no_hp',
        'nm_cust',
        'tanggal_penjualan_sp',
        'status_penjualan')
                        ->join('master_saless','master_saless.id_sales','=','penjualan_sps.id_sales')
                        ->join('master_customers','master_customers.id_cust','=','penjualan_sps.id_customer')
                        // ->join('detail_penjualan_dompuls','detail_penjualan_dompuls.id_penjualan_dompul','=','penjualan_dompuls.id_penjualan_dompul')
                        ->where('tanggal_penjualan_sp',$tgl)
                        ->where('deleted',0))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('tanggal_penjualan', function ($penjualanSP) {
                        
                            $tgl = Carbon::parse($penjualanSP->tanggal_penjualan_sp);
                            $tgl = $tgl->format('d/m/Y');
                            return $tgl;

                            })
                        ->addColumn('status_verif', function ($penjualanSP) {
                              if ($penjualanSP->status_penjualan==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($penjualanSP) {
                              if ($penjualanSP->status_penjualan==0) {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              }

                            })
                          ->make(true);
    }
}
