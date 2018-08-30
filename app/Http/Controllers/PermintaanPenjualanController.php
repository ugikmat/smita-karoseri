<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PermintaanPenjualan;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use App\PrintPenawaran;
use DB;

class PermintaanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
     }
     /**
      * Display index page.
      *
      * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
      */
    public function index()
    {
        return view('karoseri.minta_karoseri');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $filename = $request->file('file')->getClientOriginalName();
    $request->file->move('public/upload', $filename);


          $pp = new PermintaanPenjualan;
          $pp->id_cust = $request->get('id_cust');
          $pp->id_cb = $request->get('cara_bayar');
          $pp->nm_perusahaan = $request->get('nm_perusahaan');
          $pp->jenis_karoseri = $request->get('jenis_karoseri');
          $pp->jumlah_unit = $request->get('jumlah_unit');
          $pp->harga_unit = $request->get('harga_unit');
          $pp->ppn = $request->get('ppnh');
          $pp->harga_total = $request->get('harga_total');
          $pp->dokumen = $filename;
          $pp->ket = $request->get('ket');
          $pp->tanggal = $request->get('tanggal');;
          $pp->save();

          $pn = new PrintPenawaran;
          $pn->id_spkc = $pp->id_spkc;
          $pn->id_penawaran = $pp->id_spkc;
          $pn->tgl_penawaran = $request->get('tanggal');
          $pn->karoseri_penawaran = $request->get('jenis_karoseri');
          $pn->jml_unit_penawaran = $request->get('jumlah_unit');
          $pn->harga_unit_penawaran = $request->get('harga_unit');
          $pn->ppn_penawaran = $request->get('ppnh');
          $pn->total_harga_penawaran = $request->get('harga_total');
          $pn->spek_penawaran = $request->get('ket');
          $pn->save();

          return redirect('/permintaan');
    }

    public function getData(Request $req)
    {
      $data = Customer::where('id_cust','=',$req->get('id'))->first();
      return $data;
    }

    public function unduh($id)
    {
      $dl = base_path('public/public/upload/'.$id);
      //return $dl;
      return response()->file($dl);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$pp = PermintaanPenjualan::
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $filename = $request->file('file_upt')->getClientOriginalName();
      $request->file->move('public/upload', $filename);
          $pp = PermintaanPenjualan::select(DB::raw('spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust'))
                            ->join('master_customers', 'spkcs.id_cust', '=', 'master_customers.id_cust')
                            ->where('id_spkc', $id)->first();
          $pp->id_cb = $request->get('cara_bayar_upt');
          $pp->nm_perusahaan = $request->get('nm_perusahaan_upt');
          $pp->jenis_karoseri = $request->get('jenis_karoseri_upt');
          $pp->jumlah_unit = $request->get('jumlah_unit_upt');
          $pp->harga_unit = $request->get('harga_unit_upt');
          $pp->harga_total = $request->get('harga_total_upt');
          $pp->ket = $request->get('ket_upt');
          $pp->dokumen = $filename;
          $pp->tanggal = $request->get('tanggal_upt');
          $pp->save();

          return redirect('/permintaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pp = PermintaanPenjualan::where('id_spkc', $id)->update(['vote' => 1, 'status' => 'CANCELED']);
      return redirect('/permintaan');
    }

    public function accept($id)
    {
      $data = PermintaanPenjualan::where('id_spkc', $id)->update(['status' => 'ACCEPTED']);
      return redirect('/permintaan');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(ViewSPKC::where('vote', 1)
                          ->where(function ($query) {
                              $query->where('status', 'ACCEPTED')
                                    ->orWhere('status', 'CANCELED')
                                    ->orWhere('status', 'PENDING');
                                  }))
                          ->addColumn('action', function ($pp) {
                            if($pp->status == 'PENDING'){
                              return
                              '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>

                              <a class="btn btn-info" href="'.route('printpenawaran', [$pp->id_spkc]).'" type="submit" target="_blank"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-carabayar="'.$pp->id_cb.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-search"></i> View</a>


                              <a class="btn btn-success" data-toggle="modal" data-target="#accModal"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-carabayar="'.$pp->keterangan.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-berkas="'.$pp->dokumen.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-send"></i> Action</a>
                              ';
                            }
                            else if($pp->status == 'ACCEPTED'){
                              return
                              '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>
                              <a class="btn btn-info" href="'.route('printpenawaran', [$pp->id_spkc]).'" type="submit" target="_blank"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-carabayar="'.$pp->id_cb.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-search"></i> View</a>';
                            }
                            })

                          ->addColumn('dokumen', function($pp){
                             return '<a href="'.route('unduh', [$pp->dokumen]).'" target="_blank">'.$pp->dokumen.'</a>';
                          })
                          ->addColumn('tanggal', function($pp){
                            $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                            $tanggal = $pp->tanggal;
                            $tahun = date('Y', strtotime($tanggal));
                            $bulan = date('m', strtotime($tanggal));
                            $tgl = date('d', strtotime($tanggal));

                            $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;

                            return $fix;
                          })
                          ->addColumn('status', function($pp){
                              if($pp->status == 'ACCEPTED'){
                                  return '<div class="btn btn-block bg-green">'.$pp->status.'</div>';
                              }
                              else if($pp->status == 'PENDING'){
                                  return '<div class="btn btn-block bg-yellow">'.$pp->status.'</div>';
                              }
                              else if($pp->status == 'CANCELED'){
                                  return '<div class="btn btn-block bg-red">'.$pp->status.'</div>';
                              }
                          })
                          ->rawColumns(['status','dokumen','action'])->make(true);
    }
}
