<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sales;
use App\Customer;
use App\DetailPenjualanProduk;
use App\DetailPembayaranSp;
use App\PenjualanProduk;
use App\HargaProduk;
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

    public function edit($id_penjualan_sp, $sales, $tgl, $customer){
        $sales = Sales::where('nm_sales',$sales)->first();
        $customer = Customer::where('nm_cust',$customer)->first();
        $penjualanSP = PenjualanProduk::where('id_penjualan_sp',$id_penjualan_sp)->first();
        $pembayaran = DetailPembayaranSp::where('id_penjualan_sp',$id_penjualan_sp)->get();
        return view('penjualan.sp.list-invoice-sp-2',['sales'=>$sales,'customer'=>$customer,'penjualanSP'=>$penjualanSP,'pembayaran'=>$pembayaran]);
    }

    public function update(Request $request, $id,$id_detail){
        $data = DetailPenjualanProduk::where('id_detail_penjualan_sp',$id_detail)->first();

        // $data = DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $tipe = $request->get('tipe');
        $qty_program = $request->get('qty_program');
        
        if($tipe != 'default') {
            // DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)
            // ->update(['tipe_harga'=>$tipe]);
            $data->tipe_harga=$tipe;
        }
            $harga = HargaProduk::where('id_produk',$data->id_produk)->where('tipe_harga_sp',$data->tipe_harga)->first();
            // DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)
            // ->update(['harga_satuan'=>$harga->harga_sp,
            // 'harga_beli'=>$qty_program,
            // 'harga_total'=>($data->jumlah_sp-$qty_program)*$harga->harga_sp]);
            $data->harga_satuan=$harga->harga_sp;
            $data->harga_beli=$qty_program;
            $data->harga_total=($data->jumlah_sp-$qty_program)*$harga->harga_sp;
            $data->save();
        $total = 0;
        $datas = DetailPenjualanProduk::where('id_penjualan_sp',$id)->get();
        foreach ($datas as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return response()->json(['success' => true,'total'=>$total]);
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
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>';
                              }

                            })
                          ->make(true);
    }
    public function penjualanData(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_penjualan_sps')->get();

        $detailPenjualan = DetailPenjualanProduk::select(DB::raw('master_produks.nama_produk, 
        master_produks.satuan, 
        detail_penjualan_sps.harga_satuan,
        detail_penjualan_sps.harga_beli,
        detail_penjualan_sps.id_produk,
        detail_penjualan_sps.id_penjualan_sp,
        detail_penjualan_sps.id_detail_penjualan_sp,
        detail_penjualan_sps.tipe_harga, 
        detail_penjualan_sps.jumlah_sp,
        detail_penjualan_sps.harga_total'))
                        ->join('master_produks',function($join){
                            $join->on('detail_penjualan_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_penjualan_sp',$id)->get();
        $total = 0;
        foreach ($detailPenjualan as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return $datatables->of($detailPenjualan)
                        ->addColumn('indeks', function ($detailPenjualanSp) {
                              return '';
                            })
                            ->addColumn('total_harga', function ($detailPenjualanSp) {
                              return number_format(($detailPenjualanSp->jumlah_sp-$detailPenjualanSp->harga_beli)*$detailPenjualanSp->harga_satuan,0,",",".");
                            })
                            ->addColumn('action', function ($detailPenjualanSp) {
                                $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPenjualanSp->id_produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPenjualanSp->id_penjualan_sp.'" data-id_detail="'.$detailPenjualanSp->id_detail_penjualan_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPenjualanSp->harga_beli.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
