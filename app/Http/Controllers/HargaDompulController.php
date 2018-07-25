<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HargaDompul;
use App\TipeDompul;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class HargaDompulController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
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
        $tipes = TipeDompul::where('status_tipe_dompul','Aktif')->get();
        return view('master.harga_dompul',['tipes'=>$tipes]);
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
        $hargaProduk = new HargaDompul();
        $hargaProduk->nama_harga_dompul = $request->get('nama');
        $hargaProduk->tipe_harga_dompul = $request->get('tipe');
        $hargaProduk->harga_dompul = $request->get('harga');
        $hargaProduk->tanggal_update = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $hargaProduk->status_harga_dompul = "Aktif";
        $hargaProduk->save();
        return redirect('/master/harga_dompul');
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
        $hargaProduk = HargaDompul::where('id_harga_dompul',$id)->first();
        $hargaProduk->nama_harga_dompul = $request->get('nama');
        $hargaProduk->tipe_harga_dompul = $request->get('tipe');
        $hargaProduk->harga_dompul = $request->get('harga');
        $hargaProduk->tanggal_update = Carbon::now('Asia/Jakarta')->toDateTimeString();
        $hargaProduk->save();
        return redirect('/master/harga_dompul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hargaProduk = HargaDompul::where('id_harga_dompul',$id)->first();
        $hargaProduk->status_harga_dompul = "Non Aktif";
        $hargaProduk->save();
        return redirect('/master/harga_dompul');
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(HargaDompul::where('status_harga_dompul','Aktif'))
                          ->addColumn('action', function ($hargaDompul) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$hargaDompul->id_harga_dompul.'" 
                              data-nama="'.$hargaDompul->nama_harga_dompul.'"
                              data-tipe="'.$hargaDompul->tipe_harga_dompul.'"
                              data-harga="'.$hargaDompul->harga_dompul.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$hargaDompul->id_harga_dompul.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
