<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\UploadDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PenjualanDompulController extends Controller
{
    private $nama_canvasser;
    private $tgl;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saless = Sales::where('status','1')->get();
        return view('penjualan.dompul.invoice-dompul',['saless'=>$saless]);
    }
    public function show(Request $request)
    {
        
        $this->nama_canvasser = $request->get('id');
        $this->nama_tgl = $request->get('tgl');
        $sales = Sales::where('status','1')->where('nm_sales',$this->nama_canvasser)->first();
        return redirect('/penjualan/dompul/invoice-dompul')->with(['sales'=>$sales,'tgl'=>$this->nama_tgl,'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
        // return view('penjualan.dompul.invoice-dompul')->with(['sales'=>$sales,'tgl'=>$this->nama_tgl,'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
    }
    
    public function edit($canvaser,$tgl,$downline)
    {   $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser')
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->first();
        return view('penjualan.dompul.invoice-dompul-3',['datas'=>$datas,'tgl'=>$tgl]);
    }

     /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$canvaser,$tgl)
    {
        return $datatables->eloquent(UploadDompul::select(DB::raw('nama_downline, COUNT(id_upload) as qty'))
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->groupBy('nama_downline','qty')
                        ->orderBy('nama_downline'))
                          ->addColumn('action', function ($uploadDompul) {
                              return 
                              '<a class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function penjualanData(Datatables $datatables,$canvaser,$tgl,$downline)
    {
        return $datatables->eloquent(UploadDompul::select('upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)
                        ->join('master_harga_dompuls','master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk'))
                        ->addColumn('total_harga', function ($uploadDompul) {
                              return $uploadDompul->qty*$uploadDompul->harga_dompul;
                            })
                          ->addColumn('action', function ($uploadDompul) {
                              return 
                              '<a class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
