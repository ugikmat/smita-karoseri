<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use Yajra\Datatables\Datatables;

class CustController extends Controller
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
        return view('master.customer');
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
        $customer = new Customer;
        $customer->nm_cust = $request->get('nm_cust');
        $customer->alamat_cust = $request->get('alamat_cust');
        $customer->no_hp = $request->get('no_hp');
        $customer->jabatan = $request->get('jabatan');
        $customer->save();

        return redirect('/customer')->with('alert', 'Berhasil Tambah Customer');

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
        $customer = Customer::where('id_cust', $id)->first();
        $customer->nm_cust = $request->get('nm_cust_upt');
        $customer->alamat_cust = $request->get('alamat_cust_upt');
        $customer->no_hp = $request->get('no_hp_upt');
        $customer->jabatan = $request->get('jabatan_upt');
        $customer->save();

        return redirect('/customer');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cust = Customer::where('id_cust', $id)->update(['status' => 0]);
        return redirect('/customer');
    }

    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Customer::where('status', '1'))
                          ->addColumn('action', function ($cust) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal"
                              data-id="'.$cust->id_cust.'"
                              data-name="'.$cust->nm_cust.'"
                              data-alamat="'.$cust->alamat_cust.'"
                              data-nohp="'.$cust->no_hp.'"
                              data-jabatan="'.$cust->jabatan.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$cust->id_cust.'" data-name="'.$cust->nm_cust.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
