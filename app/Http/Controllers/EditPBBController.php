<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PBB;
use App\SPKC;
use App\PrintPBB;
use App\View\ViewPBB;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class EditPBBController extends Controller
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
        return view('karoseri.edit_pbb');
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

    public function ubah($id)
    {
      $data = VIewPBB::where('id_pbb', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];

                        $tanggal = $data->tanggal;
                        $tgl_pbb = $data->tgl_pbb;
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

                        $tahunpbb = date('Y', strtotime($tgl_pbb));
                        $bulanpbb = date('m', strtotime($tgl_pbb));
                        $tglpbb = date('d', strtotime($tgl_pbb));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $fixpbb = $tglpbb.' '.$blnindo[$bulanpbb-1].' '.$tahunpbb;
      $rom = $blnromawi[$bulan-1];
      $rompbb = $blnromawi[$bulanpbb-1];
      return view('karoseri.edit_pbb', ['data' =>  $data, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom, 'tglpbb' => $fixpbb, 'thnpbb' => $tahunpbb, 'rmpbb' => $rompbb]);
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

    public function acc($id)
    {
        $acc = PBB::where('id_pbb', $id)->update(['status' => 'ACCEPTED']);
        return redirect('karoseri/pbb');
    }
    public function dec($id)
    {
        $acc = PBB::where('id_pbb', $id)->update(['status' => 'CANCELED']);
        return redirect('karoseri/pbb');
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
        $jml = $request->get('jumlahsetuju');
        $y = PrintPBB::where('id_detailpbb', $id)->update(['jumlah_setuju' => $jml]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $del = PrintPBB::where('id_detailpbb', $id)->update(['votes' => 0]);
      return redirect()->back();
    }
    public function data($id)
    {
        $datatables = new Datatables;
        return $datatables->eloquent(PrintPBB::where('id_pbb', $id)->where('votes', 1))
                          ->addColumn('action', function ($pp) {
                              return
                              '<a class="btn btn-info" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pp->id_detailpbb.'"
                              data-material="'.$pp->material.'"
                              data-idpbb="'.$pp->id_pbb.'"
                              data-wo="'.$pp->id_wo.'"
                              data-ukuran="'.$pp->ukuran.'"
                              data-jumlah="'.$pp->jumlah.'"
                              data-catatan="'.$pp->catatan.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_detailpbb.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';

                            })
                          ->make(true);
    }
}