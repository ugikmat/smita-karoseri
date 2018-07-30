<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Sales;
use App\Lokasi;
use Yajra\Datatables\Datatables;


class SalesController extends Controller
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
        $lokasis = Lokasi::all();
        return view('master.sales',['lokasis'=>$lokasis]);
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
      $sales = new Sales;

      $sales->nm_sales = $request->get('nm_sales');
      $sales->alamat_sales = $request->get('alamat_sales');
      $sales->no_hp = $request->get('no_hp');
      $sales->save();

      return redirect('/sales');
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
      $sales = Sales::where('id_sales', $id)->first();
      $sales->nm_sales = $request->get('nm_sales_upt');
      $sales->alamat_sales = $request->get('alamat_sales_upt');
      $sales->no_hp = $request->get('no_hp_upt');
      $sales->save();

      return redirect('/sales');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $sales = Sales::where('id_sales', $id)->update(['status' => 0]);
      return redirect('/sales');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Sales::where('status', '1'))
                          ->addColumn('action', function ($sales) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$sales->id_sales.'"
                              data-name="'.$sales->nm_sales.'"
                              data-alamat="'.$sales->alamat_sales.'"
                              data-nohp="'.$sales->no_hp.'"
                              ><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$sales->id_sales.'" data-name="'.$sales->nm_sales.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
