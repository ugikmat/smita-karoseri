<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Bank;
use Yajra\Datatables\Datatables;

class BankController extends Controller
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
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('master.bank');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
        ]);
        $bank = new Bank();
        $bank->nama_bank = $request->get('nama');
        $bank->kode_bank = $request->get('kode');
        $bank->status_bank = "Aktif";
        $bank->save();
        return redirect('/master/bank');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
        ]);
        $bank = Bank::find($id);
        $bank->nama_bank = $request->get('nama');
        $bank->kode_bank = $request->get('kode');;
        $bank->save();
        return redirect('/master/bank');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $bank = Bank::where('id_bank',$id)->first();
        $bank->status_bank = "non Aktif";
        $bank->save();
        return redirect('/operasional/smita/master/bank');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Bank::where('status_bank','Aktif'))
                          ->addColumn('action', function ($bank) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$bank->id_bank.'" data-name="'.$bank->nama_bank.'" data-kode="'.$bank->kode_bank.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$bank->id_bank.'" data-name="'.$bank->nama_bank.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }
}
