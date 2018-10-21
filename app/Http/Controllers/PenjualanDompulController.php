<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\UploadDompul;
use App\HargaDompul;
use App\PenjualanDompul;
use App\DetailPenjualanDompul;
use App\StokDompul;
use App\Lokasi;
use DB;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth','canvaser']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saless = Sales::where('status','1')->get();
        $lokasis = Lokasi::select('master_lokasis.id_lokasi','master_lokasis.nm_lokasi')
                    ->join('users_lokasi','users_lokasi.id_lokasi','=','master_lokasis.id_lokasi')
                    ->join('users','users.id_user','=','users_lokasi.id_user')
                    ->where('users.id_user',Auth::user()->id_user)
                    ->where('status_lokasi','1')
                    ->get();
        if (Auth::user()->level_user=='Canvaser') {
            $sales = Sales::where('nm_sales',Auth::user()->name)->where('status','1')->first();
            return view('penjualan.dompul.invoice-dompul',['saless'=>$saless,'lokasis'=>$lokasis,'sales'=>$sales]);
        }else{
            return view('penjualan.dompul.invoice-dompul',['saless'=>$saless,'lokasis'=>$lokasis]);
        }
    }
    /**
     * Display a list of sales based on name
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $sales = Sales::where('status','1')->where('id_sales',$request->get('id'))->first();
        session(['dompul_sales_id'=>$sales->id_sales,'dompul_sales_nama'=>$sales->nm_sales,'tgl_penjualan_dompul'=>$request->get('tgl'),'now'=>Carbon::now('Asia/Jakarta')->format('d-m-Y'),'lokasi_penjualan'=>$request->get('lokasi')]);
        return redirect('/penjualan/dompul/invoice-dompul');
        // return view('penjualan.dompul.invoice-dompul')->with(['sales'=>$sales,'tgl'=>$this->nama_tgl,'now'=>Carbon::now('Asia/Jakarta')->toDateString()]);
    }


    /**
     * Display a list of transaction
     */
    public function edit($canvaser,$tgl,$downline,$lokasi)
    {   
        $tgl_transfer = Carbon::parse($tgl)->format('Y-m-d');
        $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser','produk','tanggal_transfer')
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
                        ->where('tanggal_transfer',$tgl_transfer)
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
        return view('penjualan.dompul.invoice-dompul-3',['datas'=>$datas,'tgl'=>$tgl,'total'=>$total,'lokasi'=>$lokasi]);
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
        $qty_program = str_replace('.', '', $request->get('qty_program'));
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
        $total_pembayaran = $request->get('pembayaran');
        $selisih = $request->get('selisih');
        if(!empty($bank)){
        session(['bank'=>$bank]);
        for ($key=0; $key <count($bank) ; $key++) {
            // $bank[$key]['trf']=number_format($bank[$key]['trf'],0,",",".");
            if (empty($bank[$key]['bank'])) {
                array_splice($bank, $key,1);
                $key--;
            }
        }
      }
        // foreach ($bank as $key => $value) {
        //     $bank[$key]['trf']=number_format($bank[$key]['trf'],0,",",".");
        //     if (empty($value['bank'])) {
        //         array_splice($bank, $key,1);
        //     }
        // }
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
            'sales'=>$sales,
            'total_pembayaran'=>$total_pembayaran,
            'selisih'=>$selisih,
            'lokasi'=>$request->get('lokasi'),
            ]);
    }
    /**
     * Save transaction
     */
    public function store(Request $request){
        $request->session()->forget('bank');
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
        $penjualanDompul->id_user=$user;
        $penjualanDompul->id_lokasi=$request->get('lokasi');
        $penjualanDompul->id_bo=Auth::user()->id_bo;
        $penjualanDompul->tanggal_penjualan_dompul=$tgl;
        $penjualanDompul->tanggal_input=$tgl_input;
        $penjualanDompul->grand_total=str_replace('.', '', $total);
        $penjualanDompul->save();
        if (!empty($bank)) {
            foreach ($bank as $key => $value) {
                $detailPenjualanDompul = new DetailPenjualanDompul();
                $detailPenjualanDompul->id_penjualan_dompul = $penjualanDompul->id_penjualan_dompul;
                $detailPenjualanDompul->metode_pembayaran = $value['bank'];
                $detailPenjualanDompul->nominal=str_replace('.', '', $value['trf']);
                    switch ($value['bank']) {
                        case 'BCA Pusat':
                            $detailPenjualanDompul->bca_pusat=$value['trf'];
                            break;
                        case 'BCA Cabang':
                            $detailPenjualanDompul->bca_cabang=$value['trf'];
                            break;
                        case 'Mandiri':
                            $detailPenjualanDompul->mandiri=$value['trf'];
                            break;
                        case 'BNI':
                            $detailPenjualanDompul->bni=$value['trf'];
                            break;
                        case 'BRI':
                            $detailPenjualanDompul->bri=$value['trf'];
                            break;
                        case 'Cash':
                            $detailPenjualanDompul->cash=$value['trf'];
                            break;
                        default:
                            break;
                    }
                $detailPenjualanDompul->catatan = $value['catatan'];
                $detailPenjualanDompul->save();
            }
        }

        $dataPenjualan = UploadDompul::where('tanggal_transfer',$tgl)
                    ->where('no_hp_downline',$hp_downline)
                    ->where('nama_canvasser',$nm_sales)
                    ->where('status_penjualan',0)
                    ->where('status_active',1)->get();
        foreach ($dataPenjualan as $key => $value) {
                //Update Upload Dompul
                $value->status_penjualan=1;
                $value->id_penjualan_dompul=$penjualanDompul->id_penjualan_dompul;
                $value->save();

                //Insert Stok Dompul
                $stokDompul = new StokDompul();
                $stokDompul->id_produk = $value->produk;
                $stokDompul->id_sales = $id_sales;
                $stokDompul->id_lokasi = $request->get('lokasi');
                $stokDompul->tanggal_transaksi = $tgl;
                $stokDompul->nomor_referensi = $value->id_upload;
                $stokDompul->jenis_transaksi = 'PENJUALAN';
                $stokDompul->keterangan = "{$value->tipe_dompul}-";
                $stokDompul->masuk = 0;
                $stokDompul->keluar = $value->qty;
                $stokDompul->tanggal_input = Carbon::now('Asia/Jakarta')->toDateTimeString();;
                $stokDompul->id_user = $user;
                $stokDompul->save();
        }
        $request->session()->flash('status','');
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
        if($tgl!='null'){
            $tgl = Carbon::parse($tgl);
            $tgl = $tgl->format('Y-m-d');
        }
        return $datatables->eloquent(UploadDompul::select(DB::raw('nama_downline, COUNT(id_upload) as qty'))
                        ->where('nama_canvasser',$canvaser)
                        ->where('tanggal_transfer',$tgl)
                        ->where('status_penjualan',0)
                        ->where('status_active',1)
                        ->where('deleted',0)
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
                        ->where('status_active',1)
                        ->where('deleted',0))
                        ->addColumn('jumlah', function ($uploadDompul) {
                              return number_format($uploadDompul->qty,0,",",".");
                            })
                        ->addColumn('jumlah_program', function ($uploadDompul) {
                            return number_format($uploadDompul->qty_program,0,",",".");
                            })
                        ->addColumn('total_harga', function ($uploadDompul) {
                              return number_format(($uploadDompul->qty-$uploadDompul->qty_program)*$uploadDompul->harga_dompul,0,",",".");
                            })
                          ->addColumn('action', function ($uploadDompul) {
                              $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-tipe='.$tipe.' data-tipe_dompul='.$uploadDompul->tipe_dompul.' data-produk="'.$uploadDompul->produk.'" data-faktur="'.$uploadDompul->no_faktur.'" data-qty="'.$uploadDompul->qty_program.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                          ->make(true);
    }


}
