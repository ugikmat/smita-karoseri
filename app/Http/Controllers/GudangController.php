<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gudang;
use App\View\ViewGudang;
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
         $this->middleware(['auth','head']);
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
      $gdg = new Gudang;

      $gdg->id_lokasi = $request->get('id_lokasi');
      $gdg->alamat_gudang = $request->get('alamat_gudang');
      $gdg->save();

      return redirect('/gudang');

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
      $gdg = Gudang::where('id_gudang', $id)->first();
      $gdg->id_lokasi = $request->get('id_lokasi_upt');
      $gdg->alamat_gudang = $request->get('alamat_gudang_upt');
      $gdg->save();

      return redirect('/gudang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $gdg = Gudang::where('id_gudang', $id)->update(['status' => 0]);
      return redirect('/gudang');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(ViewGudang::where('status', '1'))
                          ->addColumn('action', function ($gdg) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$gdg->id_gudang.'"
                              data-name="'.$gdg->alamat_gudang.'"
                              data-lokasi="'.$gdg->nm_lokasi.'"
                              ><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$gdg->id_gudang.'" data-name="'.$gdg->alamat_gudang.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
