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
    private $nama_canvasser='';
    private $tgl='';
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
        $sales = Sales::where('status','1')->where('nm_sales',$request->get('id'))->first();
        $this->nama_canvasser = $request->get('id');
        $this->nama_tgl = $request->get('tgl');
        // return redirect('/penjualan/dompul/invoice-dompul',['sales'=>$sales,'tgl'=>$request->get('tgl'),'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
        return redirect('/penjualan/dompul/invoice-dompul')->with(['sales'=>$sales,'tgl'=>$request->get('tgl'),'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
    }
     /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        
        return $datatables->eloquent(UploadDompul::select(DB::raw('nama_downline, COUNT(id_upload) as qty'))
                        ->where('nama_canvasser',$this->nama_canvasser)
                        ->where('tanggal_transfer',$this->tgl)
                        ->groupBy('nama_downline')
                        ->orderBy('nama_downline'))
                          ->addColumn('action', function ($hargaDompul) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$hargaDompul->id_harga_dompul.'" 
                              data-nama="'.$hargaDompul->nama_harga_dompul.'"
                              data-tipe="'.$hargaDompul->tipe_harga_dompul.'"
                              data-harga="'.$hargaDompul->harga_dompul.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$hargaDompul->id_harga_dompul.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
