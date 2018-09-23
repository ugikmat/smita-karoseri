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
        $this->middleware(['auth','head']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuans = Satuan::where('status_satuan','tersedia')->get();
        return view('master.satuan',['satuans'=>$satuans]);
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
        $satuan = new Satuan();
        $satuan->nama_satuan = $request->get('nama');
        $satuan->tipe_satuan = $request->get('tipe');
        if ($request->get('induk') == 'other') {
            $satuan->induk_satuan = $request->get('other');
        }else {
            $satuan->induk_satuan = $request->get('induk');
        }
        $satuan->nilai_konversi = $request->get('nilai');
        $satuan->status_satuan = "tersedia";
        $satuan->save();
        return redirect('/satuan');
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

        $satuan = Satuan::where('id_satuan', $id)->first();
        $satuan->nama_satuan = $request->get('nama');
        $satuan->tipe_satuan = $request->get('tipe');
        if ($request->get('induk') == 'other') {
            $satuan->induk_satuan = $request->get('other');
        }else {
            $satuan->induk_satuan = $request->get('induk');
        }
        $satuan->nilai_konversi = $request->get('nilai');
        $satuan->save();
        return redirect('/master/satuan');
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
        $satuan->status_satuan="tidak tersedia";
        $satuan->save();
        return redirect('/master/satuan');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Satuan::where('status_satuan','tersedia'))
                          ->addColumn('action', function ($satuan) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$satuan->id_satuan.'" data-name="'.$satuan->nama_satuan.'"
                              data-tipe="'.$satuan->tipe_satuan.'" data-induk="'.$satuan->induk_satuan.'" data-nilai="'.$satuan->nilai_konversi.'" data-status="'.$satuan->status_satuan.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$satuan->id_satuan.'" data-name="'.$satuan->nama_satuan.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
