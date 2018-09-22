<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use App\PBB;
use App\PrintPBB;
use App\View\ViewPBB;
use App\ViewPrintPBB;
use Yajra\Datatables\Datatables;
use App\Customer;
use DB;

class ViewPrintPBBController extends Controller
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
        return view('karoseri.viewprint_pbb');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function printpb($id)
     {
       $data = VIewPBB::select(DB::raw('view_pbb.*, master_supervisors.nm_spv'))
                         ->join('master_supervisors', 'view_pbb.id_spv', '=', 'master_supervisors.id_spv')
                         ->where('view_pbb.id_pbb', $id)->first();
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

       $detail = PrintPBB::where('id_pbb', $id)->get();
       return view('karoseri.viewprint_pbb', ['detail' => $detail, 'data' =>  $data, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom, 'tglpbb' => $fixpbb, 'thnpbb' => $tahunpbb, 'rmpbb' => $rompbb]);
     }

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
        //
    }
    public function data($id)
    {
        $datatables = new Datatables;
        return $datatables->eloquent(PrintPBB::where('id_pbb', $id))->make(true);
    }
}
