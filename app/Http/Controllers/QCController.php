<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produksi;
use App\ProduksiDetail;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class QCController extends Controller
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
         return view('karoseri.print_qc');
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

      $files = $request->file('uploadedfiles');
      $var = "";
      foreach ($files as $f) {
        $filename = $f->getClientOriginalName();
        $f->move('public/upload', $filename);

        $var = $var.$filename.';';
      }
        $qc = new ProduksiDetail;

        $qc->id_produksi = $request->get('id_produksi_get');
        $qc->kegiatan = $request->get('progress');
        $qc->tgl_jam = $request->get('dtp_input1');
        $qc->foto_pengerjaan = $var;
        $qc->save();

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
    public function view($id)
    {
      $dl = base_path('public/public/upload/'.$id);

      foreach(explode(';', $dl) as $ds){

        return response()->file($ds);
      }
    }
    public function data(Datatables $datatables, $id)
      {
          return $datatables->eloquent(ProduksiDetail::where('id_produksi', $id))
                            ->addColumn('foto_pengerjaan', function($pp){
                               return '<a href="'.route('view', [$pp->foto_pengerjaan]).'" target="_blank">'.$pp->foto_pengerjaan.'</a>';
                            })->rawColumns(['foto_pengerjaan'])
                            ->make(true);
      }
}
