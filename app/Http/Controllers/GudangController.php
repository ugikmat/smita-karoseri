<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gudang;
use Yajra\Datatables\Datatables;


class GudangController extends Controller
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
        return view('master.gudang');
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
      /*$customer = new Customer;

      $customer->id_cust = $request->get('id_cust');
      $customer->nm_cust = $request->get('nm_cust');
      $customer->alamat_cust = $request->get('alamat_cust');
      $customer->no_hp = $request->get('no_hp');
      $customer->jabatan = $request->get('jabatan');
      $customer->save();

      return redirect('/customer');
      */
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
        return $datatables->eloquent(Gudang::query())
                          ->addColumn('action', function ($gdg) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$gdg->id_gudang.'" data-name="'.$gdg->nm_gudang.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$gdg->id_gudang.'" data-name="'.$gdg->nm_gudang.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
