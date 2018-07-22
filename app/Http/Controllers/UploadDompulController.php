<?php

namespace App\Http\Controllers;
use App\UploadDompul;
use DB;
use Excel;
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
			})->get();
			if(!empty($data) && $data->count()){
				foreach ($data as $key => $value) {
					$insert[] = ['produk' => $value->produk, 'quantity' => $value->qty, 'nama_sub' => $value->nama_sub_master];
				}
				if(!empty($insert)){
					DB::table('upload_dompuls')->insert($insert);
					dd('Insert Record successfully.');
				}
			}
		}
		return back();

	}

}