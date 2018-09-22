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
        $this->middleware(['auth','kasir']);
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
        $produk = new produk();
        $produk->nama_produk = $request->get('nama');
        $produk->kode_produk = $request->get('kode');
        $produk->kategori_produk = $request->get('kategori');
        $produk->satuan = $request->get('satuan');
        $produk->jenis = $request->get('jenis');
        $produk->BOM = $request->get('bom');
        $produk->harga_jual = $request->get('jual');
        $produk->tarif_pajak = $request->get('pajak');
        $produk->diskon = $request->get('diskon');
        $produk->komisi = $request->get('komisi');
        $produk->status_produk = 1;
        $produk->save();
        return redirect('/operasional/smita/master/produk');
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
        // $request->validate([
        //     'nama' => 'bail|required|unique:produks|max:255',
        //     'tipe' => 'required',
        //     'status' => 'required',
        // ]);
        $produk = produk::where('id_produk',$id)->first();
        $produk->nama_produk = $request->get('nama');
        $produk->kode_produk = $request->get('kode');
        $produk->kategori_produk = $request->get('kategori');
        $produk->satuan = $request->get('satuan');
        $produk->jenis = $request->get('jenis');
        $produk->BOM = $request->get('bom');
        $produk->harga_jual = $request->get('jual');
        $produk->tarif_pajak = $request->get('pajak');
        $produk->diskon = $request->get('diskon');
        $produk->komisi = $request->get('komisi');
        $produk->save();
        return redirect('/operasional/smita/master/produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = produk::where('id_produk',$id)->first();
        $produk->status_produk = 0;
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
        return $datatables->eloquent(produk::where('status_produk', 1))
                          ->addColumn('action', function ($produk) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$produk->id_produk.'" data-name="'.$produk->nama_produk.'"
                              data-kode="'.$produk->kode_produk.'" data-status="'.$produk->status_produk.'" data-kategori="'.$produk->kategori_produk.'" data-satuan="'.$produk->satuan.'"
                              data-jenis="'.$produk->jenis.'" data-bom="'.$produk->BOM.'" data-jual="'.$produk->harga_jual.'" data-pajak="'.$produk->tarif_pajak.'"
                              data-diskon="'.$produk->diskon.'" data-komisi="'.$produk->komisi.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$produk->id_produk.'" data-name="'.$produk->nama.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
