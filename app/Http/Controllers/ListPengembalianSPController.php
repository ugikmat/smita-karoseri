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
use App\PengembalianDompul;
use App\StokSp;
use App\Lokasi;
use Illuminate\Support\Facades\Auth;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class ListPengembalianSPController extends Controller
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
        return view('ambil-sp/kembali/list-invoice-kembali',['lokasis'=>$lokasis,'saless'=>$saless]);
    }

    public function verif(Request $request,$id){
        PengembalianProduk::where('id_pengembalian_sp',$id)
                        ->update(['status_pengembalian'=>1
                        ]);
        $request->session()->flash('status', 'Berhasil melakukan verifikasi!');
        return redirect()->back();
    }

    public function edit($id_pengembalian_sp, $sales, $tgl){
        $sales = Sales::where('nm_sales',$sales)->first();
        $pengembalianSP = PengembalianProduk::where('id_pengembalian_sp',$id_pengembalian_sp)->first();
        return view('ambil-sp/ambil/list-invoice-ambil-2',['sales'=>$sales,'pengembalianSP'=>$pengembalianSP]);
    }

   public function update(Request $request, $id,$id_detail){
        $data = DetailPengembalianProduk::where('id_detail_pengembalian_sp',$id_detail)->first();

        // $data = DB::table('temp_detail_pengembalian_sps')->where('id_temp_pengembalian_sp',$id)->first();
        $tipe = $request->get('tipe');
        $jumlah_sp = $request->get('jumlah');

        if($tipe != 'default') {
            // DB::table('temp_detail_pengembalian_sps')->where('id_temp_pengembalian_sp',$id)
            // ->update(['tipe_harga'=>$tipe]);
            $data->tipe_harga=$tipe;
        }
            $harga = HargaProduk::where('id_produk',$data->id_produk)->where('tipe_harga_sp',$data->tipe_harga)->first();
            $data->jumlah_sp=$jumlah_sp;
            $data->save();
        return response()->json(['success' => true]);
    }

    public function delete(Request $request){
        PengembalianProduk::where('id_pengembalian_sp',$request->get('id'))->update(['deleted'=>1]);
        $request->session()->flash('status', 'Berhasil menghapus List Invoice!');
        return redirect('/ambil-sp/ambil/list-invoice-kembali');
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
            session(['sp-list-tgl-awal'=>$tgl_awal,'sp-list-tgl-akhir'=>$tgl_akhir,'lokasi_pengembalian'=>$lokasi,'sp-list-sales'=>$sales]);
            $tgl_awal = Carbon::parse($tgl_awal);
            $tgl_awal = $tgl_awal->format('Y-m-d');
            $tgl_akhir = Carbon::parse($tgl_akhir);
            $tgl_akhir = $tgl_akhir->format('Y-m-d');

        }
        $datas = PengembalianProduk::select('id_pengembalian_sp',
        'nm_sales',
        'tanggal_pengembalian_sp',
        'status_pengembalian')
                        ->join('master_saless','master_saless.id_sales','=','pengembalian_sps.id_sales')
                        // ->join('detail_pengembalian_dompuls','detail_pengembalian_dompuls.id_pengembalian_dompul','=','pengembalian_dompuls.id_pengembalian_dompul')
                        ->whereBetween('tanggal_pengembalian_sp',[$tgl_awal,$tgl_akhir])
                        ->where('deleted',0);
        if($lokasi!='all'){
            session(['lokasi_pengembalian'=>$lokasi]);
            $datas = $datas->where('pengembalian_sps.id_lokasi',$lokasi);
        }
        if($sales!='all'){
            session(['id_sales'=>$sales]);
            $datas = $datas->where('pengembalian_sps.id_sales',$sales);
        }
        return $datatables->of($datas)
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('tanggal_pengembalian', function ($pengembalianSP) {

                            $tgl = Carbon::parse($pengembalianSP->tanggal_pengembalian_sp);
                            $tgl = $tgl->format('d/m/Y');
                            return $tgl;

                            })
                        ->addColumn('status_verif', function ($pengembalianSP) {
                              if ($pengembalianSP->status_pengembalian==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($pengembalianSP) {
                              if ($pengembalianSP->status_pengembalian==0) {
                                  if(Auth::user()->level_user=='Supervisor'||Auth::user()->level_user=='Super Admin'){
                                    return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/pengembalian/sp/list-invoice-sp/edit/'.$pengembalianSP->id_pengembalian_sp.'/'.$pengembalianSP->nm_sales.'/'.$pengembalianSP->tanggal_pengembalian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$pengembalianSP->id_pengembalian_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pengembalianSP->id_pengembalian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                                  }else {
                                    return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/operasional/smita/pengembalian/sp/list-invoice-sp/edit/'.$pengembalianSP->id_pengembalian_sp.'/'.$pengembalianSP->nm_sales.'/'.$pengembalianSP->tanggal_pengembalian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pengembalianSP->id_pengembalian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                                  }
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/pengembalian/sp/list-invoice-sp/edit/'.$pengembalianSP->id_pengembalian_sp.'/'.$pengembalianSP->nm_sales.'/'.$pengembalianSP->tanggal_pengembalian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pengembalianSP->id_pengembalian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              }

                            })
                          ->make(true);
    }
    public function pengembalianData(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_pengembalian_sps')->get();

        $detailPengembalian = DetailPengembalianProduk::select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        detail_pengembalian_sps.id_produk,
        detail_pengembalian_sps.id_pengembalian_sp,
        detail_pengembalian_sps.id_detail_pengembalian_sp,
        detail_pengembalian_sps.tipe_harga,
        detail_pengembalian_sps.jumlah_sp'))
                        ->join('master_produks',function($join){
                            $join->on('detail_pengembalian_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pengembalian_sp',$id)->get();
       
        return $datatables->of($detailPengembalian)
                        ->addColumn('indeks', function ($detailPengembalianSp) {
                              return '';
                            })
                            ->addColumn('jumlah', function ($detailPengembalianSp) {
                              return number_format($detailPengembalianSp->jumlah_sp,0,",",".");
                            })
                            ->addColumn('action', function ($detailPengembalianSp) {
                                $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPengembalianSp->id_produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPengembalianSp->id_pengembalian_sp.'" data-id_detail="'.$detailPengembalianSp->id_detail_pengembalian_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPengembalianSp->jumlah_sp.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
