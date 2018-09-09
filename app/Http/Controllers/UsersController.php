<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\UserLokasi;
use App\Lokasi;
use DB;
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
            'name' => $request->get('name'),
            'id_lokasi' => 0,
            'id_bo' => $request->get('bo'),
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
        $datas = User::select(DB::raw("users.id_user,users.name,users.email, GROUP_CONCAT(master_lokasis.nm_lokasi SEPARATOR ', ') as nm_lokasi"))
                    ->join('users_lokasi','users_lokasi.id_user','=','users.id_user')
                    ->join('master_lokasis','master_lokasis.id_lokasi','=','users_lokasi.id_lokasi')
                    ->groupBy('users.id_user','users.name','users.email')
                    ->get();
        return $datatables->of($datas)
                          ->editColumn('name', function ($user) {
                              return '<a>' . $user->name . '</a>';
                          })
                          ->addColumn('action', function ($user) {
                              return '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id='.$user->id_user.'><i class="glyphicon glyphicon-edit"></i> Hapus</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id='.$user->id_user.'><i class="glyphicon glyphicon-remove"></i> Hapus</a>';
                            })
                          ->rawColumns(['name', 'action'])
                          ->make(true);
    }
}