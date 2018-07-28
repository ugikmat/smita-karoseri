<?php

namespace App\Http\Controllers;
use App\UploadDompul;
use DB;
use Excel;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class UploadDompulController extends Controller
{
        public function index()
	{
		return view('upload.upload');
	}
	public function downloadExcel($type)
	{
		$data = UploadDompul::get()->toArray();
		return Excel::create('dompul', function($excel) use ($data) {
			$excel->sheet('mySheet', function($sheet) use ($data)
	        {
				$sheet->fromArray($data);
	        });
		})->download($type);
	}
	public function importExcel(Request $request)
	{
		if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($reader) {
                $reader->ignoreEmpty();
            })->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
                    if(!empty($value) && $value->count()){
                         $uploadDompul[] = ['no_hp_sub_master_dompul' => $value->hp_sub_master ,
                        'nama_sub_master_dompul' => $value->nama_sub_master ,
                        'tanggal_transfer' => $value->tanggal_trx,
                        'no_faktur' => $value->no_faktur ,
                        'produk' => $value->produk ,
                        'qty' => str_replace(',','',$value->qty),
                        'balance' => str_replace(',','',$value->balance),
                        'diskon' => $value->diskon ,
                        'no_hp_downline' => $value->hp_downline ,
                        'nama_downline' => $value->nama_downline ,
                        'status' => $value->status ,
                        'no_hp_canvasser' => $value->hp_kanvacer ,
                        'nama_canvasser' => $value->nama_kanvacer ,
                        'print' => $value->print,
                        'bayar' => $value->bayar,
                        'qty_program' => 0
                        // 'tipe_dompul' => ''
                    ];
                    $dompul[] = ['no_hp_master_dompul' => $value->no_hp_master_dompul ,
                        'no_hp_sub_master_dompul' => $value->hp_sub_master ,
                        'nama_sub_master_dompul' => $value->nama_sub_master ,
                        'tipe_dompul' => $value->tipe_harga_dompul,
                        'id_gudang' => $value->id_gudang ,
                        'status_sub_master_dompul' => 'Aktif'
                    ];

                    $hargaDompul[] = ['nama_harga_dompul' => $value->produk ,
                        'harga_dompul' => $value->harga_dompul ,
                        'tanggal_update' => $value->tanggal_update_dompul ,
                        'tipe_harga_dompul' => $value->tipe_harga_dompul,
                        'status_harga_dompul' => 'Aktif'
                    ];
                    $customer[] = ['nm_cust' => $value->nama_downline ,
                        'alamat_cust' => $value->alamat_cust ,
                        'no_hp' => $value->hp_downline ,
                        'jabatan' => $value->jabatan_cust
                    ];
                    $sales[] = ['nm_sales' => $value->nama_kanvacer ,
                        'alamat_sales' => $value->alamat_sales ,
                        'no_hp' => $value->hp_kanvacer
                    ];
                    }
				}
				if(!empty($uploadDompul)){
                    DB::table('upload_dompuls')->insert($uploadDompul);
                }
                // if(!empty($dompul)){
                //     DB::table('master_dompuls')->insert($dompul);
                // }
                // if(!empty($hargaDompul)){
                //     DB::table('master_harga_dompuls')->insert($hargaDompul);
                // }
                // if(!empty($customer)){
                //     DB::table('master_customers')->insert($customer);
                // }
                // if(!empty($sales)){
                //     DB::table('master_saless')->insert($sales);
				// }
			}
		}
		return redirect('/upload/dompul');

    }
    /**
     * Process dataTable ajax response.
     *
     * @param \Yajra\Datatables\Datatables $datatables
     * @return \Illuminate\Http\JsonResponse
     */
    public function data(Datatables $datatables)
    {
        return $datatables->eloquent(UploadDompul::query())
                          ->addColumn('action', function ($uploadDompul) {
                              return
                              '<a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#editModal" data-id="'.$uploadDompul->id_upload.'"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                              <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="'.$uploadDompul->id_upload.'"><i class="glyphicon glyphicon-remove"></i> Delete</a>';
                            })
                          ->make(true);
    }

}