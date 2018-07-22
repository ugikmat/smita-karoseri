<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SPKC;
use Yajra\Datatables\Datatables;
use App\Customer;
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
      $spkc = SPKC::where('id_spkc', $id)->update(['status' => 'CANCELED']);
      return redirect('/spkc');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(SPKC::select(DB::raw('spkcs.*, master_customers.nm_cust, master_customers.jabatan, master_customers.alamat_cust'))
                          ->join('master_customers', 'spkcs.id_cust', '=', 'master_customers.id_cust')
                          ->where('spkcs.vote', 1)
                          ->where(function ($query) {
                              $query->where('spkcs.status', 'ACCEPTED')
                                    ->orWhere('spkcs.status', 'CANCELED');
                                  })
                          )
                          ->addColumn('action', function ($pp) {
                            if($pp->status == 'ACCEPTED'){
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pp->id_spkc.'"
                              data-name="'.$pp->nm_cust.'"
                              data-nameperusahaan="'.$pp->nm_perusahaan.'"
                              data-jabatan="'.$pp->jabatan.'"
                              data-jenis="'.$pp->jenis_karoseri.'"
                              data-unit="'.$pp->jumlah_unit.'"
                              data-harga="'.$pp->harga_unit.'"
                              data-total="'.$pp->harga_total.'"
                              data-ket="'.$pp->ket.'"
                              data-bank="'.$pp->id_bank.'"
                              data-alamat="'.$pp->alamat_cust.'"
                              data-tanggal="'.$pp->tanggal.'"
                              data-status="'.$pp->status.'"><i class="glyphicon glyphicon-edit"></i> Check</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pp->id_spkc.'" data-name="'.$pp->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Cancel</a>';
                            }
                            else{

                            }
                            })

                          ->make(true);
    }
}
