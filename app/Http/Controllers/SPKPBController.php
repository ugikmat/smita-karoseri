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
use App\view\ViewKasbon;
use App\Kasbon;
use DB;

class SPKPBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function __construct()
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
        return view('karoseri.spkpb');
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

    public function getDataPemborong(Request $req)
    {
      $data = Pemborong::where('id_pb','=',$req->get('id'))->first();
      return $data;
    }

    public function getDataSpkc(Request $req)
    {
      $data = SPKC::where('id_spkc','=',$req->get('id'))->first();
      return $data;
    }

    public function print($id)
    {
      $data = ViewSPKPB::select(DB::raw('view_spkpb.*, master_supervisors.nm_spv'))
                        ->join('master_supervisors', 'master_supervisors.id_spv', '=', 'view_spkpb.id_spv')
                        ->where('id_spkpb', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                        $tanggal = $data->tgl_spkpb;
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];

      $kasbon = ViewKasbon::where('id_spkpb', $id)->get();
      $sisa = ViewKasbon::selectRaw('MIN(sisa_borongan) AS sb')->where('id_spkpb', $id)->first();

      return view('karoseri.print_spkpb', ['data' =>  $data, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom, 'kasbon' =>  $kasbon, 'sisa' => $sisa]);
    }

    public function printview($id)
    {
      $data = ViewSPKPB::select(DB::raw('view_spkpb.*, master_supervisors.nm_spv'))
                        ->join('master_supervisors', 'master_supervisors.id_spv', '=', 'view_spkpb.id_spv')
                        ->where('id_spkpb', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                        $tanggal = $data->tgl_spkpb;
                        $tahunkop = date('y', strtotime($tanggal));
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];
      $tglkop = $tgl.'.'.$bulan.'.'.$tahunkop;

      $kasbon = ViewKasbon::where('id_spkpb', $id)->get();
      $sisa = ViewKasbon::selectRaw('MIN(sisa_borongan) AS sb')->where('id_spkpb', $id)->first();

      return view('karoseri.viewprint_spkpb', ['data' =>  $data, 'tgl' => $fix, 'tglkop' => $tglkop, 'thn' => $tahun, 'rm' => $rom, 'kasbon' =>  $kasbon, 'sisa' => $sisa]);
    }

    public function printqcpb($id)
    {
      $data = ViewSPKPB::select(DB::raw('view_spkpb.*, master_supervisors.nm_spv'))
                        ->join('master_supervisors', 'master_supervisors.id_spv', '=', 'view_spkpb.id_spv')
                        ->where('id_spkpb', $id)->first();
                        $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                        $blnromawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
                        $tanggal = $data->tgl_spkpb;
                        $tahun = date('Y', strtotime($tanggal));
                        $bulan = date('m', strtotime($tanggal));
                        $tgl = date('d', strtotime($tanggal));

      $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;
      $rom = $blnromawi[$bulan-1];

      $kasbon = ViewKasbon::where('id_spkpb', $id)->get();
      $sisa = ViewKasbon::selectRaw('MIN(sisa_borongan) AS sb')->where('id_spkpb', $id)->first();

      return view('karoseri.print_qcpb', ['data' =>  $data, 'tgl' => $fix, 'thn' => $tahun, 'rm' => $rom, 'kasbon' =>  $kasbon, 'sisa' => $sisa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $spb = new SPKPB;
      $spb->id_pb = $request->get('pemborong');
      $spb->id_spkc = $request->get('spkc');
      //$spb->id_pbb = $request->get('pbb');
      $spb->tgl_spkpb = $request->get('tgl_spkpb');
      $spb->ukuran_karoseri = $request->get('ukuran_karoseri');
      $spb->harga_borongan = $request->get('harga_borongan');
      $spb->keterangan_spkpb = $request->get('keterangan_spkpb');
      $spb->save();

      return redirect('/spkpb');
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
         $spb = SPKPB::where('id_spkpb', $id)->first();
         $spb->id_pb = $request->get('pemborong_upt');
         $spb->id_spkc = $request->get('spkc_upt');
         //$spb->id_pbb = $request->get('pbb_upt');
         $spb->tgl_spkpb = $request->get('tgl_upt');
         $spb->ukuran_karoseri = $request->get('ukuran_karoseri_upt');
         $spb->harga_borongan = $request->get('harga_borongan_upt');
         $spb->keterangan_spkpb = $request->get('keterangan_upt');
         $spb->save();

         return redirect('/spkpb');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $spkpb = SPKPB::where('id_spkpb', $id)->update(['status_spkpb' => 'CANCELED']);
      return redirect('/spkpb');
    }

    public function acc($id)
    {
      $data = SPKPB::where('id_spkpb', $id)->update(['status_spkpb' => 'ACCEPTED']);
      return redirect('/spkpb');
    }

    public function data(Datatables $datatables)
    {
        $kasbon = DB::statement('SELECT * FROM kasbon_tabels');
        return $datatables->eloquent(ViewSPKPB::selectRaw('*, MIN(sisa_borongan) AS sb')->groupBy('id_spkpb')->orderBy('id_spkpb', 'asc'))
                          ->addColumn('action', function ($pp) {
                            if($pp->status_spkpb == 'PENDING')
                            {
                              return
                              '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkpb.'"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                              <a class="btn btn-info" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pp->id_spkpb.'"
                              data-namapb="'.$pp->id_pb.'"
                              data-jabatan="'.$pp->jenis_pb.'"
                              data-harga="'.$pp->harga_borongan.'"
                              data-idspkc="'.$pp->id_spkc.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-ukuran="'.$pp->ukuran_karoseri.'"
                              data-idpbb="'.$pp->id_pbb.'"
                              data-tanggal="'.$pp->tgl_spkpb.'"
                              data-keterangan="'.$pp->keterangan_spkpb.'"><i class="glyphicon glyphicon-edit"></i> Edit &nbsp;</a>

                              <a class="btn btn-success" data-toggle="modal" data-target="#accModal"
                              data-id="'.$pp->id_spkpb.'"
                              data-namapb="'.$pp->nm_pb.'"
                              data-jabatan="'.$pp->jenis_pb.'"
                              data-harga="'.$pp->harga_borongan.'"
                              data-idspkc="'.$pp->id_spkc.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-ukuran="'.$pp->ukuran_karoseri.'"
                              data-idpbb="'.$pp->id_pbb.'"
                              data-tanggal="'.$pp->tgl_spkpb.'"
                              data-keterangan="'.$pp->keterangan_spkpb.'"><i class="glyphicon glyphicon-send"></i> Action</a>

                              ';

                            }
                            else if($pp->status_spkpb == 'ACCEPTED'){
                              if($pp->vote_qc == 0){
                              return
                              '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkpb.'"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                              <a href="'.route('printspkpb', [$pp->id_spkpb, 'idspkpb' => $pp->id_spkpb]).'" target="_blank" class="btn btn-primary"
                              data-id="'.$pp->id_spkpb.'"
                              data-namapb="'.$pp->nm_pb.'"
                              data-jabatan="'.$pp->jenis_pb.'"
                              data-harga="'.$pp->harga_borongan.'"
                              data-idspkc="'.$pp->id_spkc.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-ukuran="'.$pp->ukuran_karoseri.'"
                              data-idpbb="'.$pp->id_pbb.'"
                              data-tanggal="'.$pp->tgl_spkpb.'"
                              data-keterangan="'.$pp->keterangan_spkpb.'"
                              data-sisa="'.$pp->sb.'"><i class="glyphicon glyphicon-search"></i> View</a>

                              <a data-toggle="modal" data-target="#tanggalModal" class="btn btn-success"
                              data-id="'.$pp->id_spkpb.'"
                              data-namapb="'.$pp->nm_pb.'"
                              data-jabatan="'.$pp->jenis_pb.'"
                              data-harga="'.$pp->harga_borongan.'"
                              data-idspkc="'.$pp->id_spkc.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-ukuran="'.$pp->ukuran_karoseri.'"
                              data-idpbb="'.$pp->id_pbb.'"
                              data-tanggal="'.$pp->tgl_spkpb.'"
                              data-keterangan="'.$pp->keterangan_spkpb.'"
                              data-sisa="'.$pp->sb.'"><i class="glyphicon glyphicon-plus-sign"></i> QC</a>';
                            }
                            else if($pp->vote_qc == 1){
                            return
                            '<a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkpb.'"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                            <a href="'.route('printspkpb', [$pp->id_spkpb, 'idspkpb' => $pp->id_spkpb]).'" target="_blank" class="btn btn-primary"
                            data-id="'.$pp->id_spkpb.'"
                            data-namapb="'.$pp->nm_pb.'"
                            data-jabatan="'.$pp->jenis_pb.'"
                            data-harga="'.$pp->harga_borongan.'"
                            data-idspkc="'.$pp->id_spkc.'"
                            data-jenis="'.$pp->jenis_karoseri.'"
                            data-ukuran="'.$pp->ukuran_karoseri.'"
                            data-idpbb="'.$pp->id_pbb.'"
                            data-tanggal="'.$pp->tgl_spkpb.'"
                            data-keterangan="'.$pp->keterangan_spkpb.'"
                            data-sisa="'.$pp->sb.'"><i class="glyphicon glyphicon-search"></i> View</a>';
                          }

                            }
                            })
                            ->addColumn('tgl_spkpb', function($pp){
                              $blnindo = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
                              $tanggal = $pp->tgl_spkpb;
                              $tahun = date('Y', strtotime($tanggal));
                              $bulan = date('m', strtotime($tanggal));
                              $tgl = date('d', strtotime($tanggal));

                              $fix = $tgl.' '.$blnindo[$bulan-1].' '.$tahun;

                              return $fix;
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
                            ->addColumn('status_spkpb', function($pp){
                                if($pp->status_spkpb == 'ACCEPTED'){
                                    return '<div class="btn btn-block bg-green">'.$pp->status_spkpb.'</div>';
                                }
                                else if($pp->status_spkpb == 'PENDING'){
                                    return '<div class="btn btn-block bg-yellow">'.$pp->status_spkpb.'</div>';
                                }
                                else if($pp->status_spkpb == 'CANCELED'){
                                    return '<div class="btn btn-block bg-red">'.$pp->status_spkpb.'</div>';
                                }
                            })
                            ->rawColumns(['status_spkpb','action'])

                          ->make(true);
    }
}
