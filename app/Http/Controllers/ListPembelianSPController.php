<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Sales;
use App\Customer;
use App\PembelianProduk;
use App\DetailPembelianProduk;
use App\DetailPembayaranPembelianProduk;
use App\HargaProduk;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPembelianSPController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','head']);
    }
    /**
     * Diplay a list of transaction made before
     */
    public function index(){
        return view('pembelian.sp.list-pembelian-sp');
    }

    public function verif(Request $request){
        PembelianProduk::where('id_pembelian_sp',$request->get('id'))
                        ->update(['status_pembelian'=>1
                        ]);
        $request->session()->flash('status','Berhasil melakukan verifikasi!');
        return redirect()->back();
    }

    public function delete(Request $request){
        PembelianProduk::where('id_pembelian_sp',$request->get('id'))->update(['deleted'=>1]);
        $request->session()->flash('status','Berhasil menghapus List Invoice!');
        return redirect('/pembelian/sp/list-pembelian-sp');
    }

     public function edit($id){
        $pembelianSP = PembelianProduk::where('id_pembelian_sp',$id)->first();
        $pembayaran = DetailPembayaranPembelianProduk::where('id_pembelian_sp',$id)->where('deleted',0)->get();
        $total_pembayaran=0;
        foreach ($pembayaran as $key => $value) {
            $total_pembayaran+=$value->nominal;
        }
        return view('pembelian/sp/list-pembelian-sp-2',['pembelianSP'=>$pembelianSP,'pembayaran'=>$pembayaran,'total_pembayaran'=>$total_pembayaran]);
    }

    public function update(Request $request,$id_detail){
        $data = DetailPembelianProduk::where('id_detail_pembelian_sp',$id_detail)->first();

        // $data = DB::table('temp_detail_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $tipe = $request->get('tipe');

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
            $data->harga_total=($data->jumlah_sp)*$harga->harga_sp;
            $data->save();
        $total = 0;
        $datas = DetailPembelianProduk::where('id_pembelian_sp',$data->id_pembelian_sp)->get();
        foreach ($datas as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return response()->json(['success' => true,'total'=>$total]);
    }

    /**
     * Save transaction
     */
    public function store(Request $request){
        $id = $request->get('id_pembelian');
        $bank = $request->get('bank-sp');
        $total = $request->get('total');
        $delete = $request->get('delete');
        $pembelianSp = PembelianProduk::where('id_pembelian_sp',$id)->first();
        // $data = DB::table('temp_penjualan_sps')->where('id_temp_penjualan_sp',$id)->first();
        $dataDetail = DetailPembelianProduk::where('id_pembelian_sp',$id)->get();
        // $dataDetail = DB::table('temp_detail_penjualan_sps')->where('id_pembelian_sp',$id)->get();
        // $pembelianSp = new PembelianProduk();
        $pembelianSp->grand_total=str_replace('.', '', $total);
        $pembelianSp->save();
        if (!empty($delete)) {
            foreach ($delete as $key => $value) {
                $detailPembayaranSp = DetailPembayaranPembelianProduk::where('id_detail_pembayaran_psp',$value)->first();
                $detailPembayaranSp->deleted = 1;
                $detailPembayaranSp->save();
            }
        }
        if(!empty($bank)){
        foreach ($bank as $key => $value) {
            if (empty($value['id'])) {
                $detailPembayaranSp = new DetailPembayaranPembelianProduk();
                $detailPembayaranSp->id_pembelian_sp = $pembelianSp->id_pembelian_sp;
            } else {
                $detailPembayaranSp = DetailPembayaranPembelianProduk::where('id_detail_pembayaran_psp',$value['id'])->first();
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
        // session(['tgl_penjualan_sp'=>$pembelianSp->id_sales,'id_cust'=>$pembelianSp->id_customer]);
        $request->session()->flash('status','Berhasil melakukan edit!');
        return redirect('/pembelian/sp/list-pembelian-sp');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_pembelian)
    {
        if ($tgl_pembelian=='null') {
            $tgl = $tgl_pembelian;
        }else {
            session(['sp-list-tgl'=>$tgl_pembelian]);
            $tgl = Carbon::parse($tgl_pembelian);
            $tgl = $tgl->format('Y-m-d');

        }
        return $datatables->eloquent(PembelianProduk::select('id_pembelian_sp',
        'nama_supplier',
        'nm_lokasi',
        'tanggal_pembelian_sp',
        'status_pembelian')
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_sps.id_supplier')
                        ->join('master_lokasis','master_lokasis.id_lokasi','=','pembelian_sps.id_lokasi')
                        // ->join('detail_pembelian_dompuls','detail_pembelian_dompuls.id_pembelian_dompul','=','pembelian_dompuls.id_pembelian_dompul')
                        ->where('tanggal_pembelian_sp',$tgl)
                        ->where('deleted',0))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                        ->addColumn('tanggal_pembelian', function ($pembelianSP) {

                            $tgl = Carbon::parse($pembelianSP->tanggal_pembelian_sp);
                            $tgl = $tgl->format('d/m/Y');
                            return $tgl;

                            })
                        ->addColumn('status_verif', function ($pembelianSP) {
                              if ($pembelianSP->status_pembelian==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($pembelianSP) {
                              if ($pembelianSP->status_pembelian==0) {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/operasional/smita/pembelian/sp/list-invoice/edit/'.$pembelianSP->id_pembelian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$pembelianSP->id_pembelian_sp.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianSP->id_pembelian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/operasional/smita/pembelian/sp/list-invoice/edit/'.$pembelianSP->id_pembelian_sp.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianSP->id_pembelian_sp.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              }

                            })
                          ->make(true);
    }
    public function penjualanData(Datatables $datatables,$id)
    {
        // $data = DB::table('temp_detail_pembelian_sps')->get();

        $detailPembelian = DetailPembelianProduk::select(DB::raw('master_produks.nama_produk,
        master_produks.satuan,
        detail_pembelian_sps.harga_satuan,
        detail_pembelian_sps.id_produk,
        detail_pembelian_sps.id_pembelian_sp,
        detail_pembelian_sps.id_detail_pembelian_sp,
        detail_pembelian_sps.tipe_harga,
        detail_pembelian_sps.jumlah_sp,
        detail_pembelian_sps.harga_total'))
                        ->join('master_produks',function($join){
                            $join->on('detail_pembelian_sps.id_produk','=','master_produks.kode_produk');
                        })
                        ->where('id_pembelian_sp',$id)->get();
        $total = 0;
        foreach ($detailPembelian as $key => $value) {
            $total+=$value->harga_total;
        }
        $total=number_format($total,0,",",".");
        session(['total_harga_sp' => $total]);
        return $datatables->of($detailPembelian)
                        ->addColumn('indeks', function ($detailPembelianSp) {
                              return '';
                            })
                            ->addColumn('harga', function ($detailPembelianSp) {
                              return number_format($detailPembelianSp->harga_satuan,0,",",".");
                            })
                            ->addColumn('jumlah', function ($detailPembelianSp) {
                              return number_format($detailPembelianSp->jumlah_sp,0,",",".");
                            })
                            ->addColumn('total_harga', function ($detailPembelianSp) {
                              return number_format($detailPembelianSp->harga_total,0,",",".");
                            })
                            ->addColumn('action', function ($detailPembelianSp) {
                                $tipe = HargaProduk::select('tipe_harga_sp')->where('id_produk',$detailPembelianSp->id_produk)->get();
                                // $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$detailPembelianSp->id_pembelian_sp.'" data-id_detail="'.$detailPembelianSp->id_detail_pembelian_sp.'" data-tipe='.$tipe.' data-tipe_harga="'.$detailPembelianSp->tipe_harga.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                            // ->addColumn('input', function ($uploadDompul) {
                            //   return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            // })->rawColumns(['input'])
                          ->make(true);
    }
}
