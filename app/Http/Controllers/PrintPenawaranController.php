<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use App\PrintPenawaran;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class PrintPenawaranController extends Controller
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
        return view('karoseri.print_penawaran');
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

    public function printpenawaran($id)
    {
      $data = ViewSPKC::where('id_spkc', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                        $tanggal = $data->tgl_spkpb;
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];
      $spkc = $data->id_spkc;

      $tes = PrintPenawaran::where('id_spkc', $id)->get();

      $huruf = ['','A','B','C','D','E','F','G','H','I','J'];
      $count = PrintPenawaran::where('id_spkc', $id)->count();


      $cnt = $spkc.''.$huruf[$count];
      $cntacc = $spkc.''.$huruf[$count-1];



      return view('karoseri.print_penawaran', ['data' =>  $data, 'tes' => $tes, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom, 'idpenawaran' => $cnt, 'idpenawaranacc' => $cntacc]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pn = new PrintPenawaran;
        $pn->id_spkc = $request->get('id_spkc_penawaran');
        $pn->id_penawaran = $request->get('id_penawaran');
        $pn->tgl_penawaran = $request->get('tgl_penawaran');
        $pn->karoseri_penawaran = $request->get('jenis_karoseri_penawaran');
        $pn->jml_unit_penawaran = $request->get('jumlah_unit_penawaran');
        $pn->harga_unit_penawaran = $request->get('harga_unit_penawaran');
        $pn->ppn_penawaran = $request->get('ppnh_penawaran');
        $pn->total_harga_penawaran = $request->get('total_harga_penawaran');
        $pn->spek_penawaran = $request->get('det_spek');
        $pn->save();

        return redirect()->back();
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
            $jum = $request->get('jumlah_unit_penawaran_acc');
            $har = $request->get('harga_unit_penawaran_acc');
            $ppn = $request->get('ppn_penawaran_acc');
            $tot = $request->get('total_harga_penawaran_acc');
            $det = $request->get('det_spek_acc');

            $up = SPKC::where('id_spkc', $id)->update(['jumlah_unit' => $jum, 'harga_unit' => $har, 'ppn' => $ppn, 'harga_total' => $tot, 'ket' => $det, 'status' => 'ACCEPTED']);
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
