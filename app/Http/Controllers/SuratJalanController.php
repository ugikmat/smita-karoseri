<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKPB;
use App\BAP;
use App\Produksi;
use App\SuratJalan;
use App\KirimSuratJalan;
use App\View\ViewSPKPB;
use Yajra\Datatables\Datatables;
use DB;

class SuratJalanController extends Controller
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
        return view('karoseri.surat_jalan');
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


      $idprod = $request->get('id_produksi');
      $idspkc = $request->get('id_spkc');
      $update = Produksi::where('kode_produksi', $idprod)->where('id_spkc', $idspkc)->update(['status_print_sj' => 'SUDAH PRINT']);

      $cek = KirimSuratJalan::where('id_produksi', $idprod)->where('id_spkc', $idspkc)->count();

      if($cek == 0){
        $sj = new KirimSuratJalan;


        $sj->id_produksi = $idprod;
        $sj->id_spkc = $idspkc;
        $sj->tanggal_kirim = $request->get('tanggal_kirim');
        $sj->nm_sopir = $request->get('nm_sopir');
        $sj->catatan = $request->get('catatan');

        $sj->save();
      }
      $data = Suratjalan::select('view_sj.*', 'master_customers.nm_cust', 'master_customers.alamat_cust', 'spkpbs.ukuran_karoseri', 'surat_jalan_tabels.tanggal_kirim', 'surat_jalan_tabels.nm_sopir')
              ->join('master_customers', 'master_customers.id_cust', '=', 'view_sj.id_cust')
              ->leftjoin('surat_jalan_tabels', 'surat_jalan_tabels.id_produksi', '=', 'view_sj.kode_produksi')
              ->leftjoin('spkpbs', 'spkpbs.id_spkc', '=', 'view_sj.id_spkc')
              ->where('view_sj.kode_produksi', $idprod)->where('surat_jalan_tabels.id_spkc', $idspkc)->first();
              $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
              $tanggal = $data->tanggal;
              $tahun = date('Y', strtotime($tanggal));
              $bulan = date('m', strtotime($tanggal));
              $tgl = date('d', strtotime($tanggal));

              $rom = $blnromawi[$bulan-1];

      return view('karoseri.viewprint_sj', ['data' =>  $data, 'rom' => $rom, 'tahun' => $tahun]);
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

    public function getSJ($id)
    {
      $data = Suratjalan::select('view_sj.*', 'master_customers.nm_cust', 'master_customers.alamat_cust', 'spkpbs.ukuran_karoseri')
              ->join('master_customers', 'master_customers.id_cust', '=', 'view_sj.id_cust')
              ->leftjoin('spkpbs', 'spkpbs.id_spkc', '=', 'view_sj.id_spkc')
              ->where('id_produksi', $id)->first();
              $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
              $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
              $tanggal = $data->tanggal;
              $tahun = date('Y', strtotime($tanggal));
              $bulan = date('m', strtotime($tanggal));
              $tgl = date('d', strtotime($tanggal));

              $rom = $blnromawi[$bulan-1];

      return view('karoseri.print_sj', ['data' =>  $data, 'rom' => $rom, 'tahun' => $tahun]);
    }



    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(SuratJalan::query()->orderBy('id_produksi', 'asc'))
                          ->addColumn('action', function ($pp) {
                              return
                              '<a href="'.route('getsj', [$pp->id_produksi]).'" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Print</a>

                              ';
                            })
                            ->addColumn('status_print_sj', function($pp){
                                if($pp->status_print_sj == 'SUDAH PRINT'){
                                    return '<div class="btn btn-block bg-green">'.$pp->status_print_sj.'</div>';
                                }
                                else if($pp->status_print_sj == 'BELUM PRINT'){
                                    return '<div class="btn btn-block bg-yellow">'.$pp->status_print_sj.'</div>';
                                }
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
                            ->rawColumns(['status_print_sj','action'])

                          ->make(true);
    }
}
