<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use Yajra\Datatables\Datatables;

class SupplierController extends Controller
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
        return view('master.suplier');
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
        $supplier = new Supplier();
        $supplier->nama_supplier = $request->get('nama');
        $supplier->alamat_supplier = $request->get('alamat');
        $supplier->telepon_supplier = $request->get('telepon');
        $supplier->email_supplier = $request->get('email');
        $supplier->bank_supplier = $request->get('bank');
        $supplier->norek_supplier = $request->get('norek');
        $supplier->status_supplier = "Aktif";
        $supplier->save();
        return redirect('master/supplier');
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
        $supplier = Supplier::where('id_supplier',$id)->first();
        $supplier->nama_supplier = $request->get('nama');
        $supplier->alamat_supplier = $request->get('alamat');
        $supplier->telepon_supplier = $request->get('telepon');
        $supplier->email_supplier = $request->get('email');
        $supplier->bank_supplier = $request->get('bank');
        $supplier->norek_supplier = $request->get('norek');
        $supplier->save();
        return redirect('master/supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $supplier = Supplier::where('id_supplier',$id)->first();
        $supplier->status_supplier="tidak Aktif";
        $supplier->save();
        return redirect('master/supplier');
    }

        /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Supplier::where('status_supplier','Aktif'))
                          ->addColumn('action', function ($supplier) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$supplier->id_supplier.'" data-name="'.$supplier->nama_supplier.'"
                              data-alamat="'.$supplier->alamat_supplier.'" data-telepon="'.$supplier->telepon_supplier.'" data-email="'.$supplier->email_supplier.'" data-bank="'.$supplier->bank_supplier.'"
                              data-norek="'.$supplier->norek_supplier.'" data-status="'.$supplier->status_supplier.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$supplier->id_supplier.'" data-name="'.$supplier->nama_supplier.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
