<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanDompul;
use App\DetailPenjualanDompul;
use App\UploadDompul;
use App\HargaDompul;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ListPenjualanDompulController extends Controller
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
     * Diplay a list of transaction made before
     */
    public function index(){
        return view('penjualan.dompul.list-invoice');
    }

    public function edit($id,$canvaser,$tgl,$downline){
        $datas =UploadDompul::select('nama_downline','nama_canvasser','no_hp_downline','no_hp_canvasser','produk','tanggal_transfer','id_penjualan_dompul')
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',1)
                        ->where('status_active',1)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('id_penjualan_dompul',$id)
                        ->where('nama_downline',$downline)->first();
        // $penjualanDompul = PenjualanDompul::select('penjualan_dompuls.id_penjualan_dompul','master_saless.nm_sales','master_saless.no_hp','penjualan_dompuls.no_hp_kios','master_customers.nm_cust','penjualan_dompuls.tanggal_penjualan_dompul')
        //                     ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
        //                     ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
        //                     ->where('id_penjualan_dompul',$id)->first();
        $sums = UploadDompul::select('upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$canvaser)
                        ->where('status_penjualan',1)
                        ->where('status_active',1)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d-%m-%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$downline)->get();
        $total = 0;
        foreach ($sums as $key => $value) {
            $total+=(($value->qty-$value->qty_program)*$value->harga_dompul);
        }
        $total=number_format($total,0,",",".");
        $penjualanDompul = PenjualanDompul::where('id_penjualan_dompul',$id)->first();
        $detailPenjualanDompul = DetailPenjualanDompul::where('id_penjualan_dompul',$id)->where('deleted',0)->get();
        return view('penjualan.dompul.list-edit-p-dompul-ro',['datas'=>$datas,'total'=>$total,'penjualanDompul'=>$penjualanDompul,'detailPenjualanDompul'=>$detailPenjualanDompul]);
    }

    public function verif($id){
        PenjualanDompul::where('id_penjualan_dompul',$id)
                        ->update(['status_pembayaran'=>1
                        ]);
        return redirect()->back();
    }

    public function update(Request $request){
        $id = $request->get('id');
        $bank = $request->get('bank');
        $delete = $request->get('delete');
        $total = $request->get('total');
        $penjualanDompul = PenjualanDompul::where('id_penjualan_dompul',$id)->first();
        $penjualanDompul->grand_total=str_replace('.', '', $total);
        $penjualanDompul->save();
        if (!empty($delete)) {
            foreach ($delete as $key => $value) {
                $detailPenjualanDompul = DetailPenjualanDompul::where('id_detail_penjualan',$value)->first();
                $detailPenjualanDompul->deleted = 1;
                $detailPenjualanDompul->save();
            }
        }
        
        foreach ($bank as $key => $value) {
            if (empty($value['id'])) {
                $detailPenjualanDompul = new DetailPenjualanDompul();
            } else {
                $detailPenjualanDompul = DetailPenjualanDompul::where('id_detail_penjualan',$value['id'])->first();   
            }
            $detailPenjualanDompul->id_penjualan_dompul = $penjualanDompul->id_penjualan_dompul;
            $detailPenjualanDompul->metode_pembayaran = $value['bank'];
            $detailPenjualanDompul->nominal=str_replace('.', '', $value['trf']);
                switch ($value['bank']) {
                    case 'BCA Pusat':
                        $detailPenjualanDompul->bca_pusat=$value['trf'];
                        break;
                    case 'BCA Cabang':
                        $detailPenjualanDompul->bca_cabang=$value['trf'];
                        break;
                    case 'Mandiri':
                        $detailPenjualanDompul->mandiri=$value['trf'];
                        break;
                    case 'BNI':
                        $detailPenjualanDompul->bni=$value['trf'];
                        break;
                    case 'BRI':
                        $detailPenjualanDompul->bri=$value['trf'];
                        break;
                    case 'Cash':
                        $detailPenjualanDompul->cash=$value['trf'];
                        break;
                    default:
                        break;
                }
            $detailPenjualanDompul->catatan = $value['catatan'];
            $detailPenjualanDompul->save();
        }
        return redirect('/penjualan/dompul/list-invoice');
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables,$tgl_penjualan)
    {
        if ($tgl_penjualan=='null') {
            $tgl = $tgl_penjualan;
        }else {
            session(['dompul-list-tgl'=>$tgl_penjualan]);
            $tgl = Carbon::parse($tgl_penjualan);
            $tgl = $tgl->format('Y-m-d');

        }
        return $datatables->eloquent(PenjualanDompul::select('penjualan_dompuls.id_penjualan_dompul',
        'master_saless.nm_sales',
        'penjualan_dompuls.no_hp_kios',
        'master_customers.nm_cust',
        'penjualan_dompuls.tanggal_penjualan_dompul',
        'penjualan_dompuls.status_pembayaran')
                        ->join('master_saless','master_saless.id_sales','=','penjualan_dompuls.id_sales')
                        ->join('master_customers','master_customers.no_hp','=','penjualan_dompuls.no_hp_kios')
                        // ->join('detail_penjualan_dompuls','detail_penjualan_dompuls.id_penjualan_dompul','=','penjualan_dompuls.id_penjualan_dompul')
                        ->where('tanggal_penjualan_dompul',$tgl))
                        // ->addColumn('indeks', function ($uploadDompul) {
                        //       return '';
                        //     })
                         ->addColumn('status_verif', function ($penjualanDompul) {
                              if ($penjualanDompul->status_pembayaran==0) {
                                  return 'Belum Verifikasi';
                              } else {
                                  return 'Telah Verifikasi';
                              }

                            })
                          ->addColumn('action', function ($penjualanDompul) {
                              if ($penjualanDompul->status_pembayaran==0) {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/dompul/list-invoice/edit/'.$penjualanDompul->id_penjualan_dompul.'/'.$penjualanDompul->nm_sales.'/'.$penjualanDompul->tanggal_penjualan_dompul.'/'.$penjualanDompul->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Edit
                                    </a>
                                    <a class="btn btn-xs btn-warning" data-toggle="modal" data-target="#verificationModal" data-id='.$penjualanDompul->id_penjualan_dompul.'><i class="glyphicon glyphicon-edit"></i> Verifikasi</a>';
                              } else {
                                  return
                                    '<a class="btn btn-xs btn-primary"
                                    href="/penjualan/dompul/list-invoice/edit/'.$penjualanDompul->id_penjualan_dompul.'/'.$penjualanDompul->nm_sales.'/'.$penjualanDompul->tanggal_penjualan_dompul.'/'.$penjualanDompul->nm_cust.'">
                                    <i class="glyphicon glyphicon-edit"></i> Lihat
                                    </a>';
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
    public function penjualanData(Datatables $datatables,$sales,$tgl,$customer)
    {
        return $datatables->eloquent(UploadDompul::select('upload_dompuls.no_faktur','upload_dompuls.produk','upload_dompuls.tipe_dompul','upload_dompuls.qty','upload_dompuls.qty_program','master_harga_dompuls.harga_dompul')
                        ->join('master_harga_dompuls',function($join){
                            $join->on('master_harga_dompuls.nama_harga_dompul','=','upload_dompuls.produk')
                                ->on('master_harga_dompuls.tipe_harga_dompul','=','upload_dompuls.tipe_dompul');
                        })
                        ->where('nama_canvasser',$sales)
                        // ->where(DB::raw('tanggal_transfer=DATE_FORMAT('.$tgl.',"%d/%m/%Y")'))
                        ->where('tanggal_transfer',$tgl)
                        ->where('nama_downline',$customer)
                        ->where('status_penjualan',1)
                        ->where('status_active',1))
                        ->addColumn('jumlah', function ($uploadDompul) {
                              return number_format($uploadDompul->qty,0,",",".");
                            })
                        ->addColumn('jumlah_program', function ($uploadDompul) {
                            return number_format($uploadDompul->qty_program,0,",",".");
                            })
                        ->addColumn('total_harga', function ($uploadDompul) {
                              return number_format(($uploadDompul->qty-$uploadDompul->qty_program)*$uploadDompul->harga_dompul,0,",",".");
                            })
                          ->addColumn('action', function ($uploadDompul) {
                              $tipe = HargaDompul::select('tipe_harga_dompul')->where('nama_harga_dompul',$uploadDompul->produk)->get();
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-tipe='.$tipe.' data-tipe_dompul='.$uploadDompul->tipe_dompul.' data-produk="'.$uploadDompul->produk.'" data-faktur="'.$uploadDompul->no_faktur.'" data-qty="'.$uploadDompul->qty_program.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            })
                          ->make(true);
    }
}
