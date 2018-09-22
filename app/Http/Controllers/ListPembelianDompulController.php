<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PembelianDompul;
use App\DetailPembelianDompul;
use App\DetailPembayaranPembelianDompul;
use App\UploadDompul;
use App\HargaDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPembelianDompulController extends Controller
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
        return view('pembelian.dompul.list-pembelian-dompul');
    }

    public function edit($id){
        $total_pembayaran=0;
        $pembayaran = DetailPembayaranPembelianDompul::where('id_pembelian_dompul',$id)->where('deleted',0)->get();
        foreach ($pembayaran as $key => $value) {
            $total_pembayaran+=$value->nominal;
        }
        $pembelianDompul = PembelianDompul::where('id_pembelian_dompul',$id)->first();
        $total = $pembelianDompul->grand_total;
        $total=number_format($total,3,",",".");
        $total_pembayaran=number_format($total_pembayaran,3,",",".");
        $detailPembayaranDompul = DetailPembayaranPembelianDompul::where('id_pembelian_dompul',$id)->where('deleted',0)->get();
        return view('pembelian.dompul.list-pembelian-dompul-2',[
            // 'datas'=>$datas,
            'total'=>$total,
            'pembelianDompul'=>$pembelianDompul,
            'detailPembayaranDompul'=>$detailPembayaranDompul,
            'total_pembayaran'=>$total_pembayaran]);
    }

    /**
     * Update Upload Dompul tipe and price, back to edit
     *
     */
    public function update(Request $request,$id_detail){
        // session(['tunai'=>$request->get('update_tunai'),'catatan'=>$request->get('update_catatan')]);
        $data =DetailPembelianDompul::where('id_detail_pembelian_dompul',$id_detail)->first();
        $tipe = $request->get('tipe');
        if($tipe != 'default') {
            $data->tipe_harga = $tipe;
            $data->harga_satuan = HargaDompul::where('nama_harga_dompul',$data->produk)
                                                    ->where('tipe_harga_dompul',$tipe)
                                                    ->first()
                                                    ->harga_dompul;
            $data->harga_total = $data->harga_satuan*$data->jumlah;
        }
        $data->save();
        $total=0;
        $sum =DetailPembelianDompul::where('id_pembelian_dompul',$data->id_pembelian_dompul)
                        ->where('status_detail_pd',1)->get();
        foreach ($sum as $key => $value) {
            $total+=$value->harga_total;
        }
        PembelianDompul::where('id_pembelian_dompul',$data->id_pembelian_dompul)->update(['grand_total'=>$total]);
        return response()->json(['success' => true,'total'=>$total]);
    }

    public function verif(Request $request){
        PembelianDompul::where('id_pembelian_dompul',$request->get('id'))
                        ->update(['status_pembayaran'=>1
                        ]);
        $request->session()->flash('status','Berhasil melakukan verifikasi!');
        return redirect()->back();
    }

    public function store(Request $request){
        $id = $request->get('id_pembelian');
        $bank = $request->get('bank');
        $delete = $request->get('delete');
        $total = $request->get('total');
        $pembelianDompul = PembelianDompul::where('id_pembelian_dompul',$id)->first();
        $pembelianDompul->grand_total=str_replace(',', '.', str_replace('.', '', $total));
        $pembelianDompul->save();
        if (!empty($delete)) {
            foreach ($delete as $key => $value) {
                $detailPembelianDompul = DetailPembayaranPembelianDompul::where('id_detail_pembayaran_dompul',$value)->first();
                $detailPembelianDompul->deleted = 1;
                $detailPembelianDompul->save();
            }
        }

        foreach ($bank as $key => $value) {
            if (empty($value['id'])) {
                $detailPembelianDompul = new DetailPembayaranPembelianDompul();
            } else {
                $detailPembelianDompul = DetailPembayaranPembelianDompul::where('id_detail_pembayaran_dompul',$value['id'])->first();
            }
            $detailPembelianDompul->id_pembelian_dompul = $pembelianDompul->id_pembelian_dompul;
            $detailPembelianDompul->metode_pembayaran = $value['bank'];
            $detailPembelianDompul->nominal=str_replace(',', '.', str_replace('.', '', $value['trf']));
                switch ($value['bank']) {
                    case 'BCA Pusat':
                        $detailPembelianDompul->bca_pusat=$value['trf'];
                        break;
                    case 'BCA Cabang':
                        $detailPembelianDompul->bca_cabang=$value['trf'];
                        break;
                    case 'Mandiri':
                        $detailPembelianDompul->mandiri=$value['trf'];
                        break;
                    case 'BNI':
                        $detailPembelianDompul->bni=$value['trf'];
                        break;
                    case 'BRI':
                        $detailPembelianDompul->bri=$value['trf'];
                        break;
                    case 'Cash':
                        $detailPembelianDompul->cash=$value['trf'];
                        break;
                    default:
                        break;
                }
            $detailPembelianDompul->catatan = $value['catatan'];
            $detailPembelianDompul->save();
        }
        $request->session()->flash('status','Berhasil melakukan edit!');
        return redirect('/pembelian/dompul/list-pembelian-dompul');
    }

    public function delete(Request $request){
        $pembelianDompul = PembelianDompul::where('id_pembelian_dompul',$request->get('id'))->update(['deleted'=>1]);
        $request->session()->flash('status','Berhasil menghapus List Invoice!');
        return redirect('/pembelian/dompul/list-pembelian-dompul');
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
            session(['dompul-list-tgl'=>$tgl_pembelian]);
            $tgl = Carbon::parse($tgl_pembelian);
            $tgl = $tgl->format('Y-m-d');

        }
        return $datatables->eloquent(PembelianDompul::select('id_pembelian_dompul',
        'nama_supplier',
        'nm_lokasi',
        'tanggal_pembelian_dompul',
        'status_pembelian',
        'status_pembayaran')
                        ->join('master_suppliers','master_suppliers.id_supplier','=','pembelian_dompuls.id_supplier')
                        ->join('master_lokasis','master_lokasis.id_lokasi','=','pembelian_dompuls.id_lokasi')
                        // ->join('detail_pembelian_dompuls','detail_pembelian_dompuls.id_pembelian_dompul','=','pembelian_dompuls.id_pembelian_dompul')
                        ->where('tanggal_pembelian_dompul',$tgl)
                        ->where('deleted',0))
                        // ->addColumn('indeks', function ($detailPembelian) {
                        //       return '';
                        //     })
                         ->addColumn('status_verif', function ($pembelianDompul) {
                              if ($pembelianDompul->status_pembayaran==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($pembelianDompul) {
                              if ($pembelianDompul->status_pembayaran==0) {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/operasional/smita/pembelian/dompul/list-invoice/edit/'.$pembelianDompul->id_pembelian_dompul.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$pembelianDompul->id_pembelian_dompul.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianDompul->id_pembelian_dompul.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/operasional/smita/pembelian/dompul/list-invoice/edit/'.$pembelianDompul->id_pembelian_dompul.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>
                                    <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$pembelianDompul->id_pembelian_dompul.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                              }

                            })
                          ->make(true);
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function penjualanData(Datatables $datatables,$id)
    {
        return $datatables->eloquent(DetailPembelianDompul::select(
                    'id_detail_pembelian_dompul',
                    'produk',
                    'tipe_harga',
                    'jumlah',
                    'harga_satuan',
                    'harga_total')
                        ->where('id_pembelian_dompul',$id)
                        ->where('status_detail_pd',1))
                        ->addColumn('jumlah', function ($detailPembelian) {
                              return number_format($detailPembelian->jumlah,0,",",".");
                            })
                        ->addColumn('total_harga', function ($detailPembelian) {
                              return number_format($detailPembelian->harga_total,3,",",".");
                            })
                            ->addColumn('harga_satuan', function ($detailPembelian) {
                              return number_format($detailPembelian->harga_satuan,3,",",".");
                            })
                          ->addColumn('action', function ($detailPembelian) {
                              $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$detailPembelian->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id='.$detailPembelian->id_detail_pembelian_dompul.' data-tipe='.$tipe.' data-tipe_dompul='.$detailPembelian->tipe_harga.' data-produk="'.$detailPembelian->produk.'" data-qty="'.$detailPembelian->jumlah.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                          ->make(true);
    }
}
