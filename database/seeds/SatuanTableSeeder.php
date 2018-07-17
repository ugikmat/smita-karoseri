<?php

use Illuminate\Database\Seeder;
use App\Satuan;

class SatuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satuan = new Satuan();
        $satuan->nama_satuan='XYADW';
        $satuan->jumlah_satuan=10000;
        $satuan->status_satuan='tersedia';
        $satuan->save();
    }
}
