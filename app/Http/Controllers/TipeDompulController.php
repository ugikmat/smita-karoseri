<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TipeDompul;
use Yajra\Datatables\Datatables;

class TipeDompulController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','head']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('master.tipe_dompul');
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
        $tipeDompul = new TipeDompul();
        $tipeDompul->tipe_dompul = $request->get('tipe');
        $tipeDompul->save();
        return redirect('/master/tipe_dompul');
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
        $tipeDompul = TipeDompul::where('id_tipe_dompul',$id)->first();
        $tipeDompul->tipe_dompul = $request->get('tipe');
        $tipeDompul->status_tipe_dompul = "Aktif";
        $tipeDompul->save();
        return redirect('/master/tipe_dompul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipeDompul = TipeDompul::where('id_tipe_dompul',$id)->first();
        $tipeDompul->status_tipe_dompul = "Non Aktif";
        $tipeDompul->save();
        return redirect('/master/tipe_dompul');
    }
       /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(TipeDompul::where('status_tipe_dompul','Aktif'))
                          ->addColumn('action', function ($tipeDompul) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$tipeDompul->id_tipe_dompul.'" data-tipe="'.$tipeDompul->tipe_dompul.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$tipeDompul->id_tipe_dompul.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
