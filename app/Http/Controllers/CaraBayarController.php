<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CaraBayar;
use Yajra\Datatables\Datatables;

class CaraBayarController extends Controller
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
        return view('master.cara_bayar');
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
      $cb = new CaraBayar;

      $cb->keterangan = $request->get('keterangan');
      $cb->save();

      return redirect('/carabayar');
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
      $cb = CaraBayar::where('id', $id)->first();
      $cb->keterangan = $request->get('keterangan_upt');
      $cb->save();

      return redirect('/carabayar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cb = CaraBayar::where('id', $id)->update(['status' => 0]);
      return redirect('/carabayar');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(CaraBayar::where('status', '1'))
                          ->addColumn('action', function ($cb) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$cb->id.'" data-name="'.$cb->keterangan.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$cb->id.'" data-name="'.$cb->keterangan.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
