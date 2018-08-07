<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PenjualanDompul;
use App\UploadDompul;
use App\HargaDompul;
use App\Sales;
use DB;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class MonitorController extends Controller
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
     * Diplay a list of transaction made before
     */
    public function index(){
        return view('penjualan.monitoring.mntr-upload');
    }

    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(UploadDompul::selectRaw("nama_canvasser AS nama,
(SELECT sum(qty_program) FROM upload_dompuls WHERE produk = 'DP5' and nama_canvasser = nama) AS qty_program5k,
(SELECT sum(qty) FROM upload_dompuls WHERE produk = 'DP5' and nama_canvasser = nama) AS qty_non_program5k,
(SELECT sum(qty_program) FROM upload_dompuls WHERE produk = 'DP10' and nama_canvasser = nama) AS qty_program10k,
(SELECT sum(qty) FROM upload_dompuls WHERE produk = 'DP10' and nama_canvasser = nama) AS qty_non_program10k,
(SELECT sum(qty_program) AS rupiah_program FROM upload_dompuls WHERE produk = 'DOMPUL' and nama_canvasser = nama) AS program_rupiah,
(SELECT sum(qty) AS rupiah FROM upload_dompuls WHERE produk = 'DOMPUL' and nama_canvasser = nama) AS non_program_rupiah")
                        ->groupBy('nama'))
                        ->addColumn('index', function ($penjualanDompul) {
                              return 
                              '';
                            })
                          ->make(true);
    }
}
