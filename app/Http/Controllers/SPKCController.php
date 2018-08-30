<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class SPKCController extends Controller
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
        return view('karoseri.spkc');
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
          $spv = $request->get('id_spv');
          $wo = SPKC::where('id_spkc', $id)->update(['id_spv' => $spv, 'statuswo' => 'ACCEPTED']);
          return redirect('/spkc');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $spkc = SPKC::where('id_spkc', $id)->update(['status' => 'CANCELED', 'statuswo' => 'CANCELED']);
      return redirect('/spkc');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(ViewSPKC::where('vote', 1)
                          ->where(function ($query) {
                              $query->where('status', 'ACCEPTED')
                                    ->orWhere('status', 'CANCELED');
                                  })
                          ->orderBy('id_spkc', 'asc'))
                          ->addColumn('action', function ($pp) {
                            if($pp->status == 'ACCEPTED' && $pp->statuswo == 'PENDING')
                            {
                              return
                              '<a class="btn btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-carabayar="'.$pp->keterangan.'"
                              data-berkas="'.$pp->dokumen.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-search"></i> View</a>


                              <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                              <a class="btn btn-success" data-toggle="modal" data-target="#createWO" data-id="'.$pp->id_spkc.'"><i class="glyphicon glyphicon-shopping-cart"></i>Create WO</a>
                              ';

                            }
                            else if($pp->status == 'ACCEPTED' && $pp->statuswo == 'ACCEPTED'){
                              return
                              '<a class="btn btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-carabayar="'.$pp->keterangan.'"
                              data-berkas="'.$pp->dokumen.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-search"></i> View</a>

                              <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                              <a href="'.route('produksi', [$pp->id_spkc, 'idspkc' => $pp->id_spkc]).'" type="submit" class="btn bg-olive"  data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-plus"></i> Produksi</a>
                              ';

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
                            ->addColumn('status', function($pp){
                                if($pp->status == 'ACCEPTED'){
                                    return '<div class="btn btn-block bg-green">'.$pp->status.'</div>';
                                }
                                else if($pp->status == 'PENDING'){
                                    return '<div class="btn btn-block bg-yellow">'.$pp->status.'</div>';
                                }
                                else if($pp->status == 'CANCELED'){
                                    return '<div class="btn btn-block bg-red">'.$pp->status.'</div>';
                                }
                            })

                            ->addColumn('statuswo', function($pp){
                                if($pp->statuswo == 'ACCEPTED'){
                                    return '<div class="btn btn-block bg-green">'.$pp->statuswo.'</div>';
                                }
                                else if($pp->statuswo == 'PENDING'){
                                    return '<div class="btn btn-block bg-yellow">'.$pp->statuswo.'</div>';
                                }
                                else if($pp->statuswo == 'CANCELED'){
                                    return '<div class="btn btn-block bg-red">'.$pp->statuswo.'</div>';
                                }
                            })
                            ->rawColumns(['status','statuswo','action'])

                          ->make(true);
    }
}
