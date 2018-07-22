<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemborong;
use Yajra\Datatables\Datatables;

class PemborongController extends Controller
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
        return view('master.pemborong');
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
      $pb = new Pemborong;
      $pb->nm_pb = $request->get('nm_pb');
      $pb->jenis_pb = $request->get('jenis_pb');
      $pb->jml_ang = $request->get('jml_ang');
      $pb->save();

      return redirect('/pemborong');
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
        $pb = Pemborong::where('id_pb', $id)->first();
        $pb->nm_pb = $request->get('nm_pb_upt');
        $pb->jenis_pb = $request->get('jenis_pb_upt');
        $pb->jml_ang = $request->get('jml_ang_upt');
        $pb->save();

        return redirect('/pemborong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $pb = Pemborong::where('id_pb', $id)->update(['status' => 0]);
      return redirect('/pemborong');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Pemborong::where('status', '1'))
                          ->addColumn('action', function ($pb) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$pb->id_pb.'"
                              data-name="'.$pb->nm_pb.'"
                              data-jenis="'.$pb->jenis_pb.'"
                              data-jml="'.$pb->jml_ang.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$pb->id_pb.'" data-name="'.$pb->nm_pb.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
