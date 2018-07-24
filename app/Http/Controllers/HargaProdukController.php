<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HargaProduk;
use App\TipeDompul;
use Yajra\Datatables\Datatables;

class HargaProdukController extends Controller
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
        return view('master.harga_produk',['tipes'=>$tipes]);
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
        $hargaProduk = new HargaProduk();
        $hargaProduk->id_produk = $request->get('id');
        $hargaProduk->tipe_harga_sp = $request->get('tipe');
        $hargaProduk->harga_sp = $request->get('harga');
        $hargaProduk->status_harga_sp = "Aktif";
        $hargaProduk->save();
        return redirect('/master/harga_produk');
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
        $hargaProduk = HargaProduk::where('id_harga_sp',$id)->first();
        $hargaProduk->id_produk = $request->get('id');
        $hargaProduk->tipe_harga_sp = $request->get('tipe');
        $hargaProduk->harga_sp = $request->get('harga');
        $hargaProduk->save();
        return redirect('/master/harga_produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hargaProduk = HargaProduk::where('id_harga_sp',$id)->first();
        $hargaProduk->status_harga_sp = "Non Aktif";
        $hargaProduk->save();
        return redirect('/master/harga_produk');
    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(HargaProduk::where('status_harga_sp','Aktif'))
                          ->addColumn('action', function ($hargaProduk) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$hargaProduk->id_harga_sp.'" data-id_produk="'.$hargaProduk->id_produk.'" data-tipe="'.$hargaProduk->tipe_harga_sp.'" data-harga="'.$hargaProduk->harga_sp.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$hargaProduk->id_harga_sp.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
