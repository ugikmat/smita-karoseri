<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TambahPBB;
use App\PBB;
use Yajra\Datatables\Datatables;
use App\produk;
use App\SPKC;
use App\View\ViewSPKC;
use Validator;
use DB;
use Auth;

class TambahPBBController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */public function __construct()
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
        return view('karoseri.tambah_pbb');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function tambahPbbPost(Request $request)
    {
        $rules = [];


        foreach($request->input('ukuran') as $key => $value) {
            $rules["ukuran.{$key}"] = 'required';
        }
        foreach($request->input('jumlah') as $key1 => $value1){
          $rules["jumlah.{$key1}"] = 'required';
        }
        foreach ($request->input('catatan') as $key2 => $value2) {
          $rules["catatan.{$key2}"] = 'required';
        }


        $validator = Validator::make($request->all(), $rules);


        if ($validator->passes()) {
            $material = $request->get('material');
            $ukuran = $request->input('ukuran');
            $jumlah = $request->input('jumlah');
            $catatan = $request->input('catatan');
            $pemohon = $request->input('pemohon');

            $wo = $request->get('wo');
            //$gudang = $request->get('gudang');

            $pbb = DB::table('pbb_tabels')->count();

            for($i=0; $i < count($ukuran);$i++){
              $mt = $material[$i];
              $uk = $ukuran[$i];
              $jml = $jumlah[$i];
              $ct = $catatan[$i];
              $pm = $pemohon[$i];

              DB::table('pbb_details')->insert(['id_wo' => $wo, 'id_pbb' => $pbb, 'material' => $mt, 'ukuran' => $uk, 'jumlah' => $jml, 'jumlah_setuju' => $jml, 'catatan' => $ct, 'pemohon' => $pm]);
            }
              DB::table('pbb_tabels')->where('id_pbb', $pbb)->update(['id_wo' => $wo, 'pemohon' => $pm]);

            return redirect('/pbb');
        }

        return response()->json(['error'=>$validator->errors()->all()]);
    }

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

     public function getMaterial(Request $req)
     {
       $data = produk::where('id_produk','=',$req->get('id'))->first();
       return $data;
     }

     public function getAddress(Request $req)
     {
       $data = ViewSPKC::where('id_spkc','=',$req->get('id'))->first();
       return $data;
     }

    public function store(Request $request)
    {
        $pbb = new PBB;
        $pbb->save();

        return redirect('/tambah_pbb');

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
