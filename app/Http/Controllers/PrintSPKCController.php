<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use App\PrintSPKC;
use Yajra\Datatables\Datatables;
use App\Customer;
use DB;

class PrintSPKCController extends Controller
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
        return view('karoseri.print_spkc');
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

    public function print($id)
    {
      $data = SPKC::select(DB::raw('spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust, master_customers.no_hp, cara_bayars.keterangan'))
                        ->join('master_customers', 'spkcs.id_cust', '=', 'master_customers.id_cust')
                        ->join('cara_bayars', 'spkcs.id_cb', '=', 'cara_bayars.id')
                        ->where('spkcs.id_spkc', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                        $tanggal = $data->tanggal;
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];
      return view('karoseri.print_spkc', ['data' =>  $data, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom]);
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

    public function getData(Request $req)
    {
      $data = SPKC::where('id_spkc','=',$req->get('id'))->first();
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
}
