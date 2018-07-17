<?php

use Illuminate\Database\Seeder;
use App\produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sp1 = new produk()
        $sp1->nama='BRONET 2GB';
        $sp1->tipe='SP';
        $sp1->status='tersedia';
        $sp1->save();

        $sp2 = new produk();
        $sp2->nama='Combo Lite 4GB+';
        $sp2->tipe='SP';
        $sp2->status='tersedia';
        $sp2->save();

        $dompul = new produk();
        $dpmpul->nama='Dompul';
        $dompul->tipe='dompul';
        $dompul->status='tersedia';
        $dompul->save();

        $dompul2 = new produk();
        $dompul2->nama='DP5';
        $dompul2->tipe='dompul';
        $dompul2->status='tersedia';
        $dompul2->save();

        $dompul3 = new produk();
        $dompul3->nama='DP10';
        $dompul3->tipe='dompul';
        $dompul3->status='tersedia';
        $dompul3->save();
    }
}
