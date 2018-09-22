<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produksi;
use App\ProduksiDetail;
use App\View\ViewProduksi;
use Yajra\Datatables\Datatables;
use App\Customer;
use App\View\ViewSPKC;
use DB;

class ProduksiController extends Controller
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
        return view('karoseri.qc_tambah');
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

    public function getData($id)
    {
        $data = ViewSPKC::where('id_spkc', $id)->first();

        $jum = $data->jumlah_unit;

        for($i=0; $i < $jum; $i++){
          $prod = Produksi::where('kode_produksi', $i+1)->where('id_spkc', $id)->count();
          if($prod == 0){
          Produksi::create([
            'kode_produksi' => $i+1,
            'id_spkc' => $data->id_spkc
          ]);
          }
        }

        $produksi = Produksi::where('id_spkc', $id)->get();

        return view('karoseri.qc_tambah', ['data' => $data, 'prod' => $produksi]);
    }

    public function getDataQC(Request $req, $id)
    {
        $idpr = $req->get('idprod');
        $data = ViewSPKC::select('view_spkc.*', 'produksi_tabels.id_produksi', 'produksi_tabels.kode_produksi', 'produksi_tabels.tgl_akhir')
                          ->join('produksi_tabels', 'produksi_tabels.id_spkc', '=', 'view_spkc.id_spkc')->where('view_spkc.id_spkc', $id)->where('produksi_tabels.id_produksi', $idpr)->first();
        //$produksi = ProduksiDetail::where('id_spkc', $id)->get();
      /*  $huruf = ['A','B','C','D','E','F','G','H','I','J'];
        $count = ProduksiDetail::where('id_spkc', $id)->count();

        $cnt = $spkc.''.$huruf[$count];
        $cntacc = $spkc.''.$huruf[$count-1];*/
        return view('karoseri.print_qc', ['data' => $data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $par = $request->get('getid');
        $spkc = ViewSPKC::where('id_spkc', $par);
        $jum = $spkc->jumlah_unit;
        $pd = new Produksi;
        $num = 1;
        for($i=0; $i < $jum; $i++){
          $pd->kode_produksi = $num;
          $pd->id_spkc = $par;
          $pd->save();
          $num++;

        }
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
        //
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

  /*  public function data(Datatables $datatables, Request $req)
    {
        return $id = $req->get('idspkcget');
        return $datatables->eloquent(ViewProduksi::where('id_spkc', $id))
                          ->addColumn('action', function ($pp) {
                              return
                              '<a class="btn btn-info" href="'.route('qc', [$pp->id_spkc, 'num' => $pp->kode_produksi, 'idprod' => $pp->id_produksi]).'" type="submit"><i class="glyphicon glyphicon-search"></i> View</a>
                              ';
                            })
                          ->make(true);
    }*/
}
