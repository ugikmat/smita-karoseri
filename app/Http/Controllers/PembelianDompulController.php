<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Sales;
use App\UploadDompul;
use App\HargaDompul;
use App\PenjualanDompul;
use App\DetailPenjualanDompul;
use App\StokDompul;
use App\Supplier;
use App\Lokasi;
use App\Dompul;
use App\PembelianDompul;
use App\DetailPembelianDompul;
use App\DetailPembayaranPembelianDompul;
use DB;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PembelianDompulController extends Controller
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
        $lokasis = Lokasi::where('status_lokasi','1')->get();
        $suppliers = Supplier::where('status_supplier','Aktif')->get();
        $hargaDompuls = HargaDompul::where('status_harga_dompul','Aktif')->get();
        $dompuls = UploadDompul::select('produk')->where('status_active',1)->distinct()->get();
        return view('pembelian.dompul.pembelian-dompul',['saless'=>$saless,'dompuls'=>$dompuls,'hargaDompuls'=>$hargaDompuls,'suppliers'=>$suppliers,'lokasis'=>$lokasis]);
    }
    public function getHarga($tipe,$kode){
        $hargaDompuls = HargaDompul::select('harga_dompul','id_harga_dompul')->where('status_harga_dompul','Aktif')->where('nama_harga_dompul',$kode)->where('tipe_harga_dompul',$tipe)->first();
        return response()->json(['success' => true, 'harga' => $hargaDompuls]);
    }
    public function verify(Request $request){
        Schema::dropIfExists('temp_pembelian_dompuls');
        Schema::create('temp_pembelian_dompuls', function (Blueprint $table) {
            $table->increments('id_pembelian_dompul');
            $table->integer('id_supplier');
            // $table->integer('id_ho');
            // $table->integer('id_bo');
            $table->integer('id_lokasi');
            $table->string('id_user');
            $table->date('tanggal_pembelian_dompul');
            $table->date('tanggal_input');
            $table->double('grand_total')->default(0);
            $table->tinyInteger('status_pembayaran')->default(0);
            $table->tinyInteger('status_pembelian')->default(0);
            $table->tinyInteger('deleted')->default(0);
        });
        $tgl = Carbon::parse($request->get('tgl_pembelian'));
        $tgl = $tgl->format('Y-m-d');

        $id = DB::table('temp_pembelian_dompuls')->insertGetId([
        'id_supplier'=>$request->get('supplier'),
        'id_lokasi'=>Auth::user()->id_lokasi,
        'tanggal_pembelian_dompul'=>$tgl,
        'tanggal_input'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'id_user'=>Auth::user()->id_user]);

        $tunai = $request->get('total');
        $bank = $request->get('bank');
        $total_pembayaran = $request->get('pembayaran');
        $selisih = $request->get('selisih');
        $dompuls = UploadDompul::select('produk')->where('status_active',1)->distinct()->get()->count();
        $pembelianDompul = DB::table('temp_pembelian_dompuls')->where('id_pembelian_dompul',$id)->first();

        Schema::dropIfExists('temp_detail_pembelian_dompuls');
        Schema::create('temp_detail_pembelian_dompuls', function (Blueprint $table) {
            $table->increments('id_detail_pembelian_dompul');
            $table->string('id_pembelian_dompul');
            $table->integer('id_supplier');
            $table->integer('id_harga_dompul');
            $table->string('produk');
            $table->integer('jumlah');
            $table->string('tipe_harga');
            $table->double('harga_satuan');
            $table->double('harga_total');
            $table->string('keterangan_detail_pd');
            $table->tinyInteger('status_detail_pd')->default(1);
        });

        for ($i=1; $i <=$dompuls ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                DB::table('temp_detail_pembelian_dompuls')->insert(['id_pembelian_dompul'=>$id,
                'id_supplier'=>$request->get('supplier'),
                'id_harga_dompul'=>$request->get('id_harga_dompul'),
                'produk'=>$request->get("nama{$i}"),
                'jumlah'=>$request->get("jumlah{$i}"),
                'tipe_harga'=>$request->get("tipe{$i}"),
                'harga_satuan'=>str_replace(',', '.',str_replace('.', '', $request->get("harga{$i}"))),
                'harga_total'=>str_replace(',', '.',str_replace('.', '', $request->get("total{$i}"))),
                'keterangan_detail_pd'=>'none']);
            }
        }
        $detailPenjualan = DB::table('temp_detail_pembelian_dompuls')->select(DB::raw('
        harga_satuan,
        produk,
        id_pembelian_dompul,
        tipe_harga,
        jumlah,
        harga_total'))->where('id_pembelian_dompul',$pembelianDompul->id_pembelian_dompul)->get();
        $data = DB::table('temp_detail_pembelian_dompuls')->get();
        $total = 0;
        foreach ($detailPenjualan as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,3,",",".");
        session(['total_harga_dompul' => $total]);
        // $sales = Sales::where('id_sales',$request->get('sales'))->first();
        $lokasi = Lokasi::where('id_lokasi',$request->get('lokasi'))->first();
        $supplier = Supplier::where('id_supplier',$pembelianDompul->id_supplier)->first();
        session(['id_lokasi'=>$request->get('lokasi'),'id_supplier'=>$pembelianDompul->id_supplier,'bank'=>$request->get('bank')]);
        return view('pembelian.dompul.pembelian-dompul-2',
        [
            'pembelianDompul'=>$pembelianDompul,
            'tgl'=>$tgl,
            'bank'=>$bank,
            'tunai'=>$total,
            'lokasi'=>$lokasi,
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
        $bank = $request->get('bank');
        $total = $request->get('total');

        $data = DB::table('temp_pembelian_dompuls')->where('id_pembelian_dompul',$id)->first();
        $dataDetail = DB::table('temp_detail_pembelian_dompuls')->where('id_pembelian_dompul',$id)->get();
        $PembelianDompul = new PembelianDompul();
        $PembelianDompul->id_supplier=$data->id_supplier;
        $PembelianDompul->grand_total=str_replace(',', '.',str_replace('.', '', $total));
        $PembelianDompul->tanggal_pembelian_dompul=$data->tanggal_pembelian_dompul;
        $PembelianDompul->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $PembelianDompul->id_user=Auth::user()->id_user;
        $PembelianDompul->id_lokasi=$request->get('id_lokasi');
        $PembelianDompul->save();

        foreach ($dataDetail as $key => $value) {
            $detailPembelianDompul = new DetailPembelianDompul();
                $detailPembelianDompul->id_pembelian_dompul = $PembelianDompul->id_pembelian_dompul;
                $detailPembelianDompul->id_supplier = $value->id_supplier;
                $detailPembelianDompul->produk= $value->produk;
                $detailPembelianDompul->jumlah= $value->jumlah;
                $detailPembelianDompul->tipe_harga= $value->tipe_harga;
                $detailPembelianDompul->harga_satuan= $value->harga_satuan;
                $detailPembelianDompul->harga_total= $value->harga_total;
                $detailPembelianDompul->keterangan_detail_pd= $value->keterangan_detail_pd;
                $detailPembelianDompul->save();
            $stokDompul = new StokDompul();
            $stokDompul->id_produk= $detailPembelianDompul->produk;
            // $stokDompul->id_sales= $request->get('id_sales');
            $stokDompul->id_lokasi= $PembelianDompul->id_lokasi;
            $stokDompul->tanggal_transaksi= $PembelianDompul->tanggal_pembelian_dompul;
            $stokDompul->nomor_referensi= $PembelianDompul->id_pembelian_dompul;
            $stokDompul->jenis_transaksi= 'PEMBELIAN';
            $stokDompul->keterangan= "{$detailPembelianDompul->tipe_harga}-";
            $stokDompul->masuk= $detailPembelianDompul->jumlah;
            $stokDompul->keluar= 0;
            $stokDompul->tanggal_input= $PembelianDompul->tanggal_input;
            $stokDompul->id_user= $PembelianDompul->id_user;
            $stokDompul->save();
        }

        if (!empty($bank)) {
            foreach ($bank as $key => $value) {
            $detailPembayaranDompul = new DetailPembayaranPembelianDompul();
            $detailPembayaranDompul->id_pembelian_dompul =$PembelianDompul->id_pembelian_dompul;
            $detailPembayaranDompul->metode_pembayaran = $value['bank'];
            
            $detailPembayaranDompul->nominal=str_replace(',', '.',str_replace('.', '', $value['trf']));
            $detailPembayaranDompul->catatan = $value['catatan'];
            switch ($value['bank']) {
                case 'BCA Pusat':
                    $detailPembayaranDompul->bca_pusat=$value['trf'];
                    break;
                case 'BCA Cabang':
                    $detailPembayaranDompul->bca_cabang=$value['trf'];
                    break;
                case 'Mandiri':
                    $detailPembayaranDompul->mandiri=$value['trf'];
                    break;
                case 'BNI':
                    $detailPembayaranDompul->bni=$value['trf'];
                    break;
                case 'BRI':
                    $detailPembayaranDompul->bri=$value['trf'];
                    break;
                case 'Cash':
                    $detailPembayaranDompul->cash=$value['trf'];
                    break;
                default:
                    break;
            }
            $detailPembayaranDompul->save();
        }
        $request->session()->forget('bank');
        }
        Schema::dropIfExists('temp_pembelian_dompuls');
        Schema::dropIfExists('temp_detail_pembelian_dompuls');

        return redirect('pembelian/dompul/pembelian-dompul');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$id)
    {
       $detailPenjualan = DB::table('temp_detail_pembelian_dompuls')->select(DB::raw('
        harga_satuan,
        produk,
        id_pembelian_dompul,
        tipe_harga,
        jumlah,
        harga_total'))->where('id_pembelian_dompul',$id)->get();
        $total = 0;
        foreach ($detailPenjualan as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return $datatables->of($detailPenjualan)
                        ->addColumn('indeks', function ($detailPenjualanDompul) {
                              return '';
                            })
                            ->addColumn('harga', function ($detailPenjualanDompul) {
                              return number_format($detailPenjualanDompul->harga_satuan,3,",",".");
                            })
                            ->addColumn('jumlah', function ($detailPenjualanDompul) {
                              return number_format($detailPenjualanDompul->jumlah,0,",",".");
                            })
                            ->addColumn('total_harga', function ($detailPenjualanDompul) {
                              return number_format(($detailPenjualanDompul->jumlah)*$detailPenjualanDompul->harga_satuan,3,",",".");
                            })
                            ->addColumn('action', function ($detailPenjualanDompul) {
                                $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$detailPenjualanDompul->produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPenjualanDompul->id_pembelian_dompul.'" data-tipe='.$tipe.'><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
