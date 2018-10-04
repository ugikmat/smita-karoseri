<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Sales;
use App\Customer;
use App\DetailPengambilanProduk;
use App\DetailPembayaranSp;
use App\PengambilanProduk;
use App\HargaProduk;
use App\Lokasi;
use Illuminate\Support\Facades\Auth;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPengambilanSPController extends Controller
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
        return view('ambil-sp/ambil/list-invoice-ambil',['lokasis'=>$lokasis,'saless'=>$saless]);
    }

    public function verif(Request $request,$id){
        PengambilanProduk::where('id_pengambilan_sp',$id)
                        ->update(['status_pengambilan'=>1
                        ]);
        $request->session()->flash('status', 'Berhasil melakukan verifikasi!');
        return redirect()->back();
    }

    public function edit($id_pengambilan_sp, $sales, $tgl){
        $sales = Sales::where('nm_sales',$sales)->first();
        $pengambilanSP = PengambilanProduk::where('id_pengambilan_sp',$id_pengambilan_sp)->first();
        return view('ambil-sp/ambil/list-invoice-ambil-2',['sales'=>$sales,'pengambilanSP'=>$pengambilanSP]);
    }
    public function delete(Request $request){
        PengambilanProduk::where('id_pengambilan_sp',$request->get('id'))->update(['deleted'=>1]);
        $request->session()->flash('status', 'Berhasil menghapus List Invoice!');
        return redirect('/ambil-sp/ambil/list-invoice-ambil');
    }

    public function update(Request $request, $id,$id_detail){
        $data = DetailPengambilanProduk::where('id_detail_pengambilan_sp',$id_detail)->first();

        // $data = DB::table('temp_detail_pengambilan_sps')->where('id_temp_pengambilan_sp',$id)->first();
        $tipe = $request->get('tipe');
        $jumlah_sp = $request->get('jumlah');

        if($tipe != 'default') {
            // DB::table('temp_detail_pengambilan_sps')->where('id_temp_pengambilan_sp',$id)
            // ->update(['tipe_harga'=>$tipe]);
            $data->tipe_harga=$tipe;
        }
            $harga = HargaProduk::where('id_produk',$data->id_produk)->where('tipe_harga_sp',$data->tipe_harga)->first();
            $data->jumlah_sp=$jumlah_sp;
            $data->save();
        return response()->json(['success' => true]);
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
            session(['sp-list-tgl-awal'=>$tgl_awal,'sp-list-tgl-akhir'=>$tgl_akhir,'lokasi_pengambilan'=>$lokasi,'sp-list-sales'=>$sales]);
            $tgl_awal = Carbon::parse($tgl_awal);
            $tgl_awal = $tgl_awal->format('Y-m-d');
            $tgl_akhir = Carbon::parse($tgl_akhir);
            $tgl_akhir = $tgl_akhir->format('Y-m-d');

        }
        $datas = PengambilanProduk::select('id_pengambilan_sp',
        'nm_sales',
        'tanggal_pengambilan_sp',
        'status_pengambilan')
                        ->join('master_saless','master_saless.id_sales','=','pengambilan_sps.id_sales')
                        // ->join('detail_pengambilan_dompuls','detail_pengambilan_dompuls.id_pengambilan_dompul','=','pengambilan_dompuls.id_pengambilan_dompul')
                        ->whereBetween('tanggal_pengambilan_sp',[$tgl_awal,$tgl_akhir])
                        ->where('deleted',0);
        if($lokasi!='all'){
            session(['lokasi_pengambilan'=>$lokasi]);
            $datas = $datas->where('pengambilan_sps.id_lokasi',$lokasi);
        }
        if($sales!='all'){
            session(['id_sales'=>$sales]);
            $datas = $datas->where('pengambilan_sps.id_sales',$sales);
        }
        return $datatables->of($datas)
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('tanggal_pengambilan', function ($pengambilanSP) {

                            $tgl = Carbon::parse($pengambilanSP->tanggal_pengambilan_sp);
                            $tgl = $tgl->format('d/m/Y');
                            return $tgl;

                            })
                        ->addColumn('status_verif', function ($pengambilanSP) {
                              if ($pengambilanSP->status_pengambilan==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($pengambilanSP) {
                              if ($pengambilanSP->status_pengambilan==0) {
                                  if(Auth::user()->level_user=='Supervisor'||Auth::user()->level_user=='Super Admin'){
                                    return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/pengambilan/sp/list-invoice-sp/edit/'.$pengambilanSP->id_pengambilan_sp.'/'.$pengambilanSP->nm_sales.'/'.$pengambilanSP->tanggal_pengambilan_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$pengambilanSP->id_pengambilan_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pengambilanSP->id_pengambilan_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                                  }else {
                                    return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/pengambilan/sp/list-invoice-sp/edit/'.$pengambilanSP->id_pengambilan_sp.'/'.$pengambilanSP->nm_sales.'/'.$pengambilanSP->tanggal_pengambilan_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pengambilanSP->id_pengambilan_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                                  }
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/operasional/smita/pengambilan/sp/list-invoice-sp/edit/'.$pengambilanSP->id_pengambilan_sp.'/'.$pengambilanSP->nm_sales.'/'.$pengambilanSP->tanggal_pengambilan_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>';
                              }

                            })
                          ->make(true);
    }
    public function pengambilanData(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_pengambilan_sps')->get();

        $detailPengambilan = DetailPengambilanProduk::select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        detail_pengambilan_sps.id_produk,
        detail_pengambilan_sps.id_pengambilan_sp,
        detail_pengambilan_sps.id_detail_pengambilan_sp,
        detail_pengambilan_sps.tipe_harga,
        detail_pengambilan_sps.jumlah_sp'))
                        ->join('master_produks',function($join){
                            $join->on('detail_pengambilan_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pengambilan_sp',$id)->get();
       
        return $datatables->of($detailPengambilan)
                        ->addColumn('indeks', function ($detailPengambilanSp) {
                              return '';
                            })
                            ->addColumn('jumlah', function ($detailPengambilanSp) {
                              return number_format($detailPengambilanSp->jumlah_sp,0,",",".");
                            })
                            ->addColumn('action', function ($detailPengambilanSp) {
                                $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPengambilanSp->id_produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPengambilanSp->id_pengambilan_sp.'" data-id_detail="'.$detailPengambilanSp->id_detail_pengambilan_sp.'" data-tipe='.$tipe.' data-qty="'.$detailPengambilanSp->jumlah_sp.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
