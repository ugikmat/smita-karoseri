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
        return view('/master/user');
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

    public function update(Request $request)
    {
        $user = User::where('id_user',$request->get('id'))->first();
        if(Hash::check($request->get('oldpassword'), $user->password)&&$request->get('password')==$request->get('konfirmasi')){
            $user->password=Hash::make($request->get('password'));
            $user->save();
            $error='Berhasil';
        }else{
            $error='Iya Error';
        }
        User::where('id_user',$request->get('id'))->update([
            'username' => $request->get('username'),
            'name' => $request->get('name'),
            // 'id_lokasi' => 0,
            'id_bo' => $request->get('bo'),
            'level_user' => $request->get('level'),
            'email' => $request->get('email'),
            ]);
        return redirect ('/master/user')->with(['error'=>$error]);
    }

    public function delete($id)
    {
        User::where('id_user',$id)->update(['deleted'=>1]);
        return redirect ('/master/user');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        $datas = User::select(DB::raw("users.id_user,users.name,users.id_bo,users.username,users.level_user,users.email, GROUP_CONCAT(master_lokasis.nm_lokasi SEPARATOR ', ') as nm_lokasi"))
                    ->leftJoin('users_lokasi','users_lokasi.id_user','=','users.id_user')
                    ->leftJoin('master_lokasis','master_lokasis.id_lokasi','=','users_lokasi.id_lokasi')
                    ->where('users.deleted',0)
                    ->groupBy('users.id_user','users.name','users.email','users.username','users.level_user','users.id_bo')
                    ->get();
        return $datatables->of($datas)
                          ->editColumn('name', function ($user) {
                              return '<a>' . $user->name . '</a>';
                          })
                          ->addColumn('action', function ($user) {
                              $lokasi = UserLokasi::where('id_user',$user->id_user)->get();
                              return "<a class='btn btn-xs btn-primary' data-toggle='modal' data-target='#editModal' data-id='$user->id_user' data-lokasi='$lokasi' data-user='$user'><i class='glyphicon glyphicon-edit'></i> Edit</a>
                              <a class='btn btn-xs btn-danger' data-toggle='modal' data-target='#deleteModal' data-id='$user->id_user'><i class='glyphicon glyphicon-remove'></i> Hapus</a>";
                            })
                          ->rawColumns(['name', 'action'])
                          ->make(true);
    }
}