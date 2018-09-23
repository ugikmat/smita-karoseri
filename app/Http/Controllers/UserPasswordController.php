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

class UserPasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index(){
        return view('user.change-password');
    }

    public function change(Request $request){
        if(Hash::check($request->get('oldpassword'),Auth::user()->password)&&$request->get('password')==$request->get('konfirmasi')){
            User::where('id_user',Auth::user()->id_user)->update(['password'=>Hash::make($request->get('password'))]);
        }else{
            return redirect()->back();
        }
        return redirect('');
    }
}
