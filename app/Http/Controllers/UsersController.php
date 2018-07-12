<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Yajra\Datatables\Datatables;

class UsersController extends Controller
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
        return view('user_list');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(User::query())
                          ->editColumn('name', function ($user) {
                              return '<a>' . $user->name . '</a>';
                          })
                          ->addColumn('action', function ($user) {return '<a href="#edit-'.$user->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';})
                          ->rawColumns(['name', 'action'])
                          ->make(true);
    }
}