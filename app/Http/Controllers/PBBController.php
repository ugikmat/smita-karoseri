<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PBB;
use App\View\ViewPBB;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class PBBController extends Controller
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
        return view('karoseri.pbb');
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
      $pbb = PBB::where('id_pbb', $id)->update(['status' => 'CANCELED']);
      return redirect('/pbb');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(ViewPBB::where(function ($query) {
                            $query->where('statuspbb', 'ACCEPTED')
                                  ->orWhere('statuspbb', 'CANCELED')
                                  ->orWhere('statuspbb', 'PENDING');
                                })->orderBy('id_pbb', 'asc'))

                          ->addColumn('action', function ($pp) {
                            if($pp->statuspbb == 'PENDING'){
                              return
                              '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_pbb.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>


                              <a href="'.route('edit', [$pp->id_pbb]).'" type="submit" class="btn btn-info"
                              data-id="'.$pp->id_pbb.'"
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
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
                            }
                            else if($pp->statuspbb == 'ACCEPTED'){
                              return
                              '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_pbb.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>

                              <a href="'.route('printpbb', [$pp->id_pbb]).'" type="submit" class="btn btn-primary"
                              data-id="'.$pp->id_pbb.'"
                              data-wo="'.$pp->id_wo.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-tgl_pbb="'.$pp->tgl_pbb.'"><i class="glyphicon glyphicon-print"></i>Print</a>
                              ';

                            }
                            })
                            ->addColumn('id_pbb', function($pp){
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $pp->tgl_pbb;
                              $id_pbb = $pp->id_pbb;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1];

                              $no_pbb = $id_pbb.'/'.'PBB'.'/'.$rom.'/'.$tahun;

                              return $no_pbb;
                            })
                            ->addColumn('id_wo', function($pp){
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $pp->tanggal;
                              $id_wo = $pp->id_spkc;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1];

                              $no_wo = $id_wo.'/'.'WO'.'/'.$rom.'/'.$tahun;

                              return $no_wo;
                            })
                          ->addColumn('tgl_pbb', function($pp){
                            $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                            $tanggal = $pp->tgl_pbb;
                            $tahun = date('Y', strtotime($tanggal));
                            $bulan = date('m', strtotime($tanggal));
                            $tgl = date('d', strtotime($tanggal));

                            $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;

                            return $fix;
                          })
                          ->addColumn('status', function($pp){
                              if($pp->statuspbb == 'ACCEPTED'){
                                  return '<div class="btn btn-block bg-green">'.$pp->statuspbb.'</div>';
                              }
                              else if($pp->statuspbb == 'PENDING'){
                                  return '<div class="btn btn-block bg-yellow">'.$pp->statuspbb.'</div>';
                              }
                              else if($pp->statuspbb == 'CANCELED'){
                                  return '<div class="btn btn-block bg-red">'.$pp->statuspbb.'</div>';
                              }
                          })
                          ->rawColumns(['status','dokumen','action'])->make(true);
    }
}
