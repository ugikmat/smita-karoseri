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
use App\Dompul;
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
        $suppliers = Supplier::where('status_supplier','Aktif')->get();
        $hargaDompuls = HargaDompul::where('status_harga_dompul','Aktif')->get();
        $dompuls = UploadDompul::select('produk')->where('status_active',1)->distinct()->get();
        return view('pembelian.dompul.pembelian-dompul',['saless'=>$saless,'dompuls'=>$dompuls,'hargaDompuls'=>$hargaDompuls,'suppliers'=>$suppliers]);
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
            $table->bigInteger('grand_total')->default(0);
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
            $table->integer('harga_satuan');
            $table->bigInteger('harga_total');
            $table->string('keterangan_detail_pd');
            $table->tinyInteger('status_detail_pd')->default(1);
        });

        for ($i=0; $i <$dompuls ; $i++) {
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
        $sales = Sales::where('id_sales',$request->get('sales'))->first();
        $supplier = Supplier::where('id_supplier',$pembelianDompul->id_supplier)->first();
        session(['id_sales'=>$request->get('sales'),'id_supplier'=>$pembelianDompul->id_supplier,'bank'=>$request->get('bank')]);
        return view('pembelian.dompul.pembelian-dompul-2',
        [
            'pembelianDompul'=>$pembelianDompul,
            'tgl'=>$tgl,
            'bank'=>$bank,
            'tunai'=>$total,
            'sales'=>$sales,
            'supplier'=>$supplier,
            'total_pembayaran'=>$total_pembayaran,
            'selisih'=>$selisih
            ]);
    }
}
