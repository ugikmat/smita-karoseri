<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\UploadDompul;
use App\HargaDompul;
use App\PenjualanDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PenjualanDompulController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saless = Sales::where('status','1')->get();
        return view('penjualan.dompul.invoice-dompul',['saless'=>$saless]);
    }
    /**
     * Display a list of sales based on name
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sales = Sales::where('status','1')->where('nm_sales',$request->get('id'))->first();
        return redirect('/penjualan/dompul/invoice-dompul')->with(['sales'=>$sales,'tgl'=>$request->get('tgl'),'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
        // return view('penjualan.dompul.invoice-dompul')->with(['sales'=>$sales,'tgl'=>$this->nama_tgl,'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
    }
    /**
     * Diplay a list of transaction made before
     */
    public function list(){
        return view('penjualan.dompul.list-invoice');
    }

    /**
     * Display a list of transaction
     */
    public function edit($canvaser,$tgl,$downline)
    {   $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser','produk')
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->first();
        if(empty($datas->tipe_dompul)){
            $tipe = 'CVS';
        }else{
            $tipe = $datas->tipe_dompul;
        }
        $sums = UploadDompul::select('upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->get();
        $total = 0;
        foreach ($sums as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        
        return view('penjualan.dompul.invoice-dompul-3',['datas'=>$datas,'tgl'=>$tgl,'total'=>$total]);
    }
    /**
     * Update Upload Dompul tipe and price, back to edit
     * 
     */
    public function update(Request $request,$canvaser,$tgl,$downline,$produk,$no_faktur){
        $data =UploadDompul::where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)
                        ->where('produk',$produk)
                        ->where('no_faktur',$no_faktur)->first();
        $tipe = $request->get('tipe');
        $qty_program = $request->get('qty_program');
        
        if($tipe != 'default') {
            $data->tipe_dompul = $tipe;
            $data->harga_dompul = HargaDompul::where('nama_harga_dompul',$produk)
                                                    ->where('tipe_harga_dompul',$tipe)
                                                    ->first()
                                                    ->harga_dompul;
        }
        $data->qty_program = $qty_program;
        $data->save();
        return redirect()->back();
    }

    /**
     * Verification before submit
     * 
     */
    public function verify(Request $request,$canvaser,$tgl,$downline){
        $tunai = $request->get('tunai');
        $bank1 = $request->get('bank1');
        if (!empty($bank1)) {
            $trf1 = $request->get('trf1');
        }else{
            $trf1 = '';    
        }
        $bank2 = $request->get('bank2');
        if (!empty($bank2)) {
            $trf2 = $request->get('trf2');
        }else{
            $trf2 = '';    
        }
        $bank3 = $request->get('bank3');        
        if (!empty($bank3)) {
            $trf3 = $request->get('trf3');
        }else{
            $trf3 = '';    
        }
        $catatan = $request->get('catatan'); 
        $sales = Sales::select('id_sales','nm_sales')->where('nm_sales',$canvaser)->first();
        $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser')
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->first();
        $sums = UploadDompul::select('upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->get();
        $total = 0;
        foreach ($sums as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        return view('penjualan.dompul.invoice-dompul-4',
        [
            'datas'=>$datas,
            'tgl'=>$tgl,
            'total'=>$total,
            'tunai'=>$tunai,
            'trf1'=>$trf1,
            'trf2'=>$trf2,
            'trf3'=>$trf3,
            'bank1'=>$bank1,
            'bank2'=>$bank2,
            'bank3'=>$bank3,
            'catatan'=>$catatan,
            'sales'=>$sales
            ]);
    }
    /**
     * Save transaction
     */
    public function store(Request $request){
        
        $sales = $request->get('sales');
        $nm_sales = $request->get('nm_sales');
        $hp_downline = $request->get('downline');
        $tgl = $request->get('tgl');
        $user = $request->get('user');
        $tgl_input = Carbon::now('Asia/Jakarta')->toDateString();
        $tunai = $request->get('tunai');
        $trf1 = $request->get('trf1');
        $bank1 = $request->get('bank1');
        $trf2 = $request->get('trf2');
        $bank2 = $request->get('bank2');
        $trf3 = $request->get('trf3');
        $bank3 = $request->get('bank3');        
        $catatan = $request->get('catatan');
        $total = $request->get('total');

        $penjualanDompul = new PenjualanDompul();        
            $penjualanDompul->id_sales=$sales;
            $penjualanDompul->no_hp_kios=$hp_downline;
            $penjualanDompul->no_user=$user;
            $penjualanDompul->tanggal_penjualan_dompul=$tgl;
            $penjualanDompul->tanggal_input=$tgl_input;
            $penjualanDompul->bank=$bank1;
            $penjualanDompul->bank2=$bank2;
            $penjualanDompul->bank3=$bank3;
            $penjualanDompul->grand_total=$total;
            $penjualanDompul->bayar_tunai=$tunai;
            $penjualanDompul->bayar_transfer=$trf1;
            $penjualanDompul->bayar_transfer2=$trf2;
            $penjualanDompul->bayar_transfer3=$trf3;
            $penjualanDompul->catatan=$catatan;
        $penjualanDompul->save();
        UploadDompul::where('tanggal_transfer',$tgl)
                    ->where('no_hp_downline',$hp_downline)
                    ->where('nama_canvasser',$nm_sales)
                    ->update(['status_penjualan' => 1,'id_penjualan_dompul'=>$penjualanDompul->id_penjualan_dompul]);
        return redirect('/penjualan/dompul/invoice-dompul');

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
                        ->where('status_penjualan',0)
                        ->groupBy('nama_downline'))
                        ->addColumn('indeks', function ($uploadDompul) {
                              return '';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
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
        return $datatables->eloquent(UploadDompul::select('upload_dompuls.no_faktur','upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline))
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

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function listData(Datatables $datatables)
    {

        return $datatables->eloquent(PenjualanDompul::select('penjualan_dompuls.id_penjualan_dompul','master_saless.nm_sales','penjualan_dompuls.no_hp_kios','master_customers.nm_cust','penjualan_dompuls.tanggal_penjualan_dompul','penjualan_dompuls.status_pembayaran')
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios'))
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
