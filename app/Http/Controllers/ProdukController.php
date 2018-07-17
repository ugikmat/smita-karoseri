<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\produk;
use Yajra\Datatables\Datatables;

class ProdukController extends Controller
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
        return view('master.produk');
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
        $request->validate([
            'nama' => 'bail|required|unique:produks|max:255',
            'tipe' => 'required',
            'status' => 'required',
        ]);
        $produk = new produk();
        $produk->nama = $request->get('nama');
        $produk->tipe = $request->get('tipe');
        $produk->status = $request->get('status');
        $produk->save();
        return redirect('master/produk');
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
        $request->validate([
            'nama' => 'bail|required|unique:produks|max:255',
            'tipe' => 'required',
            'status' => 'required',
        ]);
        $produk = produk::find($id);
        $produk->nama = $request->get('nama');
        $produk->tipe = $request->get('tipe');
        $produk->status = $request->get('status');
        $produk->save();
        return redirect('master/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = produk::find($id);
        $produk->status = "tidak tersedia";
        $produk->save();
        return redirect('master/produk');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {   
        return $datatables->eloquent(produk::where('status', "tersedia"))
                          ->addColumn('action', function ($produk) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$produk->id.'" data-name="'.$produk->nama.'" data-tipe="'.$produk->tipe.'" data-status="'.$produk->status.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$produk->id.'" data-name="'.$produk->nama.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
