<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\Customer;
use App\produk;
use App\UploadDompul;
use App\PenjualanProduk;
use App\DetailPenjualanProduk;
use App\HargaProduk;
use App\PenjualanDompul;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class PenjualanSPController extends Controller
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
        session(['now'=>Carbon::now('Asia/Jakarta')->format('d-m-Y')]);
        $hargaProduks = HargaProduk::where('status_harga_sp','Aktif')->get();
        $arrHarga = $hargaProduks->mode('harga_sp');
        $produks = produk::where('status_produk','1')->get();
        $saless = Sales::where('status','1')->get();
        $jumlahProduk = $produks->count();
        return view('penjualan.sp.invoice-sp',['saless'=>$saless,'produks'=>$produks,'hargaProduks'=>$hargaProduks,'jumlah'=>$jumlahProduk,'arrHarga'=>$arrHarga]);
    }
    public function set_session(Request $request){
        session(['tipe_harga'=>$request->input('tipe_harga'),'kode_produk'=>$request->input('kode_produk')]);
    }

    public function getHarga($tipe,$kode){
        $hargaProduks = HargaProduk::select('harga_sp')->where('status_harga_sp','Aktif')->where('id_produk',$kode)->where('tipe_harga_sp',$tipe)->first();
        return response()->json(['success' => true, 'harga' => $hargaProduks]);
    }

    public function edit(Request $request){
        $penjualanSp = new PenjualanProduk();
        $penjualanSp->id_sales=$request->get('sales');
        $penjualanSp->id_customer=$request->get('customer');
        $penjualanSp->no_hp_customer='0';
        $penjualanSp->grand_total='0';
        $penjualanSp->catatan='none';
        $tgl = Carbon::parse($request->get('tgl_penjualan'));
        $tgl = $tgl->format('Y-m-d');
        $penjualanSp->tanggal_penjualan_sp=$tgl;
        $penjualanSp->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $penjualanSp->no_user=Auth::user()->id;
        $penjualanSp->save();
        $produks = produk::where('status_produk','1')->get()->count();
        for ($i=0; $i <$produks ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                $detailPenjualanSp = new DetailPenjualanProduk();
                $detailPenjualanSp->id_penjualan_sp = $penjualanSp->id_penjualan_sp;
                $detailPenjualanSp->id_customer=$request->get('customer');
                $detailPenjualanSp->id_produk=$request->get("kode{$i}");
                $detailPenjualanSp->jumlah_sp=$request->get("jumlah{$i}");
                $detailPenjualanSp->tipe_harga=$request->get("tipe{$i}");
                $detailPenjualanSp->harga_satuan=str_replace('.', '', $request->get("harga{$i}"));
                $detailPenjualanSp->harga_total=str_replace('.', '', $request->get("total{$i}"));
                $detailPenjualanSp->harga_beli=0;
                $detailPenjualanSp->keterangan_detail_psp='none';
                $detailPenjualanSp->save();
            }
        }
        $sales = Sales::where('id_sales',$penjualanSp->id_sales)->first();
        $customer = Customer::where('id_cust',$penjualanSp->id_customer)->first();
        return view('/penjualan/sp/invoice-sp-2',['penjualanSp'=>$penjualanSp,'sales'=>$sales,'customer'=>$customer]);
    }

    public function update(Request $request, $id){
        $data = DetailPenjualanProduk::where('id_detail_penjualan_sp',$id)->first();

        $tipe = $request->get('tipe');
        $qty_program = $request->get('qty_program');
        
        if($tipe != 'default') {
            $data->tipe_harga = $tipe;
        }
        $harga = HargaProduk::where('id_produk',$data->id_produk)->where('tipe_harga_sp',$data->tipe_harga)->first();
        $data->harga_satuan=$data->jumlah_sp*$harga->harga_sp;
        $data->harga_beli = $qty_program;
        $data->save();
        return redirect()->back();
    }

    public function verify(Request $request){
        $tunai = $request->get('tunai');
        $bank1 = $request->get('bank1');
        $id = $request->get('id');
        $tgl = $request->get('tgl');
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
        $catatan = $request->get('catatan'); 
        $penjualanSp =PenjualanProduk::where('id_penjualan_sp',$id)->first();
        $sales = Sales::where('id_sales',$penjualanSp->id_sales)->first();
        $customer = Customer::where('id_cust',$penjualanSp->id_customer)->first();
        $tunai=number_format($tunai,0,",",".");
        return view('penjualan/sp/invoice-sp-3',
        [
            'penjualanSp'=>$penjualanSp,
            'tgl'=>$tgl,
            'tunai'=>$tunai,
            'trf1'=>$trf1,
            'trf2'=>$trf2,
            'trf3'=>$trf3,
            'bank1'=>$bank1,
            'bank2'=>$bank2,
            'bank3'=>$bank3,
            'catatan'=>$catatan,
            'sales'=>$sales,
            'customer'=>$customer,
            ]);
    }

    /**
     * Save transaction
     */
    public function store(Request $request){
        $id = $request->get('id');
        $tunai = $request->get('tunai');
        $trf1 = $request->get('trf1');
        $bank1 = $request->get('bank1');
        $trf2 = $request->get('trf2');
        $bank2 = $request->get('bank2');
        $trf3 = $request->get('trf3');
        $bank3 = $request->get('bank3');        
        $catatan = $request->get('catatan');
        $total = $request->get('total');
        $sales = Sales::where('id_sales',$id_sales)->first();
        
        $penjualanSp = new PenjualanProduk();
        $penjualanSp->id_sales=$request->get('sales');
        $penjualanSp->id_customer=$request->get('customer');
        $penjualanSp->no_hp_customer='0';
        $penjualanSp->grand_total=$total;
        $penjualanSp->catatan=$catatan;
        $penjualanSp->grand_total=str_replace('.', '', $total);
        $penjualanSp->bayar_tunai=str_replace('.', '', $tunai);
        $tgl = Carbon::parse($request->get('tgl_penjualan'));
        $tgl = $tgl->format('Y-m-d');
        $penjualanSp->tanggal_penjualan_sp=$tgl;
        $penjualanSp->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $penjualanSp->no_user=Auth::user()->id;
        $penjualanSp->save();
        $produks = produk::where('status_produk','1')->get()->count();
        for ($i=0; $i <$produks ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                $detailPenjualanSp = new DetailPenjualanProduk();
                $detailPenjualanSp->id_penjualan_sp = $penjualanSp->id_penjualan_sp;
                $detailPenjualanSp->id_customer=$request->get('customer');
                $detailPenjualanSp->id_produk=$request->get("kode{$i}");
                $detailPenjualanSp->jumlah_sp=$request->get("jumlah{$i}");
                $detailPenjualanSp->tipe_harga=$request->get("tipe{$i}");
                $detailPenjualanSp->harga_satuan=str_replace('.', '', $request->get("harga{$i}"));
                $detailPenjualanSp->harga_total=str_replace('.', '', $request->get("total{$i}"));
                $detailPenjualanSp->harga_beli=0;
                $detailPenjualanSp->keterangan_detail_psp='none';
                $detailPenjualanSp->save();
            }
        }
        $penjualanSp = PenjualanProduk::where('id_penjualan_sp',$id)->first();
            switch ($bank1) {
                case 'BCA Pusat':
                    $penjualanSp->bca_pusat=$trf1;
                    break;
                case 'BCA Cabang':
                    $penjualanSp->bca_cabang=$trf1;
                    break;
                case 'Mandiri':
                    $penjualanSp->mandiri=$trf1;
                    break;
                case 'BNI':
                    $penjualanSp->bni=$trf1;
                    break;
                case 'BRI':
                    $penjualanSp->bri=$trf1;
                    break;
                default:
                    break;
            }
            switch ($bank2) {
                 case 'BCA Pusat':
                    $penjualanSp->bca_pusat=$trf2;
                    break;
                case 'BCA Cabang':
                    $penjualanSp->bca_cabang=$trf2;
                    break;
                case 'Mandiri':
                    $penjualanSp->mandiri=$trf2;
                    break;
                case 'BNI':
                    $penjualanSp->bni=$trf2;
                    break;
                case 'BRI':
                    $penjualanSp->bri=$trf2;
                    break;
                default:
                    break;
            }
            switch ($bank3) {
                 case 'BCA Pusat':
                    $penjualanSp->bca_pusat=$trf3;
                    break;
                case 'BCA Cabang':
                    $penjualanSp->bca_cabang=$trf3;
                    break;
                case 'Mandiri':
                    $penjualanSp->mandiri=$trf3;
                    break;
                case 'BNI':
                    $penjualanSp->bni=$trf3;
                    break;
                case 'BRI':
                    $penjualanSp->bri=$trf3;
                    break;
                default:
                    break;
            }
        $penjualanSp->save();
        return redirect('/penjualan/sp/invoice-sp');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$id)
    {
/**
 * SELECT master_produks.nama_produk(uraian), master_produks.satuan, detail_penjualan_sps.harga_satuan, 
*       detail_penjualan_sps.tipe_harga, detail_penjualan_sps.jumlah_sp(kuantitas), 
*       detail_penjualan_sps.harga_total
*FROM master_produks JOIN detail_penjualan_sps
*ON master_produks.kode_produk = detail_penjualan_sps.id_produk
 */     $detailPenjualan = DetailPenjualanProduk::select(DB::raw('master_produks.nama_produk, 
        master_produks.satuan, detail_penjualan_sps.harga_satuan,detail_penjualan_sps.harga_beli,detail_penjualan_sps.id_produk,detail_penjualan_sps.id_detail_penjualan_sp,
        detail_penjualan_sps.tipe_harga, detail_penjualan_sps.jumlah_sp,
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
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPenjualanSp->id_detail_penjualan_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPenjualanSp->harga_beli.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
    public function detailData(Datatables $datatables,$tgl)
    {

        return $datatables->eloquent(PenjualanProduk::select(DB::raw('penjualan_sps.id_penjualan_sp, master_saless.nm_sales, master_customers.no_hp_customer, master_customers.nm_cust, penjualan_sps.tanggal_penjualan_sp, penjualan_sps.status_penjualan'))
                        ->join('master_saless',function($join){
                            $join->on('penjualan_sps.id_sales','=','master_saless.id_sales');
                        })
                        ->join('master_customers',function($join){
                            $join->on('penjualan_sps.id_customer','=','master_customers.id_cust');
                        })
                        ->where('tanggal_penjualan_sp',$tgl))
                        ->addColumn('indeks', function ($uploadDompul) {
                              return '';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
