<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supervisor;
use Yajra\Datatables\Datatables;

class SupervisorController extends Controller
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
        return view('master.supervisor');
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
      $spv = new Supervisor;
      $spv->nm_spv = $request->get('nm_spv');
      $spv->alamat_spv = $request->get('alamat_spv');
      $spv->no_hp = $request->get('no_hp');
      $spv->save();

      return redirect('/supervisor');
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
        $spv = Supervisor::where('id_spv', $id)->first();
        $spv->nm_spv = $request->get('nm_spv_upt');
        $spv->alamat_spv = $request->get('alamat_spv_upt');
        $spv->no_hp = $request->get('no_hp_upt');
        $spv->save();

        return redirect('/supervisor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $spv = Supervisor::where('id_spv', $id)->update(['status' => 0]);
      return redirect('/supervisor');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Supervisor::where('status', '1'))
                          ->addColumn('action', function ($spv) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$spv->id_spv.'"
                              data-name="'.$spv->nm_spv.'"
                              data-alamat="'.$spv->alamat_spv.'"
                              data-nohp="'.$spv->no_hp.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$spv->id_spv.'" data-name="'.$spv->nm_spv.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
