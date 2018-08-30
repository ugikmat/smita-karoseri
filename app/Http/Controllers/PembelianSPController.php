<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Sales;
use App\Customer;
use App\produk;
use App\DetailPembayaranSp;
use App\DetailPembelianProduk;
use App\DetailPembayaranPembelianProduk;
use App\UploadDompul;
use App\PenjualanProduk;
use App\PembelianProduk;
use App\DetailPenjualanProduk;
use App\Lokasi;
use App\HargaProduk;
use App\PenjualanDompul;
use App\StokSp;
use App\Supplier;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PembelianSPController extends Controller
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
        $hargaProduks = HargaProduk::where('status_harga_sp','Aktif')->get();
        $produks = produk::where('status_produk','1')->get();
        $suppliers = Supplier::all();
        $saless = Sales::where('status','1')->get();
        $lokasis = Lokasi::where('status_lokasi','1')->get();
        $jumlahProduk = $produks->count();
        return view('pembelian.sp.pembelian-sp',['lokasis'=>$lokasis,'saless'=>$saless,'produks'=>$produks,'hargaProduks'=>$hargaProduks,'jumlah'=>$jumlahProduk,'suppliers'=>$suppliers]);
    }

    public function verify(Request $request){
        Schema::dropIfExists('temp_pembelian_sps');
        Schema::create('temp_pembelian_sps', function (Blueprint $table) {
            $table->increments('id_temp_pembelian_sp');
            $table->integer('id_supplier');
            $table->integer('id_lokasi');
            $table->string('id_user');
            $table->date('tanggal_pembelian_sp');
            $table->date('tanggal_input');
            $table->bigInteger('grand_total')->default(0);
            $table->tinyInteger('status_pembayaran')->default(0);
            $table->tinyInteger('status_pembelian')->default(0);
            $table->tinyInteger('deleted')->default(0);
        });
        $tgl = Carbon::parse($request->get('tgl_pembelian'));
        $tgl = $tgl->format('Y-m-d');

        $id = DB::table('temp_pembelian_sps')->insertGetId([
        'id_supplier'=>$request->get('supplier'),
        'id_lokasi'=>Auth::user()->id_lokasi,
        'tanggal_pembelian_sp'=>$tgl,
        'tanggal_input'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'id_user'=>Auth::user()->id_user]);

        $tunai = $request->get('total');
        $bank = $request->get('bank-sp');
        $total_pembayaran = $request->get('pembayaran');
        $selisih = $request->get('selisih');
        $produks = produk::where('status_produk','1')->get()->count();
        $pembelianSp = DB::table('temp_pembelian_sps')->where('id_temp_pembelian_sp',$id)->first();

        Schema::dropIfExists('temp_detail_pembelian_sps');
        Schema::create('temp_detail_pembelian_sps', function (Blueprint $table) {
            $table->increments('id_temp_detail_pembelian_sp');
            $table->string('id_pembelian_sp');
            $table->integer('id_supplier');
            $table->string('id_produk');
            $table->integer('jumlah_sp');
            $table->string('tipe_harga');
            $table->integer('harga_satuan');
            $table->bigInteger('harga_total');
            $table->string('keterangan_detail_psp');
            $table->tinyInteger('status_detail_psp')->default(1);
        });

        for ($i=0; $i <$produks ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                DB::table('temp_detail_pembelian_sps')->insert(['id_pembelian_sp'=>$id,
                'id_supplier'=>$request->get('supplier'),
                'id_produk'=>$request->get("kode{$i}"),
                'jumlah_sp'=>$request->get("jumlah{$i}"),
                'tipe_harga'=>$request->get("tipe{$i}"),
                'harga_satuan'=>str_replace('.', '', $request->get("harga{$i}")),
                'harga_total'=>str_replace('.', '', $request->get("total{$i}")),
                'keterangan_detail_psp'=>'none']);
            }
        }
        $detailPenjualan = DB::table('temp_detail_pembelian_sps')->select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        temp_detail_pembelian_sps.harga_satuan,
        temp_detail_pembelian_sps.id_produk,
        temp_detail_pembelian_sps.id_pembelian_sp,
        temp_detail_pembelian_sps.tipe_harga,
        temp_detail_pembelian_sps.jumlah_sp,
        temp_detail_pembelian_sps.harga_total'))
                        ->join('master_produks',function($join){
                            $join->on('temp_detail_pembelian_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pembelian_sp',$pembelianSp->id_temp_pembelian_sp)->get();
        $data = DB::table('temp_detail_pembelian_sps')->get();
        $total = 0;
        foreach ($detailPenjualan as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        $sales = Sales::where('id_sales',$request->get('sales'))->first();
        $lokasi = Lokasi::where('id_lokasi',$request->get('lokasi'))->first();
        $supplier = Supplier::where('id_supplier',$pembelianSp->id_supplier)->first();
        session(['id_lokasi'=>$request->get('lokasi'),'id_supplier'=>$pembelianSp->id_supplier,'bank-sp'=>$request->get('bank-sp')]);

        // $tunai=number_format($tunai,0,",",".");
        return view('pembelian.sp.pembelian-sp-2',
        [
            'pembelianSp'=>$pembelianSp,
            'tgl'=>$tgl,
            'bank'=>$bank,
            'tunai'=>$total,
            'lokasi'=>$lokasi,
            'sales'=>$sales,
            'supplier'=>$supplier,
            'total_pembayaran'=>$total_pembayaran,
            'selisih'=>$selisih
            ]);
    }


    public function store(Request $request){
        $tgl = Carbon::parse($request->get('tgl_pembelian'));
        $tgl = $tgl->format('Y-m-d');

        $id = $request->get('id');
        $tunai = $request->get('tunai');
        $bank = $request->get('bank-sp');
        $total = $request->get('total');

        $data = DB::table('temp_pembelian_sps')->where('id_temp_pembelian_sp',$id)->first();
        $dataDetail = DB::table('temp_detail_pembelian_sps')->where('id_pembelian_sp',$id)->get();
        $pembelianSp = new PembelianProduk();
        $pembelianSp->id_supplier=$data->id_supplier;
        $pembelianSp->grand_total=str_replace('.', '', $total);
        $pembelianSp->tanggal_pembelian_sp=$data->tanggal_pembelian_sp;
        $pembelianSp->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $pembelianSp->id_user=Auth::user()->id_user;
        $pembelianSp->id_lokasi=$request->get('id_lokasi');
        $pembelianSp->save();

        foreach ($dataDetail as $key => $value) {
            $detailPenjualanSp = new DetailPembelianProduk();
                $detailPenjualanSp->id_pembelian_sp = $pembelianSp->id_pembelian_sp;
                $detailPenjualanSp->id_supplier = $value->id_supplier;
                $detailPenjualanSp->id_produk= $value->id_produk;
                $detailPenjualanSp->jumlah_sp= str_replace('.', '', $value->jumlah_sp);
                $detailPenjualanSp->tipe_harga= $value->tipe_harga;
                $detailPenjualanSp->harga_satuan= str_replace('.', '', $value->harga_satuan);
                $detailPenjualanSp->harga_total= str_replace('.', '', $value->harga_total);
                $detailPenjualanSp->keterangan_detail_psp= $value->keterangan_detail_psp;
                $detailPenjualanSp->save();
            $stokSP = new StokSp();
            $stokSP->id_produk= $detailPenjualanSp->id_produk;
            // $stokSP->id_sales= $request->get('id_sales');
            $stokSP->id_lokasi= $pembelianSp->id_lokasi;
            $stokSP->tanggal_transaksi= $pembelianSp->tanggal_pembelian_sp;
            $stokSP->nomor_referensi= $pembelianSp->id_pembelian_sp;
            $stokSP->jenis_transaksi= 'PEMBELIAN';
            $stokSP->keterangan= "{$detailPenjualanSp->tipe_harga}-";
            $stokSP->masuk= $detailPenjualanSp->jumlah_sp;
            $stokSP->keluar= 0;
            $stokSP->tanggal_input= $pembelianSp->tanggal_input;
            $stokSP->id_user= $pembelianSp->id_user;
            $stokSP->save();
        }

        if (!empty($bank)) {
            foreach ($bank as $key => $value) {
            $detailPembayaranSp = new DetailPembayaranPembelianProduk();
            $detailPembayaranSp->id_pembelian_sp =$pembelianSp->id_pembelian_sp;
            $detailPembayaranSp->metode_pembayaran = $value['bank'];

            $detailPembayaranSp->nominal= str_replace('.', '', $value['trf']);
            $detailPembayaranSp->catatan = $value['catatan'];
            switch ($value['bank']) {
                case 'BCA Pusat':
                    $detailPembayaranSp->bca_pusat=$value['trf'];
                    break;
                case 'BCA Cabang':
                    $detailPembayaranSp->bca_cabang=$value['trf'];
                    break;
                case 'Mandiri':
                    $detailPembayaranSp->mandiri=$value['trf'];
                    break;
                case 'BNI':
                    $detailPembayaranSp->bni=$value['trf'];
                    break;
                case 'BRI':
                    $detailPembayaranSp->bri=$value['trf'];
                    break;
                case 'Cash':
                    $detailPembayaranSp->cash=$value['trf'];
                    break;
                default:
                    break;
            }
            $detailPembayaranSp->save();
        }
        $request->session()->forget('bank-sp');
        }
        Schema::dropIfExists('temp_pembelian_sps');
        Schema::dropIfExists('temp_detail_pembelian_sps');

        return redirect('pembelian/sp/pembelian-sp');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_pembelian_sps')->get();
        $detailPenjualan = DB::table('temp_detail_pembelian_sps')->select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        temp_detail_pembelian_sps.harga_satuan,
        temp_detail_pembelian_sps.id_produk,
        temp_detail_pembelian_sps.id_pembelian_sp,
        temp_detail_pembelian_sps.tipe_harga,
        temp_detail_pembelian_sps.jumlah_sp,
        temp_detail_pembelian_sps.harga_total'))
                        ->join('master_produks',function($join){
                            $join->on('temp_detail_pembelian_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pembelian_sp',$id)->get();
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
                            ->addColumn('harga', function ($detailPenjualanSp) {
                              return number_format($detailPenjualanSp->harga_satuan,0,",",".");
                            })
                            ->addColumn('jumlah', function ($detailPenjualanSp) {
                              return number_format($detailPenjualanSp->jumlah_sp,0,",",".");
                            })
                            ->addColumn('total_harga', function ($detailPenjualanSp) {
                              return number_format(($detailPenjualanSp->jumlah_sp)*$detailPenjualanSp->harga_satuan,0,",",".");
                            })
                            ->addColumn('action', function ($detailPenjualanSp) {
                                $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPenjualanSp->id_produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPenjualanSp->id_pembelian_sp.'" data-tipe='.$tipe.'><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
