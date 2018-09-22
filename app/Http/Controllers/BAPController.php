<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKPB;
use App\BAP;
use App\View\ViewSPKPB;
use App\Pemborong;
use Yajra\Datatables\Datatables;
use DB;

class BAPController extends Controller
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
        return view('karoseri.bap');
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
          $bp = SPKPB::where('id_spkpb', $id)->first();
          $bp->tanggal_print = $request->get('tanggal_print');
          $bp->status_print = $request->get('status_print');
          $bp->save();

          $data = BAP::select('view_bap.*', 'master_supervisors.nm_spv')->join('master_supervisors', 'master_supervisors.id_spv', '=', 'view_bap.id_spv')
          ->where('id_spkpb', $id)->first();
          $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
          $tanggal = $data->tanggal_print;
          $tahun = date('Y', strtotime($tanggal));
          $bulan = date('m', strtotime($tanggal));
          $tgl = date('d', strtotime($tanggal));

          $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
          return view('karoseri.viewprint_bap', ['data' => $data, 'fix' => $fix]);
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

    public function getBAP($id)
    {
      $data = BAP::select('view_bap.*', 'master_supervisors.nm_spv')->join('master_supervisors', 'master_supervisors.id_spv', '=', 'view_bap.id_spv')
      ->where('id_spkpb', $id)->first();
              $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
              $tanggal = $data->tgl_spkpb;
              $tahun = date('Y', strtotime($tanggal));
              $bulan = date('m', strtotime($tanggal));
              $tgl = date('d', strtotime($tanggal));

              $rom = $blnromawi[$bulan-1];


      return view('karoseri.print_bap', ['data' =>  $data, 'rom' => $rom, 'tahun' => $tahun]);
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(BAP::select('view_bap.*', 'nm_spv')->join('master_supervisors', 'master_supervisors.id_spv', '=', 'view_bap.id_spv')->orderBy('id_spkpb', 'asc'))
                          ->addColumn('action', function ($pp) {
                              return
                              '<a href="'.route('getbap', [$pp->id_spkpb]).'" class="btn btn-primary"
                              data-id="'.$pp->id_spkpb.'"
                              data-spv="'.$pp->nm_spv.'"><i class="glyphicon glyphicon-print"></i> Print</a>

                              ';

                            })
                            ->addColumn('status_print', function($pp){
                                if($pp->status_print == 'SUDAH PRINT'){
                                    return '<div class="btn btn-block bg-green">'.$pp->status_print.'</div>';
                                }
                                else if($pp->status_print == 'BELUM PRINT'){
                                    return '<div class="btn btn-block bg-yellow">'.$pp->status_print.'</div>';
                                }
                            })
                            ->addColumn('id_spkpb', function($pp){
                              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                              $tanggal = $pp->tgl_spkpb;
                              $id_spkpb = $pp->id_spkpb;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $rom = $blnromawi[$bulan-1];

                              $no_spkpb = $id_spkpb.'/'.'SPKPB'.'/'.$rom.'/'.$tahun;

                              return $no_spkpb;
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
                            ->addColumn('harga_borongan', function($pp){
                              $harga = $pp->harga_borongan;
                              $nominal = number_format($harga)."";
                              return 'Rp. '.$nominal;
                            })
                            ->rawColumns(['status_print','action'])

                          ->make(true);
    }
}
