<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dompul;
use Yajra\Datatables\Datatables;

class DompulController extends Controller
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
        return view('master.dompul');
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
        $dompul = new Dompul();
        $dompul->no_hp_master_dompul =$request->get('hp-master');
        $dompul->no_hp_sub_master_dompul =$request->get('hp-sub');
        $dompul->id_gudang =$request->get('id-gudang');
        $dompul->nama_sub_master_dompul =$request->get('nama-sub');
        $dompul->tipe_dompul =$request->get('tipe');
        $dompul->status_sub_master_dompul ="Aktif";
        $dompul->save();
        return redirect('master/dompul');
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
        $dompul = Dompul::where('id_dompul',$id)->first();
        $dompul->no_hp_master_dompul =$request->get('hp-master');
        $dompul->no_hp_sub_master_dompul =$request->get('hp-sub');
        $dompul->id_gudang =$request->get('id-gudang');
        $dompul->nama_sub_master_dompul =$request->get('nama-sub');
        $dompul->tipe_dompul =$request->get('tipe');
        $dompul->save();
        return redirect('master/dompul');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dompul = Dompul::where('id_dompul',$id)->first();
        $dompul->status_sub_master_dompul="Non Aktif";
        $dompul->save();
        return redirect('master/dompul');

    }

     /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Dompul::where('status_sub_master_dompul',"Aktif"))
                          ->addColumn('action', function ($dompul) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$dompul->id_dompul.'" data-hp-master="'.$dompul->no_hp_master_dompul.'" data-hp-sub="'.$dompul->no_hp_sub_master_dompul.'" data-gudang="'.$dompul->id_gudang.'" data-nama-sub="'.$dompul->nama_sub_master_dompul.'" data-tipe="'.$dompul->tipe_dompul.'" data-status="'.$dompul->status_sub_master_dompul.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$dompul->id_dompul.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
