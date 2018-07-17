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
        $satuan->nama_satuan='PCS';
        $satuan->status_satuan='tersedia';
        $satuan->save();

        $satuan2 = new Satuan();
        $satuan2->nama_satuan='BOX';
        $satuan2->status_satuan='tersedia';
        $satuan2->save();

        $satuan3 = new Satuan();
        $satuan3->nama_satuan='Unit';
        $satuan3->status_satuan='tersedia';
        $satuan3->save();
    }
}
