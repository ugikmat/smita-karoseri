<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanDompul;
use App\UploadDompul;
use App\HargaDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPenjualanDompulController extends Controller
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
        return view('penjualan.dompul.list-invoice');
    }

    public function edit($id,$canvaser,$tgl,$downline){
        $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser','produk','tanggal_transfer','id_penjualan_dompul')
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',1)
                        ->where('status_active',1)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('id_penjualan_dompul',$id)
                        ->where('nama_downline',$downline)->first();
        // $penjualanDompul = PenjualanDompul::select('penjualan_dompuls.id_penjualan_dompul','master_saless.nm_sales','master_saless.no_hp','penjualan_dompuls.no_hp_kios','master_customers.nm_cust','penjualan_dompuls.tanggal_penjualan_dompul')
        //                     ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
        //                     ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
        //                     ->where('id_penjualan_dompul',$id)->first();
        $sums = UploadDompul::select('upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',1)
                        ->where('status_active',1)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d-%m-%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->get();
        $total = 0;
        foreach ($sums as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        $penjualanDompul = PenjualanDompul::where('id_penjualan_dompul',$id)->first();
        return view('penjualan.dompul.list-edit-p-dompul-ro',['datas'=>$datas,'total'=>$total,'penjualanDompul'=>$penjualanDompul]);
    }

    public function verif($id){
        PenjualanDompul::where('id_penjualan_dompul',$id)
                        ->update(['status_pembayaran'=>1
                        ]);
        return redirect()->back();
    }

    public function update(Request $request){
        $id = $request->get('id');
        $tunai = $request->get('tunai');
        // $trf1 = $request->get('trf1');
        $bank1 = $request->get('bank1');
        // $trf2 = $request->get('trf2');
        $bank2 = $request->get('bank2');
        // $trf3 = $request->get('trf3');
        $bank3 = $request->get('bank3');        
        $catatan = $request->get('catatan');
        $total = $request->get('total');

        if (!empty($bank1)) {
            $trf1 = $request->get('trf1');
        }else{
            $trf1 = 0;    
        }
        $bank2 = $request->get('bank2');
        if (!empty($bank2)) {
            $trf2 = $request->get('trf2');
        }else{
            $trf2 = 0;    
        }
        $bank3 = $request->get('bank3');        
        if (!empty($bank3)) {
            $trf3 = $request->get('trf3');
        }else{
            $trf3 = 0;    
        }
        $penjualanDompul = PenjualanDompul::where('id_penjualan_dompul',$id)->first();
        switch ($bank1) {
                case 'BCA Pusat':
                    $penjualanDompul->bca_pusat=$trf1;
                    break;
                case 'BCA Cabang':
                    $penjualanDompul->bca_cabang=$trf1;
                    break;
                case 'Mandiri':
                    $penjualanDompul->mandiri=$trf1;
                    break;
                case 'BNI':
                    $penjualanDompul->bni=$trf1;
                    break;
                case 'BRI':
                    $penjualanDompul->bri=$trf1;
                    break;
                default:
                    break;
            }
            switch ($bank2) {
                 case 'BCA Pusat':
                    $penjualanDompul->bca_pusat=$trf2;
                    break;
                case 'BCA Cabang':
                    $penjualanDompul->bca_cabang=$trf2;
                    break;
                case 'Mandiri':
                    $penjualanDompul->mandiri=$trf2;
                    break;
                case 'BNI':
                    $penjualanDompul->bni=$trf2;
                    break;
                case 'BRI':
                    $penjualanDompul->bri=$trf2;
                    break;
                default:
                    break;
            }
            switch ($bank3) {
                 case 'BCA Pusat':
                    $penjualanDompul->bca_pusat=$trf3;
                    break;
                case 'BCA Cabang':
                    $penjualanDompul->bca_cabang=$trf3;
                    break;
                case 'Mandiri':
                    $penjualanDompul->mandiri=$trf3;
                    break;
                case 'BNI':
                    $penjualanDompul->bni=$trf3;
                    break;
                case 'BRI':
                    $penjualanDompul->bri=$trf3;
                    break;
                default:
                    break;
            }
            $penjualanDompul->grand_total=$total;
            $penjualanDompul->bayar_tunai=$tunai;
            $penjualanDompul->catatan=$catatan;
            $penjualanDompul->save();
        return redirect('/penjualan/dompul/list-invoice');
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
                              </a>
                              <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$penjualanDompul->id_penjualan_dompul.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>';
                            })
                          ->make(true);
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function penjualanData(Datatables $datatables,$sales,$tgl,$customer)
    {
        return $datatables->eloquent(UploadDompul::select('upload_dompuls.no_faktur','upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$sales)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$customer)
                        ->where('status_penjualan',1)
                        ->where('status_active',1))
                        ->addColumn('total_harga', function ($uploadDompul) {
                              return ($uploadDompul->qty-$uploadDompul->qty_program)*$uploadDompul->harga_dompul;
                            })
                          ->addColumn('action', function ($uploadDompul) {
                              $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-tipe='.$tipe.' data-produk="'.$uploadDompul->produk.'" data-faktur="'.$uploadDompul->no_faktur.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                          ->make(true);
    }
}
