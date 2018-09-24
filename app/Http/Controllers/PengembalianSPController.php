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
use App\PengembalianProduk;
use App\DetailPengembalianProduk;
use App\HargaProduk;
use App\PenjualanDompul;
use App\StokSp;
use App\Lokasi;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class PengembalianSPController extends Controller
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
        return view('ambil-sp/kembali/invoice-kembali',['saless'=>$saless,'produks'=>$produks,'hargaProduks'=>$hargaProduks,'jumlah'=>$jumlahProduk,'lokasis'=>$lokasis,'kios'=>$kios]);
    }
    public function verify(Request $request){
        Schema::dropIfExists('temp_pengembalian_sps');
        Schema::create('temp_pengembalian_sps', function (Blueprint $table) {
            $table->increments('id_pengembalian_sp');
            $table->integer('id_sales');
            // $table->integer('id_ho');
            // $table->integer('id_bo');
            $table->integer('id_lokasi');
            $table->string('id_user');
            $table->date('tanggal_pengembalian_sp');
            $table->date('tanggal_input');
            $table->tinyInteger('status_pengembalian')->default(0);
            $table->tinyInteger('deleted')->default(0);
        });

        $tgl = Carbon::parse($request->get('tgl_pengembalian'));
        $tgl = $tgl->format('Y-m-d');
        $id = DB::table('temp_pengembalian_sps')->insertGetId(['id_sales'=>$request->get('sales'),
        'id_lokasi'=>$request->get('lokasi'),
        'tanggal_pengembalian_sp'=>$tgl,
        'tanggal_input'=>Carbon::now('Asia/Jakarta')->toDateString(),
        'id_user'=>Auth::user()->id_user]);

        $produks = produk::where('status_produk','1')->get()->count();
        $pengembalianSp = DB::table('temp_pengembalian_sps')->where('id_pengembalian_sp',$id)->first();
        Schema::dropIfExists('temp_detail_pengembalian_sps');
         Schema::create('temp_detail_pengembalian_sps', function (Blueprint $table) {
            $table->increments('id_detail_pengembalian_sp');
            $table->string('id_pengembalian_sp');
            $table->string('id_produk');
            $table->integer('jumlah_sp');
            $table->string('tipe_harga');
            $table->string('keterangan_detail_psp');
            $table->tinyInteger('status_detail_psp')->default(1);
        });

        for ($i=0; $i <$produks ; $i++) {
            if (!empty($request->get("jumlah{$i}"))) {
                DB::table('temp_detail_pengembalian_sps')->insert(['id_pengembalian_sp'=>$id,
                'id_produk'=>$request->get("kode{$i}"),
                'jumlah_sp'=>$request->get("jumlah{$i}"),
                'tipe_harga'=>$request->get("tipe{$i}"),
                'keterangan_detail_psp'=>'none']);
            }
        }
        $detailPengambilan = DB::table('temp_detail_pengembalian_sps')->select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        temp_detail_pengembalian_sps.id_produk,
        temp_detail_pengembalian_sps.id_pengembalian_sp,
        temp_detail_pengembalian_sps.tipe_harga,
        temp_detail_pengembalian_sps.jumlah_sp'))
                        ->join('master_produks',function($join){
                            $join->on('temp_detail_pengembalian_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pengembalian_sp',$pengembalianSp->id_pengembalian_sp)->get();
        $data = DB::table('temp_detail_pengembalian_sps')->get();

        $sales = Sales::where('id_sales',$pengembalianSp->id_sales)->first();
        $lokasi = $request->get('lokasi');
        session(['id_sales'=>$pengembalianSp->id_sales]);

        // $tunai=number_format($tunai,0,",",".");
        return view('ambil-sp/kembali/invoice-kembali-2',
        [
            'pengembalianSp'=>$pengembalianSp,
            'tgl'=>$tgl,
            'sales'=>$sales,
            'lokasi'=>$lokasi
            ]);
    }
    /**
     * Save transaction
     */
    public function store(Request $request){
        $id = $request->get('id');
        $data = DB::table('temp_pengembalian_sps')->where('id_pengembalian_sp',$id)->first();
        $dataDetail = DB::table('temp_detail_pengembalian_sps')->where('id_pengembalian_sp',$id)->get();
        $pengembalianSp = new PengembalianProduk();
        $pengembalianSp->id_sales=$data->id_sales;
        $pengembalianSp->tanggal_pengembalian_sp=$data->tanggal_pengembalian_sp;
        $pengembalianSp->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $pengembalianSp->id_user=Auth::user()->id_user;
        $pengembalianSp->id_lokasi=$request->get('lokasi');
        $pengembalianSp->save();

        foreach ($dataDetail as $key => $value) {
            $detailPengambilanSp = new DetailPengembalianProduk();
                $detailPengambilanSp->id_pengembalian_sp = $pengembalianSp->id_pengembalian_sp;
                $detailPengambilanSp->id_produk= $value->id_produk;
                $detailPengambilanSp->jumlah_sp= str_replace('.', '', $value->jumlah_sp);
                $detailPengambilanSp->tipe_harga= $value->tipe_harga;
                $detailPengambilanSp->keterangan_detail_psp= $value->keterangan_detail_psp;
                $detailPengambilanSp->save();
            $stokSP = new StokSp();
            $stokSP->id_produk= $detailPengambilanSp->id_produk;
            $stokSP->id_sales= $pengembalianSp->id_sales;
            $stokSP->id_lokasi= $pengembalianSp->id_lokasi;
            $stokSP->tanggal_transaksi= $pengembalianSp->tanggal_pengembalian_sp;
            $stokSP->nomor_referensi= $pengembalianSp->id_pengembalian_sp;
            $stokSP->jenis_transaksi= 'PENGEMBALIAN';
            $stokSP->keterangan= "{$detailPengambilanSp->tipe_harga}-";
            $stokSP->masuk= $detailPengambilanSp->jumlah_sp;
            $stokSP->keluar= 0;
            $stokSP->tanggal_input= $pengembalianSp->tanggal_input;
            $stokSP->id_user= $pengembalianSp->id_user;
            $stokSP->save();
        }

        Schema::dropIfExists('temp_pengembalian_sps');
        Schema::dropIfExists('temp_detail_pengembalian_sps');
        $request->session()->flash('status','');
        return redirect('/operasional/smita/ambil-sp/ambil/invoice-kembali');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_pengembalian_sps')->get();

        $detailPenjualan = DB::table('temp_detail_pengembalian_sps')->select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        temp_detail_pengembalian_sps.id_produk,
        temp_detail_pengembalian_sps.id_pengembalian_sp,
        temp_detail_pengembalian_sps.tipe_harga,
        temp_detail_pengembalian_sps.jumlah_sp'))
                        ->join('master_produks',function($join){
                            $join->on('temp_detail_pengembalian_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pengembalian_sp',$id)->get();
        return $datatables->of($detailPenjualan)
                        ->addColumn('indeks', function ($detailPengambilanSp) {
                              return '';
                            })
                            ->addColumn('jumlah', function ($detailPengambilanSp) {
                              return number_format($detailPengambilanSp->jumlah_sp,0,",",".");
                            })
                            // ->addColumn('action', function ($detailPengambilanSp) {
                            //     $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPengambilanSp->id_produk)->get();
                            //     // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                            //   return
                            //   '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPengambilanSp->id_pengembalian_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPengambilanSp->harga_beli.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
