<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WorkOrder;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\Supervisor;
use App\View\ViewWO;
use DB;

class WorkOrderController extends Controller
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
        return view('karoseri.wo');
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
        //
    }

    public function print($id)
    {
      $data = ViewWO::where('id_spkc', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                        $tanggal = $data->tanggal;
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];
      return view('karoseri.viewprint_wo', ['data' =>  $data, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom]);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(ViewWO::where('vote', 1)
                          ->where('statuswo', 'ACCEPTED')->orderBy('id_spkc', 'asc'))
                          ->addColumn('action', function ($pp) {
                              return
                              '<a href="'.route('printwo', [$pp->id_spkc]).'" target="_blank" type="submit" class="btn btn-md btn-primary"
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
                              data-berkas="'.$pp->dokumen.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-print"></i> Print WO</a>';
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
                            ->addColumn('id_spkc', function($pp){
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $pp->tanggal;
                              $id_spkc = $pp->id_spkc;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1];

                              $no_spkc = $id_spkc.'/'.'SPK'.'/'.$rom.'/'.$tahun;

                              return $no_spkc;
                            })
                            ->addColumn('id_wo', function($pp){
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $pp->tanggal;
                              $id_spkc = $pp->id_spkc;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1];

                              $no_wo = $id_spkc.'/'.'WO'.'/'.$rom.'/'.$tahun;

                              return $no_wo;
                            })

                          ->make(true);
    }
}
