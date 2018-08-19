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
        Schema::dropIfExists('temp_penjualan_sps');
        Schema::create('temp_penjualan_sps', function (Blueprint $table) {
            $table->increments('id_temp_penjualan_sp');
            $table->integer('id_sales');
            $table->integer('id_customer');
            $table->string('no_hp_customer')->nullable();
            $table->string('no_user');
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
        'no_user'=>Auth::user()->id,
        'catatan'=>'none']);
        $bank = $request->get('bank-sp');
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
        session(['id_sales'=>$penjualanSp->id_sales,'id_cust'=>$penjualanSp->id_customer,'bank-sp'=>$request->get('bank-sp')]);
        // return view('/penjualan/sp/invoice-sp-2',['penjualanSp'=>$penjualanSp,'sales'=>$sales,'customer'=>$customer,'bank'=>$bank,'data'=>$detailPenjualan]);
        return redirect("/penjualan/sp/invoice-sp/edit/{$penjualanSp->id_temp_penjualan_sp}");
    }

    public function showEdit($id){
        $penjualanSp = DB::table('temp_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $sales = Sales::where('id_sales',$penjualanSp->id_sales)->first();
        $customer = Customer::where('id_cust',$penjualanSp->id_customer)->first();
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
        return view('/penjualan/sp/invoice-sp-2',['penjualanSp'=>$penjualanSp,'sales'=>$sales,'customer'=>$customer,'data'=>$detailPenjualan]);
    }

    public function update(Request $request, $id){
        $data = DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $tipe = $request->get('tipe');
        $qty_program = $request->get('qty_program');

        if($tipe != 'default') {
            DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)
            ->update(['tipe_harga'=>$tipe]);
        }
            $harga = HargaProduk::where('id_produk',$data->id_produk)->where('tipe_harga_sp',$data->tipe_harga)->first();
            DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)
            ->update(['harga_satuan'=>$harga->harga_sp,
            'harga_beli'=>$qty_program,
            'harga_total'=>($data->jumlah_sp-$qty_program)*$harga->harga_sp]);
        $total = 0;
        $data = DB::table('temp_detail_penjualan_sps')->get();
        foreach ($data as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return response()->json(['success' => true,'total'=>$total]);
    }

    public function verify(Request $request){
        Schema::dropIfExists('temp_penjualan_sps');
        Schema::create('temp_penjualan_sps', function (Blueprint $table) {
            $table->increments('id_temp_penjualan_sp');
            $table->integer('id_sales');
            $table->integer('id_customer');
            $table->string('no_hp_customer')->nullable();
            $table->string('no_user');
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
        'no_user'=>Auth::user()->id,
        'catatan'=>'none']);

        $tunai = $request->get('total');
        $bank = $request->get('bank-sp');

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
        session(['id_sales'=>$penjualanSp->id_sales,'id_cust'=>$penjualanSp->id_customer,'bank-sp'=>$request->get('bank-sp')]);

        // $tunai=number_format($tunai,0,",",".");
        return view('penjualan/sp/invoice-sp-3',
        [
            'penjualanSp'=>$penjualanSp,
            'tgl'=>$tgl,
            'bank'=>$bank,
            'tunai'=>$total,
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
        $bank = $request->get('bank-sp');
        $total = $request->get('total');

        $data = DB::table('temp_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $dataDetail = DB::table('temp_detail_penjualan_sps')->where('id_penjualan_sp',$id)->get();
        $penjualanSp = new PenjualanProduk();
        $penjualanSp->id_sales=$data->id_sales;
        $penjualanSp->id_customer=$data->id_customer;
        $penjualanSp->no_hp_customer=$data->no_hp_customer;
        $penjualanSp->grand_total=str_replace('.', '', $total);
        $penjualanSp->tanggal_penjualan_sp=$data->tanggal_penjualan_sp;
        $penjualanSp->tanggal_input=Carbon::now('Asia/Jakarta')->toDateString();
        $penjualanSp->no_user=Auth::user()->id;
        // $penjualanSp->id_lokasi=Auth::user()->id_lokasi;
        $penjualanSp->save();

        foreach ($dataDetail as $key => $value) {
            $detailPenjualanSp = new DetailPenjualanProduk();
                $detailPenjualanSp->id_penjualan_sp = $penjualanSp->id_penjualan_sp;
                $detailPenjualanSp->id_customer= $value->id_customer;
                $detailPenjualanSp->id_produk= $value->id_produk;
                $detailPenjualanSp->jumlah_sp= str_replace('.', '', $value->jumlah_sp);
                $detailPenjualanSp->tipe_harga= $value->tipe_harga;
                $detailPenjualanSp->harga_satuan= str_replace('.', '', $value->harga_satuan);
                $detailPenjualanSp->harga_total= str_replace('.', '', $value->harga_total);
                $detailPenjualanSp->harga_beli= str_replace('.', '', $value->harga_beli);
                $detailPenjualanSp->keterangan_detail_psp= $value->keterangan_detail_psp;
                $detailPenjualanSp->save();
        }

        if (!empty($bank)) {
            foreach ($bank as $key => $value) {
            $detailPembayaranSp = new DetailPembayaranSp();
            $detailPembayaranSp->id_penjualan_sp =$penjualanSp->id_penjualan_sp;
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
        Schema::dropIfExists('temp_penjualan_sps');
        Schema::dropIfExists('temp_detail_penjualan_sps');
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
        // $data = DB::table('temp_detail_penjualan_sps')->get();

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
                            ->addColumn('harga', function ($detailPenjualanSp) {
                              return number_format($detailPenjualanSp->harga_satuan,0,",",".");
                            })
                            ->addColumn('jumlah', function ($detailPenjualanSp) {
                              return number_format($detailPenjualanSp->jumlah_sp,0,",",".");
                            })
                            ->addColumn('jumlah_program', function ($detailPenjualanSp) {
                              return number_format($detailPenjualanSp->harga_beli,0,",",".");
                            })
                            ->addColumn('total_harga', function ($detailPenjualanSp) {
                              return number_format(($detailPenjualanSp->jumlah_sp-$detailPenjualanSp->harga_beli)*$detailPenjualanSp->harga_satuan,0,",",".");
                            })
                            ->addColumn('action', function ($detailPenjualanSp) {
                                $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPenjualanSp->id_produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPenjualanSp->id_temp_penjualan_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPenjualanSp->harga_beli.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
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
