<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Satuan;
use Yajra\Datatables\Datatables;

class SatuanController extends Controller
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
        return view('master.satuan');
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
        $request->validate([
            'nama' => 'bail|required|unique:produks|max:255',
            'jumlah' => 'required',
            'status' => 'required',
        ]);
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->get('nama');
        $satuan->tipe_satuan = $request->get('jumlah');
        $satuan->status_satuan = $request->get('status');
        $satuan->save();
        return redirect('master/satuan');
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
        $request->validate([
            'nama' => 'bail|required|unique:produks|max:255',
            'jumlah' => 'required',
            'status' => 'required',
        ]);
        $satuan = Satuan::find($id);
        $satuan->nama_satuan = $request->get('nama');
        $satuan->tipe_satuan = $request->get('jumlah');
        $satuan->status_satuan = $request->get('status');
        $satuan->save();
        return redirect('master/satuan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuan = Satuan::find($id);
        $satuan->delete();
        return redirect('master/satuan');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Satuan::query())
                          ->addColumn('action', function ($satuan) {
                              return 
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$satuan->id_satuan.'" data-name="'.$satuan->nama_satuan.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$satuan->id_satuan.'" data-name="'.$satuan->nama_satuan.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
