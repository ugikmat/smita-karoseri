<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKPB;
use App\View\ViewSPKPB;
use App\QCPB;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class QCPBController extends Controller
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
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function index()
     {
         return view('karoseri.print_qcpb');
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
        $idspkpb = $request->get('spkpb_qc');


        $qcpb = new QCPB;
          $qcpb->tgl_pengerjaan = $request->get('tgl_pengerjaan');
          $qcpb->id_spkpb = $idspkpb;
          $qcpb->nm_pb = $request->get('spkpb_nama');
          $qcpb->jenis_pb = $request->get('spkpb_jenis');
          $qcpb->save();

        $upt = SPKPB::where('id_spkpb', $idspkpb)->update(['vote_qc' => 1]);

        return redirect()->route('printspkpb', [$idspkpb, 'idspkpb' => $idspkpb]);
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
      $idqcupt = $request->get('idqc_upt');
      $qcpb_tgl = $request->get('dtp_input1');
      $qcpb_persen = $request->get('persentase_upt');

      $qc = QCPB::where('id_qcpb', $idqcupt)->first();
      $qc->tgl_progress = $qcpb_tgl;
      $qc->jenis_pekerjaan = $request->get('jn_kerja');
      $qc->keterangan = $request->get('keterangan');
      $qc->persentase = $qcpb_persen;

      $qc->save();

      return redirect()->back();
    }
    public function done(Request $request)
    {
      $idqcupt = $request->get('id_qcpb');
      $tgl_done = $request->get('tgl_selesai');

      $qc = QCPB::where('id_qcpb', $idqcupt)->first();
      $qc->tgl_selesai = $tgl_done;
      $qc->persentase = '100%';

      $qc->save();

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
        //
    }
}
