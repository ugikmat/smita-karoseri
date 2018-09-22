<?php

namespace App\Http\Controllers\Laporan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use App\View\ViewProgress;
use DB;
use Excel;
use PDF;

class LaporanProgressController extends Controller
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
        return view('laporan.lap_progress');
    }

    public function printExcel($type, Request $request)
  	{
      $awal = $request->get('param_a');
      $akhir = $request->get('param_b');
      if($awal == '' && $akhir == ''){
  		$data = ViewProgress::select('id_spkc AS ID SPKC','nm_cust AS NAMA CUSTOMER','jenis_karoseri AS JENIS KAROSERI',
                              'tanggal AS TANGGAL','jumlah_unit AS JUMLAH UNIT','harga_total AS HARGA TOTAL','ppn AS PPN')->where('status_spkpb', 'ACCEPTED')->get()->toArray();
  		return Excel::create('Laporan Progress', function($excel) use ($data) {
  			$excel->sheet('Laporan Progress', function($sheet) use ($data)
  	        {
  				$sheet->fromArray($data);
  	        });
  		})->download($type);
    }
    else{
      $data = ViewProgress::select('id_spkc AS ID SPKC','nm_cust AS NAMA CUSTOMER','jenis_karoseri AS JENIS KAROSERI',
                              'tanggal AS TANGGAL','tgl_pengerjaan AS TANGGAL PENGERJAAN','jenis_pb AS PROGRESS','persentase AS PERSENTASE')->where('status_spkpb', 'ACCEPTED')->whereBetween('tanggal',[$awal,$akhir])->get()->toArray();
  		return Excel::create('Laporan Progress', function($excel) use ($data) {
  			$excel->sheet('Laporan Progress', function($sheet) use ($data)
  	        {
  				$sheet->fromArray($data);
  	        });
  		})->download($type);
    }
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

    public function data(Datatables $datatables, Request $request)
    {
      $awal = $request->get('param_a');
      $akhir = $request->get('param_b');
      if ($awal == '' && $akhir == ''){
        return $datatables->eloquent(ViewProgress::where('vote_spkpb', 1)
                          ->where('status_spkpb', 'ACCEPTED')
                          ->orderBy('id_spkpb', 'asc'))

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
                            ->addColumn('tgl_pengerjaan', function($pp){
                                $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                                $tanggal = $pp->tgl_pengerjaan;
                                $tahun = date('Y', strtotime($tanggal));
                                $bulan = date('m', strtotime($tanggal));
                                $tgl = date('d', strtotime($tanggal));

                                $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;

                                return $fix;
                              })

                            ->addIndexColumn()->rawColumns(['DT_Row_Index'])

                          ->make(true);
    }
    else {
      return $datatables->eloquent(ViewProgress::whereBetween('tanggal', [$awal,$akhir])->where('vote_spkpb', 1)
                        ->where('status_spkpb', 'ACCEPTED')
                        ->orderBy('id_spkpb', 'asc'))

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

                          ->addColumn('tgl_pengerjaan', function($pp){
                              $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                              $tanggal = $pp->tgl_pengerjaan;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;

                              return $fix;
                            })
                          ->addIndexColumn()->rawColumns(['DT_Row_Index'])

                        ->make(true);
    }
  }
}
