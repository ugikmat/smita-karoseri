<?php

use Illuminate\Database\Seeder;

class KartuStokDompulTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stokdompul = new StokSp();
        $stokdompul->id_produk='DP5';
        $stokdompul->stok_awal=0;
        $stokdompul->stok_masuk=0;
        $stokdompul->stok_keluar=0;
        $stokdompul->stok_akhir=0;
        $stokdompul->status_stok_dompul=1;
        $stokdompul->save();

        $stokdompul2 = new StokSp();
        $stokdompul2->id_produk='DP10';
        $stokdompul2->stok_awal=0;
        $stokdompul2->stok_masuk=0;
        $stokdompul2->stok_keluar=0;
        $stokdompul2->stok_akhir=0;
        $stokdompul2->status_stok_dompul=1;
        $stokdompul2->save();

        $stokdompul3 = new StokSp();
        $stokdompul3->id_produk='DOMPUL';
        $stokdompul3->stok_awal=0;
        $stokdompul3->stok_masuk=0;
        $stokdompul3->stok_keluar=0;
        $stokdompul3->stok_akhir=0;
        $stokdompul3->status_stok_dompul=1;
        $stokdompul3->save();
    }
}
