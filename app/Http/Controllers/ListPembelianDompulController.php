<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PembelianDompul;
use App\DetailPembelianDompul;
use App\UploadDompul;
use App\HargaDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPembelianDompulController extends Controller
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
        return view('pembelian.dompul.list-pembelian-dompul');
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_pembelian)
    {
        if ($tgl_pembelian=='null') {
            $tgl = $tgl_pembelian;
        }else {
            session(['dompul-list-tgl'=>$tgl_pembelian]);
            $tgl = Carbon::parse($tgl_pembelian);
            $tgl = $tgl->format('Y-m-d');

        }
        return $datatables->eloquent(PembelianDompul::select('id_pembelian_dompul',
        'nama_supplier',
        'nm_lokasi',
        'tanggal_pembelian_dompul',
        'status_pembelian')
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_dompuls.id_supplier')
                        ->join('master_lokasis','master_lokasis.id_lokasi','=','pembelian_dompuls.id_lokasi')
                        // ->join('detail_pembelian_dompuls','detail_pembelian_dompuls.id_pembelian_dompul','=','pembelian_dompuls.id_pembelian_dompul')
                        ->where('tanggal_pembelian_dompul',$tgl)
                        ->where('deleted',0))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                         ->addColumn('status_verif', function ($pembelianDompul) {
                              if ($pembelianDompul->status_pembayaran==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($pembelianDompul) {
                            //   if ($pembelianDompul->status_pembayaran==0) {
                            //       return
                            //         '<a class="btn btn-xs btn-primary"
                            //         href="/pembelian/dompul/list-invoice/edit/'.$pembelianDompul->id_pembelian_dompul.'/'.$pembelianDompul->nm_sales.'/'.$pembelianDompul->tanggal_pembelian_dompul.'/'.$pembelianDompul->nm_cust.'">
                            //         <i class="glyphicon glyphicon-edit"></i> Edit
                            //         </a>
                            //         <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$pembelianDompul->id_pembelian_dompul.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                            //         <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianDompul->id_pembelian_dompul.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                            //   } else {
                            //       return
                            //         '<a class="btn btn-xs btn-primary"
                            //         href="/pembelian/dompul/list-invoice/edit/'.$pembelianDompul->id_pembelian_dompul.'/'.$pembelianDompul->nm_sales.'/'.$pembelianDompul->tanggal_pembelian_dompul.'/'.$pembelianDompul->nm_cust.'">
                            //         <i class="glyphicon glyphicon-edit"></i> Lihat
                            //         </a>
                            //         <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianDompul->id_pembelian_dompul.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                            //   }

                            })
                          ->make(true);
    }
}
