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
use App\UploadDompul;
use App\PenjualanProduk;
use App\DetailPenjualanProduk;
use App\HargaProduk;
use App\PenjualanDompul;
use App\StokSp;
use App\Lokasi;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PengambilanSPController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','kasir']);
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
        if (Auth::user()->level_user=='Canvaser') {
            $saless = Sales::where('nm_sales',Auth::user()->name)->where('status','1')->get();
        } else {
            $saless = Sales::where('status','1')->get();
        }
        $jumlahProduk = $produks->count();
        $kios = Customer::select(DB::raw("id_cust,CONCAT(nm_cust, '(', no_hp,')') as nm_customer"))->where('status',1)->get();
        $lokasis = Lokasi::select('master_lokasis.id_lokasi','master_lokasis.nm_lokasi')
                    ->join('users_lokasi','users_lokasi.id_lokasi','=','master_lokasis.id_lokasi')
                    ->join('users','users.id_user','=','users_lokasi.id_user')
                    ->where('users.id_user',Auth::user()->id_user)
                    ->where('status_lokasi','1')
                    ->get();
        return view('ambil-sp/ambil/invoice-ambil',['saless'=>$saless,'produks'=>$produks,'hargaProduks'=>$hargaProduks,'jumlah'=>$jumlahProduk,'lokasis'=>$lokasis,'kios'=>$kios]);
    }
    public function verify(Request $request){
        Schema::dropIfExists('temp_penjualan_sps');
        Schema::create('temp_penjualan_sps', function (Blueprint $table) {
            $table->increments('id_temp_penjualan_sp');
            $table->integer('id_sales');
            $table->integer('id_customer');
            $table->string('no_hp_customer')->nullable();
            $table->string('id_user');
            $table->date('tanggal_penjualan_sp');
            $table->date('tanggal_input');
            $table->string('cash')->default(0);
            $table->string('bca_pusat')->default(0);
            $table->string('bca_cabang')->default(0);
            $table->string('mandiri')->default(0);
            $table->string('bni')->default(0);
            $table->string('bri')->default(0);
            $table->bigInteger('grand_total')->default(0);
            $table->bigInteger('bayar_tunai')->default(0);
            $table->bigInteger('bayar_transfer')->default(0);
            $table->bigInteger('bayar_transfer2')->default(0);
            $table->bigInteger('bayar_transfer3')->default(0);
            $table->integer('id_rek1')->default(0);
            $table->integer('id_rek2')->default(0);
            $table->integer('id_rek3')->default(0);
            $table->text('catatan')->nullable();
            $table->tinyInteger('status_pembayaran')->default(0);
            $table->tinyInteger('status_penjualan')->default(0);
            $table->tinyInteger('deleted')->default(0);
        });
        $tgl = Carbon::parse($request->get('tgl_penjualan'));
        $tgl = $tgl->format('Y-m-d');
        $id = DB::table('temp_penjualan_sps')->insertGetId(['id_sales'=>$request->get('sales'),
        'id_customer'=>$request->get('customer'),
        'no_hp_customer'=>0,
        'grand_total'=>0,
        'tanggal_penjualan_sp'=>$tgl,
        'tanggal_input'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'id_user'=>Auth::user()->id_user,
        'catatan'=>'none']);

        $tunai = $request->get('total');
        $bank = $request->get('bank-sp');
        $total_pembayaran = $request->get('pembayaran');
        $selisih = $request->get('selisih');
        $produks = produk::where('status_produk','1')->get()->count();
        $penjualanSp = DB::table('temp_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        Schema::dropIfExists('temp_detail_penjualan_sps');
        Schema::create('temp_detail_penjualan_sps', function (Blueprint $table) {
            $table->increments('id_temp_penjualan_sp');
            $table->string('id_penjualan_sp');
            $table->integer('id_customer');
            $table->string('id_produk');
            $table->integer('jumlah_sp');
            $table->string('tipe_harga');
            $table->integer('harga_satuan');
            $table->integer('harga_beli')->nullable();
            $table->bigInteger('harga_total');
            $table->string('keterangan_detail_psp');
            $table->tinyInteger('status_detail_psp')->default(1);
            // $table->temporary();
        });

        for ($i=0; $i <$produks ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                DB::table('temp_detail_penjualan_sps')->insert(['id_penjualan_sp'=>$id,
                'id_customer'=>$request->get('customer'),
                'id_produk'=>$request->get("kode{$i}"),
                'jumlah_sp'=>$request->get("jumlah{$i}"),
                'tipe_harga'=>$request->get("tipe{$i}"),
                'harga_satuan'=>str_replace('.', '', $request->get("harga{$i}")),
                'harga_total'=>str_replace('.', '', $request->get("total{$i}")),
                'harga_beli'=>0,
                'keterangan_detail_psp'=>'none']);
            }
        }
        $detailPenjualan = DB::table('temp_detail_penjualan_sps')->select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        temp_detail_penjualan_sps.harga_satuan,
        temp_detail_penjualan_sps.harga_beli,
        temp_detail_penjualan_sps.id_produk,
        temp_detail_penjualan_sps.id_temp_penjualan_sp,
        temp_detail_penjualan_sps.tipe_harga,
        temp_detail_penjualan_sps.jumlah_sp,
        temp_detail_penjualan_sps.harga_total'))
                        ->join('master_produks',function($join){
                            $join->on('temp_detail_penjualan_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_penjualan_sp',$penjualanSp->id_temp_penjualan_sp)->get();
        $data = DB::table('temp_detail_penjualan_sps')->get();
        $total = 0;
        foreach ($detailPenjualan as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        $sales = Sales::where('id_sales',$penjualanSp->id_sales)->first();
        $customer = Customer::where('id_cust',$penjualanSp->id_customer)->first();
        $lokasi = $request->get('lokasi');
        session(['id_sales'=>$penjualanSp->id_sales,'id_cust'=>$penjualanSp->id_customer,'bank-sp'=>$request->get('bank-sp')]);

        // $tunai=number_format($tunai,0,",",".");
        return view('ambil-sp/ambil/invoice-ambil-2',
        [
            'penjualanSp'=>$penjualanSp,
            'tgl'=>$tgl,
            'bank'=>$bank,
            'tunai'=>$total,
            'sales'=>$sales,
            'customer'=>$customer,
            'total_pembayaran'=>$total_pembayaran,
            'selisih'=>$selisih,
            'lokasi'=>$lokasi
            ]);
    }
}
