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
        session(['sales'=>$sales,'tgl'=>$request->get('tgl'),'now'=>Carbon::now('Asia/Jakarta')->format('d-m-Y')]);
        return redirect('/penjualan/dompul/invoice-dompul');
        // return view('penjualan.dompul.invoice-dompul')->with(['sales'=>$sales,'tgl'=>$this->nama_tgl,'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
    }
    

    /**
     * Display a list of transaction
     */
    public function edit($canvaser,$tgl,$downline)
    {   $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser','produk','tanggal_transfer')
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
                        ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
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
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
                        ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('nama_downline',$downline)->get();
        $total = 0;
        foreach ($sums as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        $total=number_format($total,0,",",".");
        return view('penjualan.dompul.invoice-dompul-3',['datas'=>$datas,'tgl'=>$tgl,'total'=>$total]);
    }
    /**
     * Update Upload Dompul tipe and price, back to edit
     * 
     */
    public function update(Request $request,$canvaser,$tgl,$downline,$produk,$no_faktur,$status_penjualan){
        // session(['tunai'=>$request->get('update_tunai'),'catatan'=>$request->get('update_catatan')]);
        $data =UploadDompul::where('nama_canvasser',$canvaser)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)
                        ->where('produk',$produk)
                        ->where('status_penjualan',$status_penjualan)
                        ->where('status_active',1)
                        ->where('no_faktur',$no_faktur)->first();
        $tipe = $request->get('tipe');
        $qty_program = $request->get('qty_program');
        $status_penjualans=$status_penjualan;
        
        if($tipe != 'default') {
            $data->tipe_dompul = $tipe;
            $data->harga_dompul = HargaDompul::where('nama_harga_dompul',$produk)
                                                    ->where('tipe_harga_dompul',$tipe)
                                                    ->first()
                                                    ->harga_dompul;
        }
        
        if (!is_null($qty_program)||!$qty_program==='') {
            $data->qty_program = $qty_program;
        }
        $data->save();
        $total=0;
        $sum =UploadDompul::where('nama_canvasser',$canvaser)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)
                        ->where('status_penjualan',$status_penjualan)
                        ->where('status_active',1)->get();
        foreach ($sum as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        return response()->json(['success' => true,'total'=>$total]);
    }

    /**
     * Verification before submit
     * 
     */
    public function verify(Request $request,$canvaser,$tgl,$downline){
        $tunai = $request->get('tunai');
        $bank = $request->get('bank');
        foreach ($bank as $key => $value) {
            $bank[$key]['trf']=number_format($bank[$key]['trf'],0,",",".");
        }
        $sales = Sales::select('id_sales','nm_sales')->where('nm_sales',$canvaser)->first();
        $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser')
                        ->where('nama_canvasser',$canvaser)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
                        ->where('nama_downline',$downline)->first();
        $sums = UploadDompul::select('upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->get();
        $total = 0;
        foreach ($sums as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        $total=number_format($total,0,",",".");
        return view('penjualan.dompul.invoice-dompul-4',
        [
            'datas'=>$datas,
            'tgl'=>$tgl,
            'total'=>$total,
            'tunai'=>$tunai,
            'bank'=>$bank,
            'sales'=>$sales
            ]);
    }
    /**
     * Save transaction
     */
    public function store(Request $request){
        $id_sales = $request->get('sales');
        $nm_sales = $request->get('nm_sales');
        $hp_downline = $request->get('downline');
        $tgl = Carbon::parse($request->get('tgl'));
        $tgl = $tgl->format('Y-m-d');
        $user = $request->get('user');
        $tgl_input = Carbon::now('Asia/Jakarta')->toDateString();
        $bank = $request->get('bank');
        $total = $request->get('total');
        $sales = Sales::where('id_sales',$id_sales)->first();
        $penjualanDompul = new PenjualanDompul();        
            $penjualanDompul->id_sales=$id_sales;
            $penjualanDompul->no_hp_kios=$hp_downline;
            $penjualanDompul->no_user=$user;
            $penjualanDompul->tanggal_penjualan_dompul=$tgl;
            $penjualanDompul->tanggal_input=$tgl_input;
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
            $penjualanDompul->grand_total=str_replace('.', '', $total);
            $penjualanDompul->bayar_tunai=str_replace('.', '', $tunai);
            $penjualanDompul->catatan=$catatan;
        $penjualanDompul->save();
        UploadDompul::where('tanggal_transfer',$tgl)
                    ->where('no_hp_downline',$hp_downline)
                    ->where('nama_canvasser',$nm_sales)
                    ->where('status_penjualan',0)
                    ->where('status_active',1)
                    ->update(['status_penjualan' => 1,'id_penjualan_dompul'=>$penjualanDompul->id_penjualan_dompul]);
        return redirect('/penjualan/dompul/invoice-dompul')->with('tgl',$request->get('tgl'))->with('sales',$sales);

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
                        ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
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
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)
                        ->where('status_penjualan',0)
                        ->where('status_active',1))
                        ->addColumn('total_harga', function ($uploadDompul) {
                              return number_format(($uploadDompul->qty-$uploadDompul->qty_program)*$uploadDompul->harga_dompul,0,",",".");
                            })
                          ->addColumn('action', function ($uploadDompul) {
                              $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-tipe='.$tipe.' data-produk="'.$uploadDompul->produk.'" data-faktur="'.$uploadDompul->no_faktur.'" data-qty="'.$uploadDompul->qty_program.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                          ->make(true);
    }

    
}
