<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\UserLokasi;
use App\Lokasi;
use DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth','head']);
    }
    /**
     * Display index page.
     *
     * @return \BladeView|bool|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // if (Auth::user()->level_user!='Super Admin') {
        //     return redirect('/');
        // }
        return view('/master/user');
    }

    public function edit($id)
    {
        $datas = User::select(DB::raw("users.id_user,users.name,users.id_bo,users.username,users.level_user,users.email, GROUP_CONCAT(master_lokasis.nm_lokasi SEPARATOR ', ') as nm_lokasi"))
                    ->leftJoin('users_lokasi','users_lokasi.id_user','=','users.id_user')
                    ->leftJoin('master_lokasis','master_lokasis.id_lokasi','=','users_lokasi.id_lokasi')
                    ->where('users.id_user',$id)
                    ->where('users.deleted',0)
                    // ->where('master_lokasis.deleted',0)
                    ->where('users_lokasi.deleted',0)
                    ->groupBy('users.id_user','users.name','users.email','users.username','users.level_user','users.id_bo')
                    ->first();
        $lokasi = UserLokasi::select('id_lokasi')->where('id_user',$id)->first();
        $lokasi_data = UserLokasi::select('id_lokasi','id_users_lokasi')->where('id_user',$id)
        ->where('deleted',0)->get();
        return view('/user/user-edit',['data'=>$datas,'lokasi'=>$lokasi,'lokasi_data'=>$lokasi_data]);
    }

    public function add()
    {
        return view ('/tambah_user/add-user');
    }

    public function store(Request $request)
    {
        if($request->get('password')!=$request->get('konfirmasi')){
            return redirect()->back();
        }
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
        return redirect ('/master/user');
    }

    public function getData($id){
        $lokasi = UserLokasi::where('id_user',$id)->get();
        return response()->json(['success' => true, 'lokasi' => $lokasi]);
    }

    public function update(Request $request)
    {
        $lokasi_user = $request->get('lokasi-user');
        $user = User::where('id_user',$request->get('id'))->first();
        if($request->get('password')==$request->get('konfirmasi')){
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
        foreach ($lokasi_user as $key => $value) {
            if (empty($value['id_users_lokasi'])) {
                UserLokasi::create([
                    'id_lokasi' => $value['lokasi'],
                    'id_user' => $request->get('id')
                ]);
            } else {
                UserLokasi::where('id_users_lokasi',$value['id_users_lokasi'])->update(['id_lokasi'=>$value['lokasi']]);
            }
        }
        $delete = $request->get('delete');

        if (!empty($delete)) {
            foreach ($delete as $key => $value) {
                UserLokasi::where('id_users_lokasi',$value)->update(['deleted'=>1]);
            }
        }
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
        $datas = User::select(DB::raw("users.id_user,users.name,users.level_user,users.id_bo,users.username,users.level_user,users.email, GROUP_CONCAT(master_lokasis.nm_lokasi SEPARATOR ', ') as nm_lokasi"))
                    ->leftJoin('users_lokasi','users_lokasi.id_user','=','users.id_user')
                    ->leftJoin('master_lokasis','master_lokasis.id_lokasi','=','users_lokasi.id_lokasi')
                    ->where('users.deleted',0)
                    // ->where('master_lokasis.deleted',0)
                    ->where('users_lokasi.deleted',0)
                    ->groupBy('users.id_user','users.name','users.email','users.username','users.level_user','users.id_bo')
                    ->get();
        return $datatables->of($datas)
                          ->editColumn('name', function ($user) {
                              return '<a>' . $user->name . '</a>';
                          })
                          ->addColumn('action', function ($user) {
                              $lokasi = UserLokasi::where('id_user',$user->id_user)->get();
                              return "<a class='btn btn-xs btn-primary' href='/user/edit/$user->id_user'><i class='glyphicon glyphicon-edit'></i> Edit</a>
                              <a class='btn btn-xs btn-danger' data-toggle='modal' data-target='#deleteModal' data-id='$user->id_user'><i class='glyphicon glyphicon-remove'></i> Hapus</a>";
                            })
                          ->rawColumns(['name', 'action'])
                          ->make(true);
    }
}
