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
    /**
     * Display a list of sales based on name
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sales = Sales::where('status','1')->where('nm_sales',$request->get('id'))->first();
        return redirect('/penjualan/dompul/list-invoice')->with(['sales'=>$sales,'tgl'=>$request->get('tgl'),'now'=>Carbon::now('Asia/Jakarta')->format('d-m-Y')]);
        // return view('penjualan.dompul.invoice-dompul')->with(['sales'=>$sales,'tgl'=>$this->nama_tgl,'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
    }

    public function edit($id,$canvaser,$tgl,$downline){
        $penjualanDompul = PenjualanDompul::select('penjualan_dompuls.id_penjualan_dompul','master_saless.nm_sales','master_saless.no_hp','penjualan_dompuls.no_hp_kios','master_customers.nm_cust','penjualan_dompuls.tanggal_penjualan_dompul')
                            ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                            ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
                            ->where('id_penjualan_dompul',$id)->first();
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
        return view('penjualan.dompul.list-edit-p-dompul-ro',['penjualanDompul'=>$penjualanDompul,'total'=>$total]);
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
