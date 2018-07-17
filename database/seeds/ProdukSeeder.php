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
        $sp1->kode_produk='SP1';
        $sp1->nama_produk='BRONET 2GB';
        $sp1->kategori_produk='SP';
        $sp1->satuan='PCS';
        $sp1->jenis='GOODS';
        $sp1->BOM='YA';
        $sp1->harga_jual='20000';
        $sp1->tarif_pajak='5%';
        $sp1->diskon='0.15%';
        $sp1->komisi='0.10%';
        $sp1->status='tersedia';
        $sp1->save();

        $sp2 = new produk();
        $sp2->kode_produk='SP1';
        $sp2->nama_produk='Combo Lite 4GB+';
        $sp2->kategori_produk='SP';
        $sp2->satuan='PCS';
        $sp2->jenis='GOODS';
        $sp2->BOM='YA';
        $sp2->harga_jual='35000';
        $sp2->tarif_pajak='10%';
        $sp2->diskon='0.15%';
        $sp2->komisi='0.10%';
        $sp2->status='tersedia';
        $sp2->save();

        $dompul = new produk();
        $dompul->kode_produk='DOMPUL1';
        $dompul->nama_produk='DOMPUL';
        $dompul->kategori_produk='Dompul';
        $dompul->satuan='PCS';
        $dompul->jenis='GOODS';
        $dompul->BOM='YA';
        $dompul->harga_jual='100000';
        $dompul->tarif_pajak='10%';
        $dompul->diskon='0.15%';
        $dompul->komisi='0.10%';
        $dompul->status='tersedia';
        $dompul->save();

        $dompul2 = new produk();
        $dompul2->kode_produk='DOMPUL5';
        $dompul2->nama_produk='DP5';
        $dompul2->kategori_produk='Dompul';
        $dompul2->satuan='PCS';
        $dompul2->jenis='GOODS';
        $dompul2->BOM='YA';
        $dompul2->harga_jual='5000';
        $dompul2->tarif_pajak='10%';
        $dompul2->diskon='0.15%';
        $dompul2->komisi='0.10%';
        $dompul2->status='tersedia';
        $dompul2->save();

        $dompul3 = new produk();
        $dompul3->kode_produk='DOMPUL10';
        $dompul3->nama_produk='DP10';
        $dompul3->kategori_produk='Dompul';
        $dompul3->satuan='PCS';
        $dompul3->jenis='GOODS';
        $dompul3->BOM='YA';
        $dompul3->harga_jual='10000';
        $dompul3->tarif_pajak='10%';
        $dompul3->diskon='0.15%';
        $dompul3->komisi='0.10%';
        $dompul3->status='tersedia';
        $dompul3->save();
    }
}
