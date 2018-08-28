<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PPN;
use Yajra\Datatables\Datatables;

class PPNController extends Controller
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
        return view('master.ppn');
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
      $ppn = new PPN();
      $ppn->jenis_ppn = $request->get('tambah_jenis');
      $ppn->save();
      return redirect()->back();
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
      $ppn = PPN::where('id_ppn', $id)->first();
      $ppn->jenis_ppn = $request->get('jenis');
      $ppn->save();
      return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ppn = PPN::where('id_ppn', $id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(PPN::where('status', '1'))
                          ->addColumn('action', function ($cb) {
                              return
                              '<a class="btn btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$cb->id_ppn.'" data-name="'.$cb->jenis_ppn.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$cb->id_ppn.'" data-name="'.$cb->jenis_ppn.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
