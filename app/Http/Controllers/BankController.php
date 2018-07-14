<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
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
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(Bank::query())
                          ->addColumn('action', function ($user) {
                              return 
                              '<a " class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a " class="btn btn-xs btn-danger" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })

                          ->make(true);
    }
}
