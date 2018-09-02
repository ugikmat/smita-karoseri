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

    public function verif($id){
        PembelianProduk::where('id_pembelian_sp',$id)
                        ->update(['status_pembelian'=>1
                        ]);
        return redirect()->back();
    }

    public function delete(Request $request){
        PembelianProduk::where('id_pembelian_sp',$request->get('id'))->update(['deleted'=>1]);
        return redirect('/pembelian/sp/list-pembelian-sp');
    }

     public function edit($id){
        $pembelianSP = PembelianProduk::where('id_pembelian_sp',$id)->first();
        $pembayaran = DetailPembayaranPembelianProduk::where('id_pembelian_sp',$id)->where('deleted',0)->get();
        $total_pembayaran=0;
        foreach ($pembayaran as $key => $value) {
            $total_pembayaran+=$value->nominal;
        }
        return view('pembelian/sp/list-pembelian-sp-2',['pembelianSP'=>$pembelianSP,'pembayaran'=>$pembayaran,'total_pembayaran'=>$total_pembayaran]);
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
            session(['sp-list-tgl'=>$tgl_pembelian]);
            $tgl = Carbon::parse($tgl_pembelian);
            $tgl = $tgl->format('Y-m-d');

        }
        return $datatables->eloquent(PembelianProduk::select('id_pembelian_sp',
        'nama_supplier',
        'nm_lokasi',
        'tanggal_pembelian_sp',
        'status_pembelian')
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_sps.id_supplier')
                        ->join('master_lokasis','master_lokasis.id_lokasi','=','pembelian_sps.id_lokasi')
                        // ->join('detail_pembelian_dompuls','detail_pembelian_dompuls.id_pembelian_dompul','=','pembelian_dompuls.id_pembelian_dompul')
                        ->where('tanggal_pembelian_sp',$tgl)
                        ->where('deleted',0))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('tanggal_pembelian', function ($pembelianSP) {
                        
                            $tgl = Carbon::parse($pembelianSP->tanggal_pembelian_sp);
                            $tgl = $tgl->format('d/m/Y');
                            return $tgl;

                            })
                        ->addColumn('status_verif', function ($pembelianSP) {
                              if ($pembelianSP->status_pembelian==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($pembelianSP) {
                              if ($pembelianSP->status_pembelian==0) {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/pembelian/sp/list-invoice/edit/'.$pembelianSP->id_pembelian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$pembelianSP->id_pembelian_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianSP->id_pembelian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/pembelian/sp/list-invoice/edit/'.$pembelianSP->id_pembelian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianSP->id_pembelian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              }

                            })
                          ->make(true);
    }
}
