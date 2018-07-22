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
        $supplier->nama_supplier="SD TUBAN";
        $supplier->alamat_supplier="Tuban";
        $supplier->telepon_supplier="081938062644";
        $supplier->email_supplier="sdtuban@gmail.com";
        $supplier->bank_supplier="Bank Mandiri";
        $supplier->norek_supplier="111458772135";
        $supplier->status_supplier="Aktif";
        $supplier->save();

        $supplier2 = new Supplier();
        $supplier2->nama_supplier="SD SIDOARJO";
        $supplier2->alamat_supplier="Sidoarjo";
        $supplier2->telepon_supplier="081938062641";
        $supplier2->email_supplier="sdsidoarjo@gmail.com";
        $supplier2->bank_supplier="Bank BRI";
        $supplier2->norek_supplier="45644424132";
        $supplier2->status_supplier="Aktif";
        $supplier2->save();

        $supplier3 = new Supplier();
        $supplier3->nama_supplier="SD MJK-JMB";
        $supplier3->alamat_supplier="Mojokerto";
        $supplier3->telepon_supplier="081938062642";
        $supplier3->email_supplier="sdmojokerto@gmail.com";
        $supplier3->bank_supplier="Bank BCA";
        $supplier3->norek_supplier="940225465000";
        $supplier3->status_supplier="Aktif";
        $supplier3->save();
    }
}
