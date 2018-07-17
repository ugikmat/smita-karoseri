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
        $satuan->tipe_satuan='Induk';
        $satuan->induk_satuan='PCS';
        $satuan->nilai_konversi='PCS';
        $satuan->status_satuan='tersedia';
        $satuan->save();

        $satuan2 = new Satuan();
        $satuan2->nama_satuan='BOX';
        $satuan->tipe_satuan='Induk';
        $satuan->induk_satuan='BOX';
        $satuan->nilai_konversi='BOX';
        $satuan2->status_satuan='tersedia';
        $satuan2->save();

        $satuan3 = new Satuan();
        $satuan3->nama_satuan='Unit';
        $satuan->tipe_satuan='Induk';
        $satuan->induk_satuan='Unit';
        $satuan->nilai_konversi='Unit';
        $satuan3->status_satuan='tersedia';
        $satuan3->save();
    }
}
