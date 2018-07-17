<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Lokasi;
use Yajra\Datatables\Datatables;

class LokasiController extends Controller
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
        return view('master.lokasi');
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
      $lok = new Lokasi;

      $lok->id_lokasi = $request->get('id_lokasi');
      $lok->nm_lokasi = $request->get('nm_lokasi');
      $lok->save();

      return redirect('/lokasi');
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
        return $datatables->eloquent(Lokasi::query())
                          ->addColumn('action', function ($lok) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$lok->id_lokasi.'" data-name="'.$lok->nm_lokasi.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$lok->id_lokasi.'" data-name="'.$lok->nm_lokasi.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
