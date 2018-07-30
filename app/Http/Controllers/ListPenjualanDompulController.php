<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanDompul;
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
                          ->addColumn('action', function ($uploadDompul) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-produk="'.$uploadDompul->produk.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                          ->make(true);
    }
}
