<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sales;
use App\Customer;
use App\DetailPenjualanProduk;
use App\DetailPembayaranSp;
use App\PenjualanProduk;
use App\HargaProduk;
use App\Lokasi;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPenjualanSPController extends Controller
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
     * Diplay a list of transaction made before
     */
    public function index(){
        $lokasis = Lokasi::select('master_lokasis.id_lokasi','master_lokasis.nm_lokasi')
                    ->join('users_lokasi','users_lokasi.id_lokasi','=','master_lokasis.id_lokasi')
                    ->join('users','users.id_user','=','users_lokasi.id_user')
                    ->where('users.id_user',Auth::user()->id_user)
                    ->where('status_lokasi','1')
                    ->get();
        if (Auth::user()->level_user=='Canvaser') {
            $saless = Sales::where('nm_sales',Auth::user()->name)->where('status','1')->get();
        } else {
            $saless = Sales::where('status','1')->get();
        }
        return view('penjualan.sp.list-invoice-sp',['lokasis'=>$lokasis,'saless'=>$saless]);
    }

    public function verif(Request $request,$id){
        PenjualanProduk::where('id_penjualan_sp',$id)
                        ->update(['status_penjualan'=>1
                        ]);
        $request->session()->flash('status', 'Berhasil melakukan verifikasi!');
        return redirect()->back();
    }

    public function edit($id_penjualan_sp, $sales, $tgl, $customer){
        $sales = Sales::where('nm_sales',$sales)->first();
        $customer = Customer::where('nm_cust',$customer)->first();
        $penjualanSP = PenjualanProduk::where('id_penjualan_sp',$id_penjualan_sp)->first();
        $pembayaran = DetailPembayaranSp::where('id_penjualan_sp',$id_penjualan_sp)->where('deleted',0)->get();
        $total_pembayaran=0;
        foreach ($pembayaran as $key => $value) {
            $total_pembayaran+=$value->nominal;
        }
        return view('penjualan.sp.list-invoice-sp-2',['sales'=>$sales,'customer'=>$customer,'penjualanSP'=>$penjualanSP,'pembayaran'=>$pembayaran,'total_pembayaran'=>$total_pembayaran]);
    }

    public function update(Request $request, $id,$id_detail){
        $data = DetailPenjualanProduk::where('id_detail_penjualan_sp',$id_detail)->first();

        // $data = DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $tipe = $request->get('tipe');
        $qty_program = $request->get('qty_program');

        if($tipe != 'default') {
            // DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)
            // ->update(['tipe_harga'=>$tipe]);
            $data->tipe_harga=$tipe;
        }
            $harga = HargaProduk::where('id_produk',$data->id_produk)->where('tipe_harga_sp',$data->tipe_harga)->first();
            // DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)
            // ->update(['harga_satuan'=>$harga->harga_sp,
            // 'harga_beli'=>$qty_program,
            // 'harga_total'=>($data->jumlah_sp-$qty_program)*$harga->harga_sp]);
            $data->harga_satuan=$harga->harga_sp;
            $data->harga_beli=$qty_program;
            $data->harga_total=($data->jumlah_sp-$qty_program)*$harga->harga_sp;
            $data->save();
        $total = 0;
        $datas = DetailPenjualanProduk::where('id_penjualan_sp',$id)->get();
        foreach ($datas as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return response()->json(['success' => true,'total'=>$total]);
    }

    public function delete(Request $request){
        PenjualanProduk::where('id_penjualan_sp',$request->get('id'))->update(['deleted'=>1]);
        $request->session()->flash('status', 'Berhasil menghapus List Invoice!');
        return redirect('/penjualan/sp/list-invoice-sp');
    }

    /**
     * Save transaction
     */
    public function store(Request $request){
        $id = $request->get('id');
        $bank = $request->get('bank');
        $total = $request->get('total');
        $delete = $request->get('delete');
        $penjualanSp = PenjualanProduk::where('id_penjualan_sp',$id)->first();
        // $data = DB::table('temp_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $dataDetail = DetailPenjualanProduk::where('id_penjualan_sp',$id)->get();
        // $dataDetail = DB::table('temp_detail_penjualan_sps')->where('id_penjualan_sp',$id)->get();
        // $penjualanSp = new PenjualanProduk();
        $penjualanSp->grand_total=str_replace('.', '', $total);
        $penjualanSp->save();
        if (!empty($delete)) {
            foreach ($delete as $key => $value) {
                $detailPembayaranSp = DetailPembayaranSp::where('id_detail_pembayaran_sp',$value)->first();
                $detailPembayaranSp->deleted = 1;
                $detailPembayaranSp->save();
            }
        }
        if(!empty($bank)){
          foreach ($bank as $key => $value) {
              if (empty($value['id'])) {
                  $detailPembayaranSp = new DetailPembayaranSp();
                  $detailPembayaranSp->id_penjualan_sp = $penjualanSp->id_penjualan_sp;
              } else {
                  $detailPembayaranSp = DetailPembayaranSp::where('id_detail_pembayaran_sp',$value['id'])->first();
              }
              $detailPembayaranSp->metode_pembayaran = $value['bank'];
              $detailPembayaranSp->nominal=str_replace('.','',$value['trf']);
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
        }
        // session(['tgl_penjualan_sp'=>$penjualanSp->id_sales,'id_cust'=>$penjualanSp->id_customer]);
        $request->session()->flash('status', 'Berhasil melakukan edit!');
        return redirect('/penjualan/sp/list-invoice-sp');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_awal,$tgl_akhir,$lokasi,$sales)
    {
        if ($tgl_awal=='null') {
            $tgl = $tgl_awal;
        }else {
            session(['sp-list-tgl-awal'=>$tgl_awal,'sp-list-tgl-akhir'=>$tgl_akhir,'lokasi_penjualan'=>$lokasi,'sp-list-sales'=>$sales]);
            $tgl_awal = Carbon::parse($tgl_awal);
            $tgl_awal = $tgl_awal->format('Y-m-d');
            $tgl_akhir = Carbon::parse($tgl_akhir);
            $tgl_akhir = $tgl_akhir->format('Y-m-d');

        }
        $datas = PenjualanProduk::select('id_penjualan_sp',
        'nm_sales',
        'master_customers.no_hp',
        'nm_cust',
        'tanggal_penjualan_sp',
        'status_penjualan')
                        ->join('master_saless','master_saless.id_sales','=','penjualan_sps.id_sales')
                        ->join('master_customers','master_customers.id_cust','=','penjualan_sps.id_customer')
                        // ->join('detail_penjualan_dompuls','detail_penjualan_dompuls.id_penjualan_dompul','=','penjualan_dompuls.id_penjualan_dompul')
                        ->whereBetween('tanggal_penjualan_sp',[$tgl_awal,$tgl_akhir])
                        ->where('deleted',0);
        if($lokasi!='all'){
            session(['lokasi_penjualan'=>$lokasi]);
            $datas = $datas->where('penjualan_sps.id_lokasi',$lokasi);
        }
        if($sales!='all'){
            session(['id_sales'=>$sales]);
            $datas = $datas->where('penjualan_sps.id_sales',$sales);
        }
        return $datatables->of($datas)
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('tanggal_penjualan', function ($penjualanSP) {

                            $tgl = Carbon::parse($penjualanSP->tanggal_penjualan_sp);
                            $tgl = $tgl->format('d/m/Y');
                            return $tgl;

                            })
                        ->addColumn('status_verif', function ($penjualanSP) {
                              if ($penjualanSP->status_penjualan==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($penjualanSP) {
                              if ($penjualanSP->status_penjualan==0) {
                                  if(Auth::user()->level_user=='Supervisor'||Auth::user()->level_user=='Super Admin'){
                                    return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                                  }else {
                                    return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$penjualanSP->id_penjualan_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                                  }
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/sp/list-invoice-sp/edit/'.$penjualanSP->id_penjualan_sp.'/'.$penjualanSP->nm_sales.'/'.$penjualanSP->tanggal_penjualan_sp.'/'.$penjualanSP->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>';
                              }

                            })
                          ->make(true);
    }
    public function penjualanData(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_penjualan_sps')->get();

        $detailPenjualan = DetailPenjualanProduk::select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        detail_penjualan_sps.harga_satuan,
        detail_penjualan_sps.harga_beli,
        detail_penjualan_sps.id_produk,
        detail_penjualan_sps.id_penjualan_sp,
        detail_penjualan_sps.id_detail_penjualan_sp,
        detail_penjualan_sps.tipe_harga,
        detail_penjualan_sps.jumlah_sp,
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
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPenjualanSp->id_penjualan_sp.'" data-id_detail="'.$detailPenjualanSp->id_detail_penjualan_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPenjualanSp->harga_beli.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
