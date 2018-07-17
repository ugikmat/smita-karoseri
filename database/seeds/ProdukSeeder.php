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
        $produk = new produk();
        $produk->nama='XYADW';
        $produk->tipe='dompul';
        $produk->status='tersedia';
        $produk->save();
    }
}
