<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\UserLokasi;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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

    public function add()
    {
        return view ('/tambah_user/add-user');
    }

    public function store(Request $request)
    {
        $user = User::create([
            'username' => $request->get('username'),
            'name' => $request->get('username'),
            'id_lokasi' => 0,
            'id_bo' => 0,
            'level_user' => $request->get('level'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        $lokasi = $request->get('lokasi-user');
        foreach ($lokasi as $key => $value) {
            UserLokasi::create([
                'id_lokasi' => $value['lokasi'],
                'id_user' => $user->id_user
            ]);
        }
        return redirect ('/tambah_user/add-user');
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