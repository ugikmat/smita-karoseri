<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use App\SPKPB;
use App\View\ViewSPKPB;
use App\Pemborong;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use App\Kasbon;
use App\View\ViewKasbon;
use DB;

class KasbonController extends Controller
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
        return view('karoseri.kasbon');
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
        $kas = new Kasbon;
        $kas->id_spkpb = $request->get('spkpb_kasbon_value');
        $kas->tgl_kasbon = $request->get('tgl_kasbon');
        $kas->nm_kasbon = $request->get('nm_kasbon');
        $kas->jumlah_kasbon = $request->get('jumlah_kasbon');
        $kas->sisa_borongan = $request->get('sisa');
        $kas->save();

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

    public function data(Datatables $datatables)
    {
      return $datatables->eloquent(ViewKasbon::orderBy('id_kasbon', 'asc'))
                        ->addColumn('id_kasbon', function($pp){
                          $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                          $tanggal = $pp->tgl_kasbon;
                          $id_kasbon = $pp->id_kasbon;
                          $tahun = date('Y', strtotime($tanggal));
                          $bulan = date('m', strtotime($tanggal));
                          $tgl = date('d', strtotime($tanggal));

                          $rom = $blnromawi[$bulan-1];

                          $no_kasbon = $id_kasbon.'/'.'KB'.'/'.$rom.'/'.$tahun;

                          return $no_kasbon;
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
                        })->rawColumns(['id_kasbon','id_spkpb'])
                        ->make(true);
    }
}
