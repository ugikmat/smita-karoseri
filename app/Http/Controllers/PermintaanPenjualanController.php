<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PermintaanPenjualan;
use Yajra\Datatables\Datatables;
use App\Customer;
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
          $pp = new PermintaanPenjualan;
          $pp->id_cust = $request->get('id_cust');
          $pp->id_bank = $request->get('id_bank');
          $pp->nm_perusahaan = $request->get('nm_perusahaan');
          $pp->jenis_karoseri = $request->get('jenis_karoseri');
          $pp->jumlah_unit = $request->get('jumlah_unit');
          $pp->harga_unit = $request->get('harga_unit');
          $pp->harga_total = $request->get('harga_total');
          $pp->ket = $request->get('ket');
          $pp->tanggal = $request->get('tanggal');
          $pp->save();

          return redirect('/permintaan');
    }

    public function getData(Request $req)
    {
      $data = Customer::where('id_cust','=',$req->get('id'))->first();
      return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
          $pp = PermintaanPenjualan::select(DB::raw('spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust'))
                            ->join('master_customers', 'spkcs.id_cust', '=', 'master_customers.id_cust')
                            ->where('id_spkc', $id)->first();
          $pp->id_bank = $request->get('id_bank_upt');
          $pp->nm_perusahaan = $request->get('nm_perusahaan_upt');
          $pp->jenis_karoseri = $request->get('jenis_karoseri_upt');
          $pp->jumlah_unit = $request->get('jumlah_unit_upt');
          $pp->harga_unit = $request->get('harga_unit_upt');
          $pp->harga_total = $request->get('harga_total_upt');
          $pp->ket = $request->get('ket_upt');
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
      $pp = PermintaanPenjualan::where('id_spkc', $id)->update(['vote' => 0]);
      return redirect('/permintaan');
    }

    public function accept($id)
    {
      $data = PermintaanPenjualan::where('id_spkc', $id)->update(['status' => 'ACCEPTED']);
      return redirect('/permintaan');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(PermintaanPenjualan::select(DB::raw('spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust'))
                          ->join('master_customers', 'spkcs.id_cust', '=', 'master_customers.id_cust')
                          ->where('spkcs.vote', 1)
                          ->where('spkcs.status', 'PENDING'))
                          ->addColumn('action', function ($pp) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-bank="'.$pp->id_bank.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>

                              <a class="btn btn-xs btn-success" data-toggle="modal" data-target="#accModal"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-bank="'.$pp->id_bank.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-edit"></i> Aksi</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
