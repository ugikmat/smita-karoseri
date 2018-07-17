<?php

use Illuminate\Database\Seeder;
use App\Supplier;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = new Supplier();
        $supplier->nama_suplier="Mamat";
        $supplier->alamat_suplier="Jalan Kaki";
        $supplier->telepon_suplier="0853242424";
        $supplier->email_suplier="mamat.mat@gmail.com";
        $supplier->tanggal="17/08/2017";
        $supplier->status_suplier="Aktif";
        $supplier->save();;

    }
}